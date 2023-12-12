<?php
    require_once("modele/modele.php");


    class managerReservations extends Connexiondb {

        public function __construct() {
            parent::__construct();
        }

        /**
         * Récupère l'ensemble des réservation ainsi que leurs informations
         *
         * @param   None
         *
         * @return  array        $reservation       Table des réservation
        */
        public function getReservations()
        {
            $sql = "SELECT * FROM Reservation;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $reservations = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $reservations;
        }

        /**
         * Récupère les données d'une reservation
         * 
         * @param   int         $id                 Identifiant de la réservation
         *
         * @return  array        $reservation       Table d'informations de la réservation
        */
        public function getReservation($id)
        {
            $sql = "SELECT * FROM vueReservation WHERE NumReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $reservation = $rqt->fetch();
            $rqt->closeCursor();
            return $reservation;
        }
        

        /**
         * Récupère les données d'une reservation déterminé par le numero de la reservation
         *
         * @param   int         $id                 Identifiant de la réservation
         *
         * @return  array       $reservation        Table d'informations de la réservation
        */
        public function getRes($id)
        {
            $sql = "SELECT * FROM Reservation WHERE IdReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $reservation = $rqt->fetch();
            $rqt->closeCursor();
            return $reservation;
        }


        /**
         * Supprime les données d'une reservation déterminé par son id
         *
         * @param   int         $id                 Identifiant de la réservation
         *
         * @return  None
        */
        public function deleteReservation($id)
        {
            $sql = "DELETE FROM Reservation WHERE IdReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
        }


        /**
         * Ajout d'une reservation par ses informations
         *
         * @param   array       $reservation        Information concernant la réservation
         *
         * @return  None
        */
        public function addReservation(array $reservation)
        {
            $sql = "INSERT INTO adherent(IdReservation, NbrPersonne, PrixReservation, DateDebutReservation, DateDeFinReservation, IdFormule, IdPiste) VALUES(?,?,?,?,?,?,?,?)";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4], $reservation[5], $reservation[6]));
        }



        /**
         * Modifier les informations d'une reservation
         *
         * @param   int         $id                 Identifiant de la réservation
         *
         * @return  None
        */
        public function updateReservation(array $reservation)
        {
            $sql = "UPDATE Reservation SET DateDebutReservation = ?, DateDeReservation = ? IdPiste = ?";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4]));
        }

        /**
         * definit le format de la date en version française
         * 
         * @param   DateTime    $dateCreate         Date de départ
         * 
         * @return  string                          String de la date dans le format souhaiter
         */
        static function formatDate(DateTime $dateCreate) {
            $jour = $dateCreate->format('d');
            $annee = $dateCreate->format('Y');
            $heure = $dateCreate->format('H\hi');        
            $mois = array(1=>" janvier "," février "," mars "," avril "," mai "," juin "," juillet "," août "," septembre "," octobre "," novembre "," décembre ");
            return $jour.' '. $mois[$dateCreate->format('m')] .' '. $annee .' à '. $heure;
        }
        
        
        public function ShowReservations(){
            $sql = "SELECT DebutReservation, FinReservation FROM Reservation;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $reservations = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête

            // Renvoie la liste des réservations
            return $reservations;
        }

        
        public function IsThereReservation($date){
            $sql = "SELECT count(IdPiste) FROM Reservation WHERE DebutReservation > timestamp('$date');";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $reservation = $rqt->fetch();
            return $reservation;
        }
    }
