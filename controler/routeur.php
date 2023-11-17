<?php
session_start();

$controller = isset($_GET['controleur']) ? $_GET['controleur'] : 'Acceuil';
$method = isset($_GET['method']) ? $_GET['method'] : 'Acceuil';

require_once "controler/controleurAdmin.php";
require_once "controler/controleurConnexion.php";

$controller = "controleur".$controller;
call_user_func([new $controller(), $method]);
?>