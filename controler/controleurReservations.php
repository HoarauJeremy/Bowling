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

    public function addReservation() {
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d H:m:s');

        $data = array($_POST['NbPers'],$currentDate,$_POST['HD'],$_POST['HF'],$_POST['Formule'],$_POST['mailClient']);
        $reservation = $this->manageReservations->addReservation($data);
        include 'vue/vueAllReservations.php';

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

    public function ShowReservations () {
        $reservations = $this->manageReservations->ShowReservations();
        include 'vue/vueAllReservations.php';
    }

    public function IsThereReservation($date){
        $statut = ($this->manageReservations->IsThereReservation($date));
        return $statut;
    }

}
