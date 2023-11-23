<?php

class controleurClients
{
    
    public $manageClients;

    public function __construct() {
        require_once("modele/managerClients.php");
        $this->manageClients = new managerClients();
    }

    public function clients () {
        $reservations = $this->manageClients->getClients();
        include 'vue/vueClients.php';
    }

    public function client ($id) {
        $client = $this->manageClients->getClient($id);
        if ($client != null) {
            require_once("modele/administration.php");
            $res = new administration($client);
            include 'vue/vueClient.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    /* public function reservation ($id) {
        $reservation = $this->manageClients->getClient($id);
        if ($reservation != null) {
            require_once("modele/administration.php");
            $res = new administration($reservation);
            include 'vue/vueReservation.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    public function modifier ($id) {
        $element = $this->manageClients->getClient($id);
        if ($element != null) {
            require_once("modele/administration.php");
            $modifreservation = new administration($element);
            include 'vue/vueModifAdmin.php';
        } else {
            include 'vue/vueErreur.php';
        }
    } */

/*     public function supprimer ($id) {
        $element = $this->manageClients->deleteClient($id);
        if ($element != null) {
            $message = "La réservation n° ".$id." a été supprimé avec succès!";
            header('Location: index.php?url=Reservations/');
        } else {
            include 'vue/vueReservations.php';
        }
    } */

}
