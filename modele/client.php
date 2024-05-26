<?php

/**
 * Représente un client
 */
class client {

    /** @var string Connexion */
    private string $cnx;

    /** @var int Identifiant de l'utilisateur */
    public $IdUser;
    /** @var string Nom du client */
    public string $nomClient;
    /** @var string Prénom du client */
    public string $prenom;
    /** @var mixed Date de naissance du client */
    public $dateNaiss;
    /** @var mixed Adresse email du client */
    public $email;
    /** @var mixed Points de fidélité du client */
    public $point;

    /**
     * Constructeur de la classe client
     * @param array $donnees Les données du client
     */
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    /**
     * Initialise les attributs de l'objet avec les données fournies
     * @param array $donnees Les données du client
     * @return void
     */
    public function hydrate(array $donnees) {
        foreach ($donnees as $key => $value) {
            $method = 'set'.ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    /**
     * Getter pour l'identifiant de l'utilisateur
     * @return int
     */
    public function getIdUser() {
        return $this->IdUser;
    }

    /**
     * Getter pour le nom du client
     * @return string
     */
    public function getNomClients() {
        return $this->nomClient;
    }

    /**
     * Getter pour le prénom du client
     * @return string
     */
    public function getPrenomClients() {
        return $this->prenom;
    }

    /**
     * Getter pour la date de naissance du client
     * @return mixed
     */
    public function getDateNaissClients() {
        return $this->dateNaiss;
    }

    /**
     * Getter pour l'adresse email du client
     * @return mixed
     */
    public function getEmailClients() {
        return $this->email;
    }

    /**
     * Getter pour les points de fidélité du client
     * @return mixed
     */
    public function getPointClients() {
        return $this->point;
    }

    /**
     * Setter pour l'identifiant de l'utilisateur
     * @param int $IdUser
     * @return void
     */
    public function setIdUser($IdUser) {
        $this->IdUser = $IdUser;
    }

    /**
     * Setter pour le nom du client
     * @param string $Nom
     * @return void
     */
    public function setNomClients($Nom) {
        $this->nomClient = $Nom;
    }

    /**
     * Setter pour le prénom du client
     * @param string $Prenom
     * @return void
     */
    public function setPrenomClients($Prenom) {
        $this->prenom = $Prenom;
    }

    /**
     * Setter pour la date de naissance du client
     * @param mixed $dateNaiss
     * @return void
     */
    public function setDateNaissClients($dateNaiss) {
        $this->dateNaiss = $dateNaiss;
    }

    /**
     * Setter pour l'adresse email du client
     * @param mixed $Email
     * @return void
     */
    public function setEmailClients($Email) {
        $this->email = $Email;
    }

    /**
     * Setter pour les points de fidélité du client
     * @param mixed $point
     * @return void
     */
    public function setPointClients($point) {
        $this->point = $point;
    }

}