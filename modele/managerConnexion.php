<?php
    require_once("modele/modele.php");

    class managerConnexion extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getUtilisateur($username, $password)
        {
            $sql = "SELECT count(*) FROM Utilisateur WHERE LoginUser = :username AND MdpUser = :password";            
            $rqt = $this->cnx->prepare($sql);
            
            // Liaison des valeurs, moins de chances pour une insertion de code dangereux/indésiré 
            $rqt->bindParam(':username', $username, PDO::PARAM_STR);
            $rqt->bindParam(':password', $password, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
            return $result;
        }
        
    }
?>