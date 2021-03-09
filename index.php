<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);
define('VENDOR', ROOT.DS.'vendor');
define('CORE', ROOT.DS.'Core');

$http = empty($_SERVER['HTTPS']) ? 'http' : 'https';
$srv = $_SERVER['SERVER_NAME'];

define('BASEURL', $http.'://'.$srv.'/test/');
define('BASELINK', $http.'://'.$srv.'/test/public/');

require_once VENDOR.DS.'autoload.php';

require_once CORE.DS.'App.php';
Core\App::init();