<?php
    require_once("modele/modele.php");

    class managerProfil extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getMDP($login){
            $sql = "SELECT MdpUser FROM Utilisateur WHERE LoginUser = :login";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':login', $login, PDO::PARAM_STR);
            $rqt->execute();
            $result = $rqt->fetchColumn();
            $rqt->closeCursor();
            return $result;
        }

        //Fonction pour récupérer les informations du client connecté
        public function getInformationsUtilisateur($login) {
            try {
                $sql = "SELECT * FROM Clients WHERE EmailClients = :login";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':login', $login, PDO::PARAM_STR);
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
                    echo "Erreur SQL : " . $e->getMessage();
                    return [];
                }
            }

            public function getType($login) {
                $sql = "SELECT typeUser FROM Utilisateur WHERE LoginUser = :login";
                $rqt = $this->cnx->prepare($sql);
                $rqt->bindParam(':login', $login, PDO::PARAM_STR);
                $rqt->execute();
                $result = $rqt->fetch(PDO::FETCH_ASSOC);
                return $result["typeUser"];
            }

        // Fonction permettant la mise à jour des informations d'un utilisateur
        public function updateClient($prenom, $nom, $naissance, $email, $login) {
            require_once('controler/controleurProfil.php');
        
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $iduser = $_POST["iduser"];
                $login = $_SESSION['login'];
            }
        
            $sql = "SELECT EmailClients FROM Clients WHERE EmailClients=?";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute([$email]);
        
            if ($rqt->fetchColumn() < 1) {
                $sql = "UPDATE Utilisateur SET LoginUser=? WHERE LoginUser=?";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute([$email, $login]);

                $sql = "UPDATE Clients SET IdUser=?, NomClients=?, PrenomClients=?, DateNaissClients=?, EmailClients=? WHERE EmailClients=?";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute([$iduser, $nom, $prenom, $naissance, $email, $login]);

                $_SESSION['login'] = $email;
                $UpdateInfos = "Informations mises à jour avec succès !";
                include('vue/vueProfil.php');
            } else {
                $ErreurEmail = "L'email saisi est déjà utilisé !";
                include("vue/vueProfil.php");
            }
        }

        public function newMDP($hashedPassword, $login) {
            $sql = "UPDATE Utilisateur SET MdpUser=? WHERE LoginUser=?";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute([$hashedPassword, $login]);

            require_once('controler/controleurConnexion.php');
            $managerConnexion = new ControleurConnexion();
            $managerConnexion->Deconnexion();
        }
    }
?>