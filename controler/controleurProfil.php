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

        public function updateInfos() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $iduser = $_POST["iduser"];
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $naissance = $_POST["naissance"];
                $email = $_POST["email"];
                $username = $_SESSION['username'];
            }

            require_once('modele/managerProfil.php');
            $managerProfil = new ManagerProfil();
            $managerProfil->updateClient($prenom, $nom, $naissance, $email, $username);
        }

        public function updateMDP() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $password = $_POST["password"];
                $username = $_SESSION['username'];
            }
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            require_once('modele/managerProfil.php');
            $managerProfil = new ManagerProfil();
            $managerProfil->newMDP($hashedPassword, $username);
        }
    }
?>