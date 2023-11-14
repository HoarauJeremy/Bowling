<?php
session_start();

$controller = isset($_GET['controlleur']) ? $_GET['controlleur'] : 'index';
$method = isset($_GET['method']) ? $_GET['method'] : 'index';

require_once "controler/controleurAdmin.php";
require_once "controler/controleurConnexion.php";

//$controller = $controller."Controlleur";
call_user_func([new $controller(), $method]);
?>