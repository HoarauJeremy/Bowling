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
            require_once("modele/client.php");
            $res = new client($client);
            include 'vue/vueClient.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    public function reservations ($id) {
        $reservation = $this->manageClients->getReservationClient($id);
        if ($reservation != null) {
            require_once("modele/client.php");
            $res = new client($reservation);
            include 'vue/vueReservationsClients.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    public function ajouter() {
        include 'vue/vueAjoutClients.php';
    }

    public function supprimer ($id) {
        $element = $this->manageClients->deleteClient($id);
        if ($element != null) {
            $message = "La réservation n° ".$id." a été supprimé avec succès!";
            header('Location: index.php?url=Clients/clients');
        } else {
            include 'vue/vueErreur.php';
        }
    }

}
