<?php

session_start();

class Controleur {
    public $manageUtilisateur;
    public $manageClient;
    public $manageReservation;
    public $manageAdministration;

    public function __construct(){

        require_once("modele/managerUtilisateur.php");
        $this -> manageUtilisateur = new managerUtilisateur();

        require_once("modele/managerClient.php");
        $this -> manageClient = new managerClient();

        require_once("modele/managerReservation.php");
        $this -> manageReservation = new managerReservation();

        /* require_once("modele/managerAdministration");
        $this -> manageAdministration = new managerAdministration(); */
    }

    public function Dispatcher($action, $id = null){
        switch($action){

            /* case 'reserver' :
                if(){

                }else{

                    break;
                }
        
            
            case 'contacter' :
                if(){

                }else{

                    break;
                }
        
            
            case 'client' :
                if(){

                }else{

                    break;
                }
        
            
            case 'langue' :
                if(){

                }else{

                    break;
                } */
            default:
                include 'vue/vueAccueil.php';
            break;
        }
    }
}

?>