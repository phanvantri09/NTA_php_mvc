
<?php
session_start();
require './Controller/BaseController.php';
$controllerName = ucfirst((strtolower($_REQUEST['controller']) ?? 'Welcome') .'Controller');
$actionName = $_REQUEST['action'] ?? 'index';
require "./Controller/${controllerName}.php";
$controllerObject = new $controllerName;
$controllerObject->$actionName();
?>
