<?php
namespace App\Controller;

use Core\Controller;

use App\Model\Plats;
use App\Model\Utilisateurs;
use App\Model\Messages;

class HomeController extends Controller
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
        $this->render('index');
    }
}