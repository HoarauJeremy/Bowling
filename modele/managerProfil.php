<?php
    require_once("modele/modele.php");

    class managerProfil extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getInformationsUtilisateur($username) {
            try {
                $sql = "SELECT * FROM Clients WHERE EmailClients = :username";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':username', $username, PDO::PARAM_STR);
                $rqt->execute();

                if ($rqt->rowCount() > 0) {
                    $result = $rqt->fetch(PDO::FETCH_ASSOC);
                    $rqt->closeCursor();
                    return $result;
                } else {
                    return [];
                }
                } catch (PDOException $e) {
                    echo "Erreur SQL : " . $e->getMessage();
                    return [];
                }
            }
        }
?>