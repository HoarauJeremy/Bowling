<?php

class controleurAdmin {
    public $manageAdmin;

    public function __construct() {
        require_once("modele/managerAdministration.php");
        $this->manageAdmin = new managerAdministration();
    }

    public function Dispatcher($action, $id = null) {
        switch ($action) {
            /* case 'modifier':
                $element = $this->manageAdmin->updateReservation($id);
                require_once("modele/administration.php");
                $reservation = new $reservation($element);
                // include 'vue/';
                break; */
            
            /* case 'supprimer':
                $element = $this->manageAdmin->deleteReservation($id);
                require_once("modele/administration.php");
                $reservation = new $reservation($element);
                // include 'vue/';
                break; */
            
            case 'details':
                $element = $this->manageAdmin->getReservation($id);
                require_once("modele/administration.php");
                $reservation = new administration($element);
                include 'vue/vueReservation.php';
                break;

            case 'reservations':
                $reservations = $this->manageAdmin->getReservations();
                include 'vue/vueReservations.php';
                break;

            case 'connnexion':                 
                include 'vue/vueConnexion.php';
                break;
            
            default:
                // On appel la page d'accueil par défaut
                include 'vue/vueAccueil.php';
                break;
        }
    }
}

?>