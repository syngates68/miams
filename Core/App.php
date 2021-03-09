<?php
namespace Core;

use Core\Loader;
use Core\Router;
use Core\Request;

class App
{
    public static function init()
    {
        spl_autoload_register(
            function($className)
            {
                $className = str_replace('_', '\\', $className);
                $className = ltrim($className, '\\');
                $fileName = '';
                $namespace = '';
                
                if ($lastNsPos = strripos($className, '\\'))
                {
                    $namespace = substr($className, 0, $lastNsPos);
                    $className = substr($className, $lastNsPos + 1);
                    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
                }
                $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
                require_once ROOT.DS.$fileName;
            }
        );

        $app = new App();
        $app->load_config();
    }

    private function load_config()
    {
        date_default_timezone_set('Europe/Paris');
        setlocale(LC_TIME, 'fr_FR.utf8','fra');
        session_start();
        
        //On charge la base de données à utiliser
        $this->load = new Loader($this);
        $this->load->database('dev');

        $router = new Router();
        $request = new Request();

        $router->parseRequest($request);
        $bundle = new Bundle();
        $bundle->load_controller($router, $request);
    }
}