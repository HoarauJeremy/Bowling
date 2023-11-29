<?php
    require_once("modele/modele.php");

    class managerConnexion extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        //Vérifie l'authenticité des informations rentrées à celle de la base (1 = OUI / 0 = NON)
        public function getUtilisateur($username, $password) 
        {
            $sql = "SELECT count(*) FROM Utilisateur WHERE LoginUser = :username AND MdpUser = :password";            
            $rqt = $this->cnx->prepare($sql);
            
            $rqt->bindParam(':username', $username, PDO::PARAM_STR);
            $rqt->bindParam(':password', $password, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();

            return $result;
        }
    }
?>