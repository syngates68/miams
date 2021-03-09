<?php
namespace Core;

use Core\Router;
use Core\Request;

use PDO;

class Bundle
{

    public function __construct()
    {
        $this->load = new Loader($this);
    }

    public function canAcces($method)
    {
        return true;
    }

    public function load_controller(Router $router, Request $request)
    {
        $router->parseRequest($request);

        if ($this->canAcces($request->controller))
        {
            $controller = preg_replace_callback('/(?:^|_)(.?)/', function($m) { return strtoupper($m[1]); }, $request->controller);
            $nameController = ucfirst($controller).'Controller';
            $controller_file = ROOT.DS.'App\Controller'.DS.$nameController.'.php';
            $controller_class = 'App\\Controller\\'.$nameController;
            
            if (is_file($controller_file))
            {
                require_once $controller_file;
                
                if (class_exists($controller_class))
                {
                    $c = new $controller_class;
                    $c->controller_name = ucfirst($controller);
                    $c->init();

                    $c->load = new Loader($c);

                    $method = $request->httpMethod.'_'.$request->method;

                    if (method_exists($c, $method))
                        self::call_method($c, $method, $request->params);
                    else if (method_exists($c, 'all_'.$request->method))
                        self::call_method($c, $request->method, $request->params);
                    else
                    {
                        //Si la méthode n'existe pas, on appelle la méthode index avec comme paramètres ladite méthode
                        $method = $request->httpMethod.'_index';
                        self::call_method($c, $method, [$request->method]);
                    }
                }
                else
                {
                    $this->onError(404, 'class not found');
                }
            }
            else
            {
                $this->onError(404, 'page not found');
            }
        }
    }

    public static function call_method($controller, $method, $params)
    {
        if ($controller->canAcces($method))
            call_user_func_array(array($controller, $method), $params);
        else
            $controller->onFailAcces($method);

        $controller->getResponse()->send();
    }

    public function onError($code, $message) 
    {
        $c = new Controller();
        $c->init();
        $c->error($code, $message);
    }
}