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
		public $DateDeReservation;
		public $DebutReservation;
		public $FinReservation;
		
		// Colone Formule et Piste
		public $formule;
		public $piste;

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
		public function getIdUser()					{return $this->idClient;}
		public function getNomClients()				{return $this->nomClient;}
		public function getPrenomClients()			{return $this->prenom;}
		public function getEmailClients()			{return $this->email;}

		// getter Reservations
		public function getNumReservation()     	{return $this->numReservation;}
		public function getNbrPersonne()			{return $this->NbrPersonne;}
		public function getDateDeReservation()		{return $this->DateDeReservation;}
		public function getDebutReservation()		{return $this->DebutReservation;}
		public function getFinReservation()			{return $this->FinReservation;}
		
		// getter Formule et Piste
		public function getNomPiste()				{return $this->piste;}
		public function getNomFormule()				{return $this->formule;}

		// setter Clients
		public function setIdUser($idClient)						{$this->idClient = $idClient;}
		public function setNomClients($Nom)							{$this->nomClient = $Nom;}
		public function setPrenomClients($Prenom)					{$this->prenom = $Prenom;}
		public function setEmailClients($Email)						{$this->email = $Email;}

		// setter Reservations
		public function setNumReservation($numReservation)			{$this->numReservation = $numReservation;}
		public function setNbrPersonne($NbrPersonne)				{$this->NbrPersonne = $NbrPersonne;}
		public function setDateDeReservation($DateDeReservation)	{$this->DateDeReservation = $DateDeReservation;}
		public function setDebutReservation($DateDebutReservation)	{$this->DebutReservation = $DateDebutReservation;}
		public function setFinReservation($DateDeFinReservation)	{$this->FinReservation = $DateDeFinReservation;}

		// setter Formule et Piste 
		public function setNomFormule($NomFormule) 					{$this->formule = $NomFormule;}
		public function setNomPiste($NomPiste) 						{$this->piste = $NomPiste;}

	}

?>