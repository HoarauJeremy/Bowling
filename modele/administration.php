<?php
	/**
	 * Accès aux données pour gérer les clients
	 */
	class administration {
		
		// Connexion
		private string $cnx;
		
		// Colonne Client
		public string $nomClient;
		public string $prenom;
		public $dateNaiss;
		public $email;
		public $point;

		//  Vue vueReservation
		public string $NumReservation;
		public string $IdReservation;
		public string $client;
		public int $NbrPersonne;
		public $DateDeReservation;
		public $DebutReservation;
		public $FinReservation;
		public $formule;
		public $piste;

		public $idUser;

		public int $p;
		public $f;

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
		public function getNomClients()				{return $this->nomClient;}
		public function getPrenomClients()			{return $this->prenom;}
		public function getDateNaissClients()		{return $this->dateNaiss;}
		public function getEmailClients()			{return $this->email;}
		public function getPointClients()			{return $this->point;}

		// getter Reservations
		public function getIdReservation()     		{return $this->IdReservation;}
		public function getNumReservation()     	{return $this->NumReservation;}
		public function getClient() 				{return $this->client;}
		public function getNbrPersonne()			{return $this->NbrPersonne;}
		public function getDateDeReservation()		{return $this->DateDeReservation;}
		public function getDebutReservation()		{return $this->DebutReservation;}
		public function getFinReservation()			{return $this->FinReservation;}
		public function getNomPiste()				{return $this->piste;}
		public function getNomFormule()				{return $this->formule;}
		public function getIdPiste() {return $this->p;}
		public function getIdFormule() {return $this->f;}
		public function getidUser() {return $this->idUser;}

		// setter Clients
		public function setNomClients($Nom)							{$this->nomClient = $Nom;}
		public function setPrenomClients($Prenom)					{$this->prenom = $Prenom;}
		public function setDateNaissClients($dateNaiss)				{$this->dateNaiss = $dateNaiss;}
		public function setEmailClients($Email)						{$this->email = $Email;}
		public function setPointClients($point)						{$this->point = $point;}

		// setter Reservations
		public function setIdReservation($IdReservation)			{$this->IdReservation = $IdReservation;}
		public function setNumReservation($NumReservation)			{$this->NumReservation = $NumReservation;}
		public function setClient($client) 							{$this->client = $client;}
		public function setNbrPersonne($NbrPersonne)				{$this->NbrPersonne = $NbrPersonne;}
		public function setDateDeReservation($DateDeReservation)	{$this->DateDeReservation = $DateDeReservation;}
		public function setDebutReservation($DateDebutReservation)	{$this->DebutReservation = $DateDebutReservation;}
		public function setFinReservation($DateDeFinReservation)	{$this->FinReservation = $DateDeFinReservation;}
		public function setNomFormule($NomFormule) 					{$this->formule = $NomFormule;}
		public function setNomPiste($NomPiste) 						{$this->piste = $NomPiste;}
		public function setIdPiste($p) {$this->p = $p;}
		public function setIdFormule($f) {$this->f = $f;}
		public function setidUser($idUser) {$this->idUser = $idUser;}

	}

?>