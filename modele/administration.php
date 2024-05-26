<?php
/**
 * Accès aux données pour gérer les clients
 */
class administration {
    
    /** @var string Connexion */
    private string $cnx;
    
    /** @var string Numéro de réservation */
    public string $NumReservation;
    /** @var string ID de la réservation */
    public string $IdReservation;
    /** @var string Client */
    public string $client;
    /** @var int Nombre de personnes */
    public int $NbrPersonne;
    /** @var mixed Date de création de la réservation */
    public $DateCreaRes;
    /** @var mixed Date de la réservation */
    public $DateReservation;
    /** @var mixed Heure de début */
    public $HeureDebut;
    /** @var mixed Heure de fin */
    public $HeureFin;
    /** @var mixed Formule */
    public $formule;
    /** @var mixed Piste */
    public $piste;
    /** @var mixed Mail de la réservation */
    public $MailReservation;
    /** @var mixed ID de l'utilisateur */
    public $IdUser;
    /** @var int ID de la piste */
    public int $p;
    /** @var int ID de la formule */
    public $f;

    /**
     * Constructeur de la classe administration
     * @param array $donnees Les données de la réservation
     */
    public function __construct(array $donnees) {
        $this->hydrate($donnees);
    }

    /**
     * Initialise les attributs de l'objet avec les données fournies
     * @param array $donnees Les données de la réservation
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
     * Getter pour l'ID de la réservation
     * @return string
     */
    public function getIdReservation() {
        return $this->IdReservation;
    }

    /**
     * Getter pour le numéro de réservation
     * @return string
     */
    public function getNumReservation() {
        return $this->NumReservation;
    }

    /**
     * Getter pour le client
     * @return string
     */
    public function getClient() {
        return $this->client;
    }

    /**
     * Getter pour le nombre de personnes
     * @return int
     */
    public function getNbrPersonne() {
        return $this->NbrPersonne;
    }

    /**
     * Getter pour la date de création de la réservation
     * @return mixed
     */
    public function getDateCreaRes() {
        return $this->DateCreaRes;
    }

    /**
     * Getter pour la date de la réservation
     * @return mixed
     */
    public function getDateReservation() {
        return $this->DateReservation;
    }

    /**
     * Getter pour l'heure de début
     * @return mixed
     */
    public function getHeureDebut() {
        return $this->HeureDebut;
    }

    /**
     * Getter pour l'heure de fin
     * @return mixed
     */
    public function getHeureFin() {
        return $this->HeureFin;
    }

    /**
     * Getter pour le nom de la piste
     * @return mixed
     */
    public function getNomPiste() {
        return $this->piste;
    }

    /**
     * Getter pour le nom de la formule
     * @return mixed
     */
    public function getNomFormule() {
        return $this->formule;
    }

    /**
     * Getter pour l'ID de la piste
     * @return int
     */
    public function getIdPiste() {
        return $this->p;
    }

    /**
     * Getter pour l'ID de la formule
     * @return int
     */
    public function getIdFormule() {
        return $this->f;
    }

    /**
     * Getter pour le mail de la réservation
     * @return mixed
     */
    public function getMailReservation() {
        return $this->MailReservation;
    }

    /**
     * Getter pour l'ID de l'utilisateur
     * @return mixed
     */
    public function getIdUser() {
        return $this->IdUser;
    }

    /**
     * Setter pour l'ID de la réservation
     * @param string $IdReservation
     * @return void
     */
    public function setIdReservation($IdReservation) {
        $this->IdReservation = $IdReservation;
    }

    /**
     * Setter pour le numéro de réservation
     * @param string $NumReservation
     * @return void
     */
    public function setNumReservation($NumReservation) {
        $this->NumReservation = $NumReservation;
    }

    /**
     * Setter pour le client
     * @param string $client
     * @return void
     */
    public function setClient($client) {
        $this->client = $client;
    }

    /**
     * Setter pour le nombre de personnes
     * @param int $NbrPersonne
     * @return void
     */
    public function setNbrPersonne($NbrPersonne) {
        $this->NbrPersonne = $NbrPersonne;
    }

    /**
     * Setter pour la date de création de la réservation
     * @param mixed $DateCreaRes
     * @return void
     */
    public function setDateCreaRes($DateCreaRes) {
        $this->DateCreaRes = $DateCreaRes;
    }

    /**
     * Setter pour la date de la réservation
     *
     * @param mixed $DateReservation
     * @return void
     */
    public function setDateReservation($DateReservation) {
        $this->DateReservation = $DateReservation;
    }

    /**
     * Setter pour l'heure de début
     * @param mixed $HeureDebut
     * @return void
     */
    public function setHeureDebut($HeureDebut) {
        $this->HeureDebut = $HeureDebut;
    }

    /**
     * Setter pour l'heure de fin
     * @param mixed $HeureFin
     * @return void
     */
    public function setHeureFin($HeureFin) {
        $this->HeureFin = $HeureFin;
    }

    /**
     * Setter pour le nom de la formule
     * @param mixed $NomFormule
     * @return void
     */
    public function setNomFormule($NomFormule) {
        $this->formule = $NomFormule;
    }

    /**
     * Setter pour le nom de la piste
     * @param mixed $NomPiste
     * @return void
     */
    public function setNomPiste($NomPiste) {
        $this->piste = $NomPiste;
    }

    /**
     * Setter pour l'ID de la piste
     * @param int $p
     * @return void
     */
    public function setIdPiste($p) {
        $this->p = $p;
    }

    /**
     * Setter pour l'ID de la formule
     * @param int $f
     * @return void
     */
    public function setIdFormule($f) {
        $this->f = $f;
    }

    /**
     * Setter pour le mail de la réservation
     * @param mixed $MailReservation
     * @return void
     */
    public function setMailReservation($MailReservation) {
        $this->$MailReservation = $MailReservation;
    }

    /**
     * Setter pour l'ID de l'utilisateur
     * @param mixed $IdUser
     * @return void
     */
    public function setIdUser($IdUser) {
        $this->IdUser = $IdUser;
    }
}
?>