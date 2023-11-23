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

            function updateInformationsUtilisateur($prenom, $nom, $naissance, $email, $password, $ptsfidelite) {
                require_once('controler/controleurProfil.php');
            
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $prenom = $_POST["prenom"];
                    $nom = $_POST["nom"];
                    $naissance = $_POST["naissance"];
                    $email = $_POST["email"];
                    $password = $_POST["password"];
                    $ptsfidelite = $_POST["ptsfidelite"];
                    $username = $_SESSION['username'];
                }
            
                try {
                    $this->cnx->beginTransaction();

                    $sql = "UPDATE Reservation SET Email=? WHERE Email=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$email, $username]);

                    $sql = "UPDATE Clients SET NomClients=?, PrenomClients=?, DateNaissClients=?, EmailClients=?, PointClients=? WHERE EmailClients=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$nom, $prenom, $naissance, $email, $ptsfidelite, $username]);
            
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "UPDATE Utilsateur SET LoginUser=?, MdpUser=? WHERE LoginUser=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$email, $hashedPassword, $username]);
            
                    $this->cnx->commit();
                } catch (PDOException $e) {
                }
            }
            
    }
?>