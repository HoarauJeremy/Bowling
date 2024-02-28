<?php
	/**
	 * Accès aux données pour gérer les clients
	 */
	class administration {
		
		// Connexion
		private string $cnx;
		
		//  Vue vueReservation
		public string $NumReservation;
		public string $IdReservation;
		public string $client;
		public int $NbrPersonne;
		public $DateCreaRes;
		public $DateReservation;
		public $HeureDebut;
		public $HeureFin;
		public $formule;
		public $piste;

		public $MailReservation;
		public $IdUser;

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

		// getter Reservations
		public function getIdReservation()     						{return $this->IdReservation;}
		public function getNumReservation()     					{return $this->NumReservation;}
		public function getClient() 								{return $this->client;}
		public function getNbrPersonne()							{return $this->NbrPersonne;}
		public function getDateCreaRes()							{return $this->DateCreaRes;}
		public function getDateReservation()						{return $this->DateReservation;}
		public function getHeureDebut()								{return $this->HeureDebut;}
		public function getHeureFin()								{return $this->HeureFin;}
		public function getNomPiste()								{return $this->piste;}
		public function getNomFormule()								{return $this->formule;}
		public function getIdPiste() 								{return $this->p;}
		public function getIdFormule()								{return $this->f;}
		public function getMailReservation() 						{return $this->MailReservation;}
		public function getIdUser() 								{return $this->IdUser;}

		// setter Reservations
		public function setIdReservation($IdReservation)			{$this->IdReservation = $IdReservation;}
		public function setNumReservation($NumReservation)			{$this->NumReservation = $NumReservation;}
		public function setClient($client) 							{$this->client = $client;}
		public function setNbrPersonne($NbrPersonne)				{$this->NbrPersonne = $NbrPersonne;}
		public function setDateCreaRes($DateCreaRes)				{$this->DateCreaRes = $DateCreaRes;}
		public function setDateReservation($DateDateReservation)	{$this->DateReservation = $DateDateReservation;}
		public function setHeureDebut($DateDeHeureDebut)			{$this->HeureDebut = $DateDeHeureDebut;}
		public function setHeureFin($HeureFin)						{$this->HeureFin = $HeureFin;}
		public function setNomFormule($NomFormule) 					{$this->formule = $NomFormule;}
		public function setNomPiste($NomPiste) 						{$this->piste = $NomPiste;}
		public function setIdPiste($p) 								{$this->p = $p;}
		public function setIdFormule($f)							{$this->f = $f;}
		public function setMailReservation($MailReservation) 		{$this->$MailReservation = $MailReservation;}
		public function setIdUser($IdUser) 							{$this->IdUser = $IdUser;}

	}

?>