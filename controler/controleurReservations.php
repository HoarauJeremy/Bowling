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

}
