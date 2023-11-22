<?php
    class controleurProfil {

        public function __construct() {

        }

        public function getProfil() {
            $username = ($_POST['username']);

            require_once('modele/managerProfil.php');
            $managerProfil = new ManagerProfil();
            
            $informationsUtilisateur = $managerProfil->getInformationsUtilisateur($username);

            if (is_array($informationsUtilisateur)) {
                $prenom = $informationsUtilisateur['PrenomClients'];
                $nom = $informationsUtilisateur['NomClients'];
                $naissance = $informationsUtilisateur['DateNaissClients'];
                $ptsfidelite = $informationsUtilisateur['PointClients'];  

                return [
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'naissance' => $naissance,
                    'ptsfidelite' => $ptsfidelite,
                ];
            }
        }
    }
?>