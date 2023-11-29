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
                $iduser = $informationsUtilisateur['IdUser'];
                $prenom = $informationsUtilisateur['PrenomClients'];
                $nom = $informationsUtilisateur['NomClients'];
                $naissance = $informationsUtilisateur['DateNaissClients'];
                $ptsfidelite = $informationsUtilisateur['PointClients'];  

                return [
                    'iduser'=> $iduser,
                    'prenom' => $prenom,
                    'nom' => $nom,
                    'naissance' => $naissance,
                    'ptsfidelite' => $ptsfidelite,
                ];
            }
        }

        public function updateClient() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $iduser = $_POST["iduser"];
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
            
            $managerProfil->updateUtilisateur($prenom, $nom, $naissance, $email, $password, $ptsfidelite);
        }
    }
?>