<?php

class controleurReservations
{
    
    public $manageReservations;

    public function __construct() {
        require_once("modele/managerReservations.php");
        $this->manageReservations = new managerReservations();
    }

    public function Reservations () {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $reservations = $this->manageReservations->getReservations();
            include 'vue/vueReservations.php';
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    public function reservation ($id) {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $reservation = $this->manageReservations->getRes($id);
            if ($reservation != null) {
                require_once("modele/administration.php");
                $res = new administration($reservation);
                include 'vue/vueReservation.php';
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueAccueil.php';
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
        if ($_SESSION['CONNECTER'] == "OK") {
            $element = $this->manageReservations->getRes($id);
            if ($element != null) {
                require_once("modele/administration.php");
                $modifreservation = new administration($element);
                include 'vue/vueModifAdmin.php';
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueConnexion.php';
        }
    }

    public function supprimer ($id) {
        if ($_SESSION['CONNECTER'] == "OK") {
            $element = $this->manageReservations->deleteReservation($id);
            if ($element != null) {
                $message = "La réservation n° ".$id." a été supprimé avec succès!";
                header('Location: index.php');
            } else {
                include 'vue/vueReservations.php';
            }
        } else {
            include 'vue/vueConnexion.php';
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
