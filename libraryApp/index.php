<?php
/*
// FRONT CONTROLLER

//1. General settings.
ini_set('display_errors', 1);
error_reporting(E_ALL);

function debug($str){
    echo '<pre>';
    var_dump($str);
    echo'</pre>';
    exit;
}

//2. Connecting system files
define('ROOT', dirname(__FILE__));
require_once(ROOT.'/components/router.php');

require_once(ROOT."/components/db.php");


//3. Establishing a connection to the database


//4. Calling router
$router = new router();
$router->run();*/

require_once 'application/lib/Dev.php';

spl_autoload_register(function ($class){
    $path = str_replace('\\','/',$class).'.php';

    if (file_exists($path)){
        require_once $path;
    }
});

use application\core\Router;

$router = new Router;
$router->run();




























