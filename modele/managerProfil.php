<?php

require_once("modele/modele.php");

/**
 * Gère les opérations liées au profil utilisateur en accédant à la base de données.
 */
class managerProfil extends Connexiondb {
    
    /**
     * Constructeur de la classe.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Récupère le mot de passe de l'utilisateur à partir de son login.
     * 
     * @param string $login Le login de l'utilisateur
     * @return string Le mot de passe haché de l'utilisateur
     */
    public function getMDP($login){
        $sql = "SELECT MdpUser FROM Utilisateur WHERE LoginUser = :login";
        $rqt = $this->cnx->prepare($sql);
        $rqt->bindParam(':login', $login, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetchColumn();
        $rqt->closeCursor();
        return $result;
    }

    /**
     * Récupère les informations de l'utilisateur à partir de son login.
     * 
     * @param string $login Le login de l'utilisateur
     * @return array Les informations de l'utilisateur sous forme de tableau associatif
     */
    public function getInformationsUtilisateur($login) {
        try {
            $sql = "SELECT * FROM Clients WHERE EmailClients = :login";
            $rqt = $this->cnx->prepare($sql);
            $rqt->bindParam(':login', $login, PDO::PARAM_STR);
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

    /**
     * Récupère le type de l'utilisateur à partir de son login.
     * 
     * @param string $login Le login de l'utilisateur
     * @return int Le type de l'utilisateur
     */
    public function getType($login) {
        $sql = "SELECT typeUser FROM Utilisateur WHERE LoginUser = :login";
        $rqt = $this->cnx->prepare($sql);
        $rqt->bindParam(':login', $login, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetch(PDO::FETCH_ASSOC);
        return $result["typeUser"];
    }

    /**
     * Met à jour les informations de l'utilisateur.
     * 
     * @param string $prenom Le nouveau prénom de l'utilisateur
     * @param string $nom Le nouveau nom de l'utilisateur
     * @param string $naissance La nouvelle date de naissance de l'utilisateur
     * @param string $email Le nouvel email de l'utilisateur
     * @param string $login Le login de l'utilisateur
     * @return void
     */
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

    /**
     * Met à jour le mot de passe de l'utilisateur.
     * 
     * @param string $hashedPassword Le nouveau mot de passe haché de l'utilisateur
     * @param string $login Le login de l'utilisateur
     * @return void
     */
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