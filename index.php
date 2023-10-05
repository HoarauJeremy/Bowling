<?php
    declare(strict_types=1);
    // Toute interaction passe par l'index et est transmise
    // directement au contrôleur responsable du traitement

    require_once("controler/controleur.php");
    $message = "";

    $action = isset($_GET['action']) ? $_GET['action'] : NULL;
    $val = isset($_GET['val']) ? $_GET['val'] : NULL;

    $controller = new Controleur();
    $controller->dispatcher($action, $val);
?>