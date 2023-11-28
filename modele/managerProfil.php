<?php
    require_once("modele/modele.php");

    class managerProfil extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        // Fonction renvoyant le mot de passe d'un utilisateur en fonction de son login
        public function getMDP($username){
            $sql = "SELECT MdpUser FROM Utilisateur WHERE LoginUser = :username";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':username', $username, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetchColumn();
            $rqt->closeCursor();

            // Renvoie du mot de passe de l'utilisateur
            return $result;
        }

        // Fonction renvoyant l'ensemble des informations d'un utilisateur en fonction de son email
        // La fonction affiche un message d'erreur si une erreur se produit et renvoie un tableau vide
        public function getInformationsUtilisateur($username) {
            try {
                $sql = "SELECT * FROM Clients WHERE EmailClients = :username";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':username', $username, PDO::PARAM_STR);
                $rqt->execute();

                if ($rqt->rowCount() > 0) {
                    $result = $rqt->fetch(PDO::FETCH_ASSOC);
                    $rqt->closeCursor();

                    // Renvoie des informations de l'utilisateur
                    return $result;
                } else {

                    // Si aucune information n'est présente, renvoie un tableau vide
                    return [];
                }
                } catch (PDOException $e) {

                    // Affichage du message d'erreur
                    echo "Erreur SQL : " . $e->getMessage();
                    return [];
                }
            }


        // Fonction permettant la mise à jour des informations d'un utilisateur
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

                // Vérifie si l'email est associé à une réservation
                $sql = "SELECT count(*) FROM Reservation WHERE EmailClients=?"; 
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute([$username]);
                $result = $rqt->fetchColumn();
                
                // Si oui, récupérer le numéro de la réservation et changer l'email de la réservation
                if ($result >= 1){ 
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

                    } 
                        // Sinon, alors changer les informations du client
                        else { 
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