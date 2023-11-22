<?php

class controleurProfil {

    public function __construct() {
    }

    public function getProfil() {
        require_once('modele/managerProfil.php');
        $managerProfil = new ManagerProfil();
        
        $informationsUtilisateur = $managerProfil->getInformationsUtilisateur($username);
        
        $prenom = $informationsUtilisateur['PrenomClients'];
        $nom = $informationsUtilisateur['NomClients'];
        $naissance = $informationsUtilisateur['DateNaissClients'];
        $ptsfidelite = $informationsUtilisateur['PointsClients'];
    }    
}
?>