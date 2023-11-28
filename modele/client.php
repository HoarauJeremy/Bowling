<?php

    class client {

        // Connexion
		private string $cnx;

        public $IdUser;
		public string $nomClient;
		public string $prenom;
		public $dateNaiss;
		public $email;
		public $point;

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
		public function getIdUser()				{return $this->IdUser;}
		public function getNomClients()				{return $this->nomClient;}
		public function getPrenomClients()			{return $this->prenom;}
		public function getDateNaissClients()		{return $this->dateNaiss;}
		public function getEmailClients()			{return $this->email;}
		public function getPointClients()			{return $this->point;}

        // setter Clients
		public function setIdUser($IdUser)							{$this->IdUser = $IdUser;}
		public function setNomClients($Nom)							{$this->nomClient = $Nom;}
		public function setPrenomClients($Prenom)					{$this->prenom = $Prenom;}
		public function setDateNaissClients($dateNaiss)				{$this->dateNaiss = $dateNaiss;}
		public function setEmailClients($Email)						{$this->email = $Email;}
		public function setPointClients($point)						{$this->point = $point;}

    }
    