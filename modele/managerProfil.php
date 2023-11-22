<?php
    require_once("modele/modele.php");

    class managerProfil extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getInformationsUtilisateur($username){ //Récupère les informations du client (Nom, Prenom, etc...)
            $sql = "SELECT * FROM Clients WHERE EmailClients = :username";            
            $rqt = $this->cnx->prepare($sql);

            $rqt->bindParam(':username', $username, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
            return $result;
        }
    }
?>