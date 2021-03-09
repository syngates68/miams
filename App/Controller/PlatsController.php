<?php
namespace App\Controller;

use Core\Controller;

use App\Model\Plats;
use App\Model\Utilisateurs;
use App\Model\Reservations;
use App\Model\Messages;

class PlatsController extends Controller
{
    public function canAcces($method)
    {
        if (isset($_SESSION['utilisateur']))
        {
            $this->user = Utilisateurs::getById($_SESSION['utilisateur']);
            $this->set('user', $this->user);
            $nbr_messages = Messages::countByUser($this->user->get_id());
            $this->set('nbr_messages', $nbr_messages);
        }

        if ($method == 'get_ajouter')
        {
            if (!isset($_SESSION['utilisateur']))
                return false;
            else
                return true;
        }
        else
            return true;
    }

    public function onFailAcces($method)
    {
        $_SESSION['error_connect'] = 'Vous devez être connecté pour accéder à cette page.';
        $_SESSION['_redirect'] = 'plats/ajouter';
        self::redirect(BASEURL.'connexion');
    }

    public function get_index($slug)
    {
        $id = explode('-', $slug)[sizeof(explode('-', $slug)) - 1];
        $plat = Plats::getById($id)[0];
        $this->set('plat', $plat);

        /** 
         * Pour proposer les heures de récupération possibles, il faut connaître 
         * l'intervalle durant lequel il est possible de récupérer le plat, 
         * entre l'heure de début ($debut) et l'heure de fin ($fin)
        */
        $debut = str_replace(':', '', $plat['heure_debut']);
        $fin = str_replace(':', '', $plat['heure_fin']);

        $debut = ($debut[0] != 0) ? $debut : substr($debut, 1, 3);
        $fin = ($fin[0] != 0) ? $fin : substr($fin, 1, 3);

        $i = 0;
        $tmp = $debut;

        $heures = [];

        while ($tmp <= $fin)
        {
            //On convertit l'entier en string
            $tmp = strval($tmp);
            $val = $tmp;

            if (strlen($val) != 4)
            {
                while (strlen($val) < 4)
                {
                    $val = '0'.$val;
                }
            }

            $val = substr($val, 0, 2).':'.substr($val, 2, 2);

            $heures[$i] = $val;

            if ($tmp[strlen($tmp) - 2] == '0')
                $tmp = $tmp + 30;
            else
                $tmp = $tmp + 70;

            $i++;
        }

        $this->set('nbr_heures', $i);
        $this->set('heures', $heures);
        $this->set('eggshell', true);
        $this->set('navbar_background', '#4C93FD');
        $this->render('plat');
    }

    public function get_liste()
    {
        $plats = Plats::getAll();
        $this->set('plats', $plats);
        $this->render('liste');
    }

    public function post_valider_reservation()
    {
        $this->load->library('form');

        if ($this->form->check_post_raw_values_not_empty(['quantite', 'heure']))
        {
            if (is_numeric($_POST['quantite']))
            {
                if ($_POST['quantite'] <= Plats::getById($_POST['id_plat'])[0]['quantite'])
                {
                    $lettres = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
                    $montant = $_POST['quantite'] * $_POST['prix'];
                    //On ajoute la réservation
                    $reservation = new Reservations([
                        'id_utilisateur' => $this->user->get_id(),
                        'quantite' => $_POST['quantite'],
                        'heure_souhaitee' => $_POST['heure'],
                        'montant' => $montant,
                        'id_plat' => $_POST['id_plat'],
                        'date_commande' => date('Y-m-d H:i:s')
                    ]);
                    $reservation->insert_reservation();
                    //On met à jour la quantité du plat en y retirant la quantité réservée
                    $p = Plats::getBySimpleId($_POST['quantite']);
                    $p->set_quantite($p->get_quantite() - $_POST['quantite']);
                    $p->update_quantite();
                    //On définit une reference à ajouter à la réservation
                    $reference = '';
                    $reference = $reference.$lettres[rand(0, 25)].rand(0, 9);
                    $reference = $reference.$reservation->get_id().date('Ymd');
                    $reservation->set_reference($reference);
                    $reservation->update_reference();
                    $_SESSION['commande_valide'] = true;
                    $_SESSION['reference'] = $reference;
                }
                else
                {
                    echo "Il ne reste actuellement que ".Plats::getById($_POST['id_plat'])[0]['quantite'].' parts pour ce plat, vous ne pouvez donc pas en réserver '.$_POST['quantite'].'.';
                }
            }
            else
            {
                echo "Veuillez saisir une quantité correcte.";
            }
        }
        else
        {
            echo "Tous les champs sont obligatoires.";
        }
    }

    public function get_ajouter()
    {
        if (isset($_SESSION['error_add']))
        {
            $this->set('error_add', $_SESSION['error_add']);
            unset($_SESSION['error_add']);
        }
        if (isset($_SESSION['_inputs']))
        {
            $this->set('_inputs', $_SESSION['_inputs']);
            unset($_SESSION['_inputs']);
        }

        $heure = 0;
        $minutes = 0;

        $_heures = [];

        for ($i = 0; $i <= 23; $i++)
        {
            for ($j = 0; $j <= 1; $j++)
            {
                $heure = $i;
                if ($i < 10)
                    $heure = '0'.$i;
                
                $minutes = '00';
                if ($j == 1)
                    $minutes = '30';

                array_push($_heures, $heure.':'.$minutes);
            }
        }

        $this->set('heures', $_heures);
        $this->set('navbar_background', '#FFF');
        $this->render('ajouter');
    }

    public function post_ajouter()
    {
        $this->load->library('form');

        if ($this->form->check_post_raw_values_not_empty(['nom_plat', 'type_plat', 'heure_debut', 'heure_fin', 'prix', 'quantite', 'adresse', 'code_postal', 'ville']))
        {
            if (isset($_FILES['photo_plat']) && $_FILES['photo_plat']['error'] == 0)
            {
                $max_size = 1000000;
                $types = ['image/jpg', 'image/png', 'image/jpeg'];
                $tmp_file = $_FILES['photo_plat']['tmp_name'];
    
                $type = $_FILES['photo_plat']['type'];
                $size = $_FILES['photo_plat']['size'];
                $folder = $_SERVER['DOCUMENT_ROOT'].'/test/public/assets/plats/';

                if (in_array($type, $types))
                {
                    switch ($type) 
                    {
                        case 'image/jpg':
                            $type = '.jpg';
                            break;
                        case 'image/jpeg':
                            $type = '.jpeg';
                            break;
                        case 'image/png':
                            $type = '.png';
                            break;
                    }

                    if ($size < $max_size)
                    {
                        $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

                        $str = '';

                        for ($j = 0; $j < 9; $j++)
                        {
                            $str .= $char[rand(0, strlen($char) - 1)];
                        }

                        $file_name = $str.$type;
                        $url = $folder.$file_name;

                        $this->load->library('slugify');

                        if (move_uploaded_file($tmp_file, $url))
                        {
                            $p = new Plats([
                                "nom" => $_POST['nom_plat'],
                                "type_plat" => $_POST['type_plat'],
                                "prix" => $_POST['prix'],
                                "quantite" => $_POST['quantite'],
                                "heure_debut" => $_POST['heure_debut'],
                                "heure_fin" => $_POST['heure_fin'],
                                "adresse" => $_POST['adresse'],
                                "code_postal" => $_POST['code_postal'],
                                "ville" => $_POST['ville'],
                                "informations_supplementaires" => nl2br($_POST['informations_supplementaires']),
                                "photo_plat" => substr($url, stripos($url, "assets"), strlen($url)),
                                "slug" => $this->slugify->get_slug($_POST['nom_plat']),
                                "id_utilisateur" => $this->user->get_id(),
                                "date_publication" => date('Y-m-d H:i:s')
                            ]);

                            $p->insert_plat();
                        }
                        else
                        {
                            $_SESSION['_inputs'] = [
                                '_nom_plat' => (isset($_POST['nom_plat'])) ? $_POST['nom_plat'] : NULL,
                                '_type_plat' => (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL,
                                '_heure_debut' => (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL,
                                '_heure_fin' => (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL,
                                '_prix' => (isset($_POST['prix'])) ? $_POST['prix'] : NULL,
                                '_quantite' => (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL,
                                '_adresse' => (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL,
                                '_informations_supplementaires' => (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL,
                            ];
                            $_SESSION['error_add'] = "Une erreur innatendue s'est produite durant le téléchargement de votre image.";
                            self::redirect(BASEURL.'plats/ajouter');
                        }
                    }
                }
                else
                {
                    $_SESSION['_inputs'] = [
                        '_nom_plat' => (isset($_POST['nom_plat'])) ? $_POST['nom_plat'] : NULL,
                        '_type_plat' => (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL,
                        '_heure_debut' => (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL,
                        '_heure_fin' => (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL,
                        '_prix' => (isset($_POST['prix'])) ? $_POST['prix'] : NULL,
                        '_quantite' => (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL,
                        '_adresse' => (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL,
                        '_informations_supplementaires' => (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL,
                    ];
                    $_SESSION['error_add'] = "Seuls les fichiers .jpg, .jpeg et .png sont acceptés.";
                    self::redirect(BASEURL.'plats/ajouter');
                }
            }
            else
            {
                $_SESSION['_inputs'] = [
                    '_nom_plat' => (isset($_POST['nom_plat'])) ? $_POST['nom_plat'] : NULL,
                    '_type_plat' => (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL,
                    '_heure_debut' => (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL,
                    '_heure_fin' => (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL,
                    '_prix' => (isset($_POST['prix'])) ? $_POST['prix'] : NULL,
                    '_quantite' => (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL,
                    '_adresse' => (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL,
                    '_informations_supplementaires' => (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL,
                ];
                $_SESSION['error_add'] = "Veuillez ajouter une photo afin d'illustrer votre plat.";
                self::redirect(BASEURL.'plats/ajouter');
            }
        }
        else
        {
            $_SESSION['_inputs'] = [
                '_nom_plat' => (isset($_POST['nom_plat'])) ? $_POST['nom_plat'] : NULL,
                '_type_plat' => (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL,
                '_heure_debut' => (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL,
                '_heure_fin' => (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL,
                '_prix' => (isset($_POST['prix'])) ? $_POST['prix'] : NULL,
                '_quantite' => (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL,
                '_adresse' => (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL,
                '_informations_supplementaires' => (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL,
            ];
            $_SESSION['error_add'] = "Veuillez remplir tous les champs obligatoires afin de proposer votre plat.";
            self::redirect(BASEURL.'plats/ajouter');
        }
    }
}