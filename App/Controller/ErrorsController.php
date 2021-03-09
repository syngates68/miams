<?php
namespace App\Controller;

use Core\Controller;

class ErrorsController extends Controller
{
    public function get_404()
    {
        $this->render('404');
    }

    public function get_500()
    {
        $this->render('500');
    }
}