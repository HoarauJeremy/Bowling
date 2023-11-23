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

            function updateInformationsUtilisateur($prenom, $nom, $naissance, $email, $password) {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $prenom = $_POST["prenom"];
                $nom = $_POST["nom"];
                $naissance = $_POST["naissance"];
                $email = $_POST["email"];
                $password = $_POST["password"];
            }

                $sql = ("UPDATE Clients (NomClients, PrenomClients, DateNaissClients, EmailClients) VALUES (?, ?, ?, ?)");
                $rqt = $this->cnx->prepare($sql);                
                $rqt->execute([$nom, $prenom, $naissance, $email]);

                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                $sql = ("UPDATE Utilisateur (LoginUser, MdpUser) VALUES (?, ?)");
                $rqt = $this->cnx->prepare($sql);                
                $rqt->execute([$email, $hashedPassword]);
            }
    }
?>