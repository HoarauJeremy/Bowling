<?php
    require_once("modele/modele.php");

    class managerInscription extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function insertUtilisateur($prenom, $nom, $naissance, $email, $ptsfidelite, $password){  

            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            $sql = "INSERT INTO Utilisateur (IdUser, LoginUser, MdpUser, typeUser) VALUES (?, ?, ?, ?)";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute([NULL, $email, $hashedPassword, 1]);

            $sql = "INSERT INTO Clients (NomClients, PrenomClients, DateNaissClients, EmailClients, PointClients) VALUES (?, ?, ?, ?, ?)";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute([$nom, $prenom, $naissance, $email, $ptsfidelite]);

            require_once("controler/controleurConnexion.php");
            $controleurConnexion = new controleurConnexion();
            $controleurConnexion->PageConnexion();
        }
    }
?>