<?php
require_once('controler/controleurAcceuil.php');
require_once('controler/controleurAdmin.php');
require_once('controler/controleurConnexion.php');

$url = isset($_GET['url']) ? $_GET['url'] : 'Acceuil';
$urlParts = explode('/', $url);

$controllerName = 'controleur'.$urlParts[0];
$action = isset($urlParts[1]) ? $urlParts[1] : 'Acceuil';

var_dump($action);

if (class_exists($controllerName)) {
    var_dump($controllerName);
    $controller = new $controllerName;
    if (method_exists($controller, $action)) {
        $controller->$action();
    } else {
        // Handle invalid action
    }
} else {
    // Handle invalid controller
}
?>