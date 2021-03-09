<?php
namespace Core;

use Core\Config;

class Router
{
    public function parseRequest(Request $request)
    {
        $params = explode('/', trim($request->path_info, '/'));

        $request->controller = (empty($params[1]) || $params[1] == '-') ? Config::DEFAULT_CONTROLLER : $params[1];
        $request->method = (empty($params[2]) || $params[2] == '-') ? Config::DEFAULT_METHOD : $params[2];
        $request->params = array_slice($params, 3);
        $request->httpMethod = strtolower($_SERVER['REQUEST_METHOD']);
    }
}