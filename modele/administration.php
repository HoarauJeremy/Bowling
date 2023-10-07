<?php
    /**
     * Accès aux données pour gérer les clients
     */
    class administration {
        
        // Connexion
        private string $cnx;
        // Colonne Client
        public int $idClient;
        public string $nomClient;
        public string $prenom;
        public $email;

        // Colonne Reservation
        public string $numReservation;
        public int $NbrPersonne;
        public $DateDebutReservation;
        public $DateDeFinReservation;
        public $IdFormule;
        public $IdPiste;

        public function __construct(array $donnees) {
            $this->hydrate($donnees);
        }

        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                }
            }
        }

        // getter Clients
        public function getIdUser()             {return $this->idClient;}
        public function getNomClients()         {return $this->nomClient;}
        public function getPrenomClients()      {return $this->prenom;}
        public function getEmailClients()       {return $this->email;}

        // getter Reservations
        public function getNumReservation()         {return $this->numReservation;}
        public function getNbrPersonne()            {return $this->NbrPersonne;}
        public function getDateDebutReservation()   {return $this->DateDebutReservation;}
        public function getDateDeFinReservation()   {return $this->DateDeFinReservation;}
        public function getIdFormule()              {return $this->IdFormule;}
        public function getIdPiste()                {return $this->IdPiste;}

        // setter Clients
        public function setIdUser($idClient)            {$this->idClient = $idClient;}
        public function setNomClients($Nom)           {$this->nomClient = $Nom;}
        public function setPrenomClients($Prenom)     {$this->prenom = $Prenom;}
        public function setEmailClients($Email)       {$this->email = $Email;}

        // getter Reservations
        public function setNumReservation($numReservation)                  {$this->numReservation = $numReservation;}
        public function setNbrPersonne($NbrPersonne)                        {$this->NbrPersonne = $NbrPersonne;}
        public function setDateDebutReservation($DateDebutReservation)      {$this->DateDebutReservation = $DateDebutReservation;}
        public function setDateDeFinReservation($DateDeFinReservation)      {$this->DateDeFinReservation = $DateDeFinReservation;}
        public function setIdFormule($IdFormule)                            {$this->IdFormule = $IdFormule;}
        public function setIdPiste($IdPiste)                                {$this->IdPiste = $IdPiste;}

    }

?>