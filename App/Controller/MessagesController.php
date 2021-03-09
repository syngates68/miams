<?php
namespace App\Controller;

use Core\Controller;

use App\Model\Plats;
use App\Model\Utilisateurs;
use App\Model\Messages;

class MessagesController extends Controller
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

        return true;
    }

    public function get_index()
    {
        $messages = Messages::getByUser($this->user->get_id());
        $this->set('messages', $messages);
        $this->render('messages');
    }

    public function post_envoi_message()
    {
        $this->load->library('form');

        if ($this->form->check_post_raw_values_not_empty(['message']) && str_replace(' ', '', $_POST['message']) != '')
        {
            //Ajouter la vérification du nombre de caractères
            $m = new Messages([
                'id_envoi' => $this->user->get_id(),
                'id_reception' => 1,
                'contenu' => $_POST['message'],
                'lu' => 0,
                'date_message' => date('Y-m-d H:i:s')
            ]);
    
            $m->insert_message();

            echo "1Votre message a bien été envoyé.";
        }
        else
        {
            echo "0Veuillez écrire un message avant d'envoyer.";
        }
    }
}