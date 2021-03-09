<?php
namespace App\Controller;

use Core\Controller;

use App\Model\Utilisateurs;

class InscriptionController extends Controller
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
        $this->set('bg_full', 'bg-register.jpg');
        $this->render('inscription');
    }
}