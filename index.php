<?php
require_once('controler/controleurAcceuil.php');
require_once('controler/controleurReservations.php');
require_once('controler/controleurConnexion.php');
require_once('controler/controleurClients.php');
require_once('controler/controleurContacter.php');
require_once('controler/controleurReservations.php');
require_once('controler/controleurProfil.php');

$url = isset($_GET['url']) ? $_GET['url'] : 'Acceuil';
$urlParts = explode('/', $url);

$controllerName = 'controleur'.$urlParts[0];
$action = isset($urlParts[1]) ? $urlParts[1] : 'Reservations';

$val = array_slice($urlParts, 2);

if (class_exists($controllerName)) {
    $controller = new $controllerName;
    if (method_exists($controller, $action)) {
        $controller->$action(...($val));
    } else {
        include("vue/vueAccueil.php");    
    }
} else {
    include("vue/vueErreur.php");
}
?>