<?php
namespace App\Controller;

use Core\Controller;

class DeconnexionController extends Controller
{
    public function canAcces($method)
    {
        if (isset($_SESSION['utilisateur']))
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
        session_destroy();
        self::redirect(BASEURL);
    }
}