<?php
namespace Core;

class Request
{
    public $url;

    function __construct()
    {
        $this->path_info = $_SERVER['REQUEST_URI'];
    }
}