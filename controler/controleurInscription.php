<?php
    class controleurInscription {
        public function PageInscription() { //Redirige vers la page d'inscription
            include("vue/vueInscription.php");
        }

        public function Inscription() {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $iduser = 0;
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $naissance = $_POST["naissance"];
                $email = $_POST["email"];
                $password = $_POST["password"];
                $ptsfidelite = 0;
            }

            require_once('modele/managerInscription.php');
            $managerInscription = new managerInscription();
            $managerInscription->updateClients($id, $prenom, $nom, $naissance, $email, $ptsfidelite);
        }

    }
?>