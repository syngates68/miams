<?php
namespace App\Controller;

use Core\Controller;

use App\Model\Utilisateurs;

class ConnexionController extends Controller
{
    public function canAcces($method)
    {
        if (!isset($_SESSION['utilisateur']))
            return true;
        else
            return false;
    }

    public function onFailAcces($method)
    {
        self::redirect(BASEURL);
    }

    public function get_index()
    {
        if (isset($_SESSION['error_connect']))
        {
            $this->set('error_connect', $_SESSION['error_connect']);
            unset($_SESSION['error_connect']);
        }
        $this->set('bg_full', 'bg-login.jpg');
        $this->render('connexion');
    }

    public function post_index()
    {
        $this->load->library('form');

        if ($this->form->check_post_raw_values_not_empty(['mail', 'pass']))
        {
            if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
            {
                if (Utilisateurs::countByMail($_POST['mail']) == 1)
                {
                    $utilisateur = Utilisateurs::getByMail($_POST['mail']);

                    if (password_verify($_POST['pass'], $utilisateur->get_pass()))
                    {
                        $_SESSION['utilisateur'] = $utilisateur->get_id();
                        if (isset($_SESSION['_redirect']))
                            self::redirect(BASEURL.$_SESSION['_redirect']);
                        else
                            self::redirect(BASEURL);
                    }
                    else
                    {
                        $_SESSION['error_connect'] = 'Adresse mail ou mot de passe incorrect, veuillez vérifier les informations rentrées.';
                        self::redirect(BASEURL.'connexion');
                    }
                }
                else
                {
                    $_SESSION['error_connect'] = 'Aucun compte ne correspond aux informations renseignées.';
                    self::redirect(BASEURL.'connexion');
                }
            }
            else
            {
                $_SESSION['error_connect'] = 'Veuillez saisir une adresse mail valide.';
                self::redirect(BASEURL.'connexion');
            }
        }
        else
        {
            $_SESSION['error_connect'] = 'Les deux champs sont obligatoires.';
            self::redirect(BASEURL.'connexion');
        }
    }
}