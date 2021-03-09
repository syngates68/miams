<?php

namespace Core;

require (ROOT.DS.'vendor/autoload.php');

class Controller
{
    public static $current_controller;
    public $controller_name;
    private $content = [];
    private $twig;

    public function __construct()
    {
        self::$current_controller = $this;
        $this->response = new Response();
        $this->set('BASEURL', BASEURL);
        $this->set('BASELINK', BASELINK);
    }

    public function init()
    {
        $loader = new \Twig\Loader\FilesystemLoader(ROOT.DS.'App\View'.DS);
        //$loader->addPath(ROOT.DS.'FrameWork'.DS.'views', 'lib');

        //$this->addTwigPath($loader);

        $this->twig = new \Twig\Environment($loader, [
            'cache' => ROOT.'/cache/',
            'auto_reload' => true
        ]);

        /*$this->addTwigExtension($this->twig);
        $this->twig->getExtension('Twig_Extension_Core')->setTimezone('Europe/Paris');*/
    }

    public function error($code, $message = NULL)
    {
        $this->controller_name = 'errors';
        http_response_code($code);

        if (isset($message))
        {
            $this->set('message', $message);
            $this->set('title', $message);
        }

        $this->render($code);
    }

    public function set($key, $value = NULL)
    {
        if (is_array($key))
            $this->content += $key;
        else if (isset($value))
            $this->content[$key] = $value;
    }

    public function render($viewName)
    {
        if (substr($viewName, 0, 1) == '/')
            $view = $viewName;
        else
            $view = strtolower($this->controller_name).DS.$viewName;

        $file = $view.'.html.twig';

        $this->response->setBody($this->twig->render($file, $this->content));
        $this->response->send();
    }

    public function redirect($target)
    {
        header('Location: '.$target);
        exit;
    }

    public function getResponse()
    {
        return $this->response;
    }
}