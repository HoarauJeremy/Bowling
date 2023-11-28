<?php

class controleurReservations
{
    
    public $manageReservations;

    public function __construct() {
        require_once("modele/managerReservations.php");
        $this->manageReservations = new managerReservations();
    }

    public function Reservations () {
        $reservations = $this->manageReservations->getReservations();
        include 'vue/vueReservations.php';
    }

    public function reservation ($id) {
        $reservation = $this->manageReservations->getRes($id);
        if ($reservation != null) {
            require_once("modele/administration.php");
            $res = new administration($reservation);
            include 'vue/vueReservation.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    public function ajouter() {
        $reservations = $this->manageReservations->getReservations();
        include 'vue/vueAjoutReservations.php';
    }

    public function add() {
        $reservation = $this->manageReservations->addReservation();

    }

    public function modifier ($id) {
        $element = $this->manageReservations->getRes($id);
        if ($element != null) {
            require_once("modele/administration.php");
            $modifreservation = new administration($element);
            include 'vue/vueModifAdmin.php';
        } else {
            include 'vue/vueErreur.php';
        }
    }

    public function supprimer ($id) {
        $element = $this->manageReservations->deleteReservation($id);
        if ($element != null) {
            $message = "La réservation n° ".$id." a été supprimé avec succès!";
            header('Location: index.php?url=Reservations/');
        } else {
            include 'vue/vueReservations.php';
        }
    }

}
