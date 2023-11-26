<?php
    require_once("modele/modele.php");

    class managerProfil extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getMDP($username){
            $sql = "SELECT MdpUser FROM Utilisateur WHERE LoginUser = :username";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':username', $username, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetchColumn();
            $rqt->closeCursor();
            return $result;
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


        public function updateUtilisateur($prenom, $nom, $naissance, $email, $password, $ptsfidelite) {
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

                $sql = "SELECT count(*) FROM Reservation WHERE EmailClients=?"; //Vérifie su l'email est associé à une réservation
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute([$username]);
                $result = $rqt->fetchColumn();
                
                if ($result >= 1){ //Si oui, récupérer le numéro de la réservation et changer l'email de la réservation
                    $sql = "SELECT NumReservation FROM Reservation WHERE EmailClients=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$username]);
                    $result = $rqt->fetchAll(PDO::FETCH_ASSOC);
                    $numReservation = $result[0]['NumReservation'];
                    $sql = "UPDATE Reservation SET EmailClients=? WHERE NumReservation=?";
                    $rqt = $this->cnx->prepare($sql);
                    var_dump($rqt);
                    $rqt->execute([$email, $numReservation]);

                    $sql = "UPDATE Clients SET NomClients=?, PrenomClients=?, DateNaissClients=?, EmailClients=?, PointClients=? WHERE EmailClients=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$nom, $prenom, $naissance, $email, $ptsfidelite, $username]);


                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "UPDATE Utilisateur SET LoginUser=?, MdpUser=? WHERE LoginUser=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$email, $hashedPassword, $username]);
                    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                    $sql = "UPDATE Utilisateur SET LoginUser=?, MdpUser=? WHERE LoginUser=?";
                    $rqt = $this->cnx->prepare($sql);
                    $rqt->execute([$email, $hashedPassword, $username]);

                    } else { //Si non, alors changer les informations du client
                        $sql = "UPDATE Clients SET NomClients=?, PrenomClients=?, DateNaissClients=?, EmailClients=?, PointClients=? WHERE EmailClients=?";
                        $rqt = $this->cnx->prepare($sql);
                        $rqt->execute([$nom, $prenom, $naissance, $email, $ptsfidelite, $username]);


                        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                        $sql = "UPDATE Utilisateur SET LoginUser=?, MdpUser=? WHERE LoginUser=?";
                        $rqt = $this->cnx->prepare($sql);
                        $rqt->execute([$email, $hashedPassword, $username]);
                        
                        require_once('controler/controleurConnexion.php');
                        $managerConnexion = new ControleurConnexion();
                    
                        $managerConnexion->Deconnexion();
                    }
            }

    }
?>