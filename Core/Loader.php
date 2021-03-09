<?php
namespace Core;
use PDO;
use PDOException;
use App\Config\Database;

class Loader
{
    public function __construct($controller)
    {
        $this->controller = $controller;
    }

    public function database($name)
    {
        $db = Database::$databases[$name];
        
        try
        {
            Model::set_db(new PDO($db['dsn'], $db['username'], $db['password']));
        }
        catch (PDOException $e)
        {
            $c = new Controller();
            $c->init();
            $c->error(500);
            exit;
        }
    }

    public function library($name) 
    {
        $library_file = ROOT.DS.'Core'.DS.'Library'.DS.ucfirst($name).'.php';
        $library_class = 'Core\Library\\'.ucfirst($name);

        if (is_file($library_file)) 
        {
            require_once $library_file;

            if (class_exists($library_class)) 
            {
                $libVar = strtolower($name);
                $lib = new $library_class;
                $this->controller->$libVar = $lib;
            }
        }
    }
}