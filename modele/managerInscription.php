<?php

require_once("modele/modele.php");

/**
 * Gère les opérations d'inscription en accédant à la base de données.
 */
class managerInscription extends Connexiondb {
    
    /**
     * Constructeur de la classe.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Insère un nouvel utilisateur et client dans la base de données.
     * 
     * @param string $prenom Le prénom de l'utilisateur
     * @param string $nom Le nom de l'utilisateur
     * @param string $naissance La date de naissance de l'utilisateur
     * @param string $email L'adresse email de l'utilisateur
     * @param int $ptsfidelite Les points de fidélité de l'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @return void
     */
    public function insertUtilisateur($prenom, $nom, $naissance, $email, $ptsfidelite, $password){  

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

        // Insertion de l'utilisateur
        $sql = "INSERT INTO Utilisateur (IdUser, LoginUser, MdpUser, typeUser) VALUES (?, ?, ?, ?)";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute([NULL, $email, $hashedPassword, 1]);

        // Insertion du client
        $sql = "INSERT INTO Clients (NomClients, PrenomClients, DateNaissClients, EmailClients, PointClients) VALUES (?, ?, ?, ?, ?)";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute([$nom, $prenom, $naissance, $email, $ptsfidelite]);

        // Redirection vers la page de connexion après inscription
        require_once("controler/controleurConnexion.php");
        $controleurConnexion = new controleurConnexion();
        $controleurConnexion->PageConnexion();
    }
}

?>