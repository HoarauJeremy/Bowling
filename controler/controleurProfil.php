<?php
    class controleurProfil {

        public function __construct() {

        }

        public function getProfil() {      
            $username = $_SESSION['username'];

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

        public function updateUtilisateur() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $naissance = $_POST["naissance"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $ptsfidelite = $_POST["ptsfidelite"];
                $username = $_SESSION['username'];
            }
            require_once('modele/managerProfil.php');
            $managerProfil = new ManagerProfil();
            
            $managerProfil->updateInformationsUtilisateur($prenom, $nom, $naissance, $email, $password, $ptsfidelite);
            header('Location: vue/vueProfil.php');
        }
    }
?>