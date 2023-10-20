<?php
    require_once("modele/modele.php");


    class managerAdministration extends Connexiondb {

        public function __construct() {
            parent::__construct();
        }
        
        // Extraction des données des adhérents depuis la base de données.
        public function getClients()
        {
            $sql = "SELECT * FROM Clients;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $adherents = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $adherents;
        }

        public function getReservations()
        {
            $sql = "SELECT * FROM Reservation;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $adherents = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $adherents;
        }

        // Récupère les données d'une reservation et du client déterminé par le numero de la reservation
        public function getReservation($id)
        {
            $sql = "SELECT * FROM vueReservation WHERE NumReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $adherent = $rqt->fetch();
            $rqt->closeCursor();
            return $adherent;
        }

        // Supprime les données d'une reservation déterminé par son id
        public function deleteReservation($id)
        {
            $sql = "DELETE FROM Reservation WHERE NumReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $resultat = $rqt->execute(array($id));
            return $resultat;
        }

        // Ajouter une reservation
        public function addReservation(array $reservation)
        {
            $sql = "INSERT INTO adherent(NumReservation, NbrPersonne, PrixReservation, DateDebutReservation, DateDeFinReservation, IdFormule, IdPiste) VALUES(?,?,?,?,?,?,?,?)";
            $rqt = $this->cnx->prepare($sql);
            $resultat  = $rqt->execute(array($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6]));
            return $resultat;
        }


        // Modifier une reservation
        public function updateReservation(array $reservation)
        {
            $sql = "UPDATE Reservation SET PrixReservation = ?, PrixReservation = ?, DateDebutReservation = ?, DateDeReservation = ? IdPiste = ?";
            $rqt = $this->cnx->prepare($sql);
            $resultat  = $rqt->execute(array($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4]));
            return $resultat;
        }

        /**
         * definit le format de la date en version française
         * @param $dateCreate
         * @return string
         */
        static function formatDate($dateCreate) {
            $jour = $dateCreate->format('d');
            $annee = $dateCreate->format('Y');
            $heure = $dateCreate->format('H:i:s');        
            $mois = array(1=>" janvier "," février "," mars "," avril "," mai "," juin "," juillet "," août "," septembre "," octobre "," novembre "," décembre ");
            return $jour.' '. $mois[$dateCreate->format('m')] .' '. $annee .' à '. $heure;
        }

    }
