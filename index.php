<?php
session_start();
date_default_timezone_set("Brazil/East");

require_once "autoload.php";
require_once "Helpers/Helper.php";

use Controller\Autentica\AutenticaController as AutenticaController;

AutenticaController::autentica();

if (!empty($_GET['r'])) {
    $params = explode('/', $_GET['r']);

    $controller = !empty($params[0])  ? $params[0] : 'Job';
    $method     = !empty($params[1])  ? $params[1] : 'inicia';
    $id         = !empty($params[2])  ? $params[2] : 0;
    $folder     = ucfirst(strtolower($controller));
    $controller = ucfirst(strtolower($controller))."Controller";
} else {
    $folder     = 'Job';
    $controller = 'JobController';
    $method     = 'listing';
    $id         = 0;
}

$namespace  = "Controller"."\\".$folder."\\".$controller;
$controller = new $namespace;
$controller->{$method}($_POST, $id);
