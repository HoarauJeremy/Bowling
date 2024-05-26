<?php
require_once("modele/modele.php");

/**
 * Gère les opérations liées aux réservations en accédant à la base de données.
 */
class managerReservations extends Connexiondb {

    /**
     * Constructeur de la classe.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Récupère l'ensemble des réservations ainsi que leurs informations.
     *
     * @return array Tableau contenant les réservations
     */
    public function getReservations() {
        $sql = "SELECT * FROM Reservation;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $reservations = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $reservations;
    }


        /**
         * Récupère les données d'une réservation en fonction de son identifiant.
         *
         * @param int $id Identifiant de la réservation
         * @return array|null Tableau contenant les informations de la réservation ou null si non trouvé
         */
        /*
        public function getRes($id) {
            $sql = "SELECT * FROM Reservation WHERE IdReservation = ?;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $reservation = $rqt->fetch();
            $rqt->closeCursor();
            return $reservation;
        }*/
        

    /**
     * Supprime les données d'une réservation en fonction de son identifiant.
     *
     * @param int $id Identifiant de la réservation à supprimer
     * @return void
     */
    public function deleteReservation($id) {
        $sql = "DELETE FROM Reservation WHERE IdReservation = ?;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
    }

    /**
     * Ajoute une nouvelle réservation en utilisant les informations fournies.
     *
     * @param array $data Informations concernant la réservation
     * @return void
     */
    public function addReservation(array $data) {
        $sql = "INSERT INTO Reservation (NbrPersonne, PrixReservation,DateReservation, HeureDebut, HeureFin,IdFormule, MailReservation) VALUES(?,?,?,?,?,?,?)";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($data[0], 1 ,$data[1], $data[2], $data[3], $data[4], $data[5]));
    }

    /**
     * Met à jour les informations d'une réservation.
     *
     * @param array $reservation Tableau contenant les nouvelles informations de la réservation
     * @return void
     */
    public function updateReservation(array $reservation) {
        $sql = "UPDATE Reservation SET DateDebutReservation = ?, DateDeReservation = ? IdPiste = ?";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($reservation[0], $reservation[1], $reservation[2], $reservation[3], $reservation[4]));
    }

    /**
     * Formate la date en français.
     *
     * @param DateTime $dateCreate Date de départ
     * @return string La date formatée en français
     */
    static function formatDate(DateTime $dateCreate) {
        $jour = $dateCreate->format('d');
        $annee = $dateCreate->format('Y');
        $mois = array(1=>" janvier "," février "," mars "," avril "," mai "," juin "," juillet "," août "," septembre "," octobre "," novembre "," décembre ");
        return $jour.' '. $mois[$dateCreate->format('m')] .' '. $annee;
    }

    /**
     * Formate l'heure.
     *
     * @param DateTime $HeureCreate Heure
     * @return string L'heure formatée
     */
    static function formatHeure(DateTime $HeureCreate) {
        $heure = $HeureCreate->format('H\hi');
        return $heure;
    }

    /**
     * Affiche toutes les réservations.
     *
     * @return array Tableau contenant les informations sur toutes les réservations
     */
    public function ShowReservations() {
        $sql = "SELECT DateReservation, HeureDebut, HeureFin FROM Reservation;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $reservations = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor(); // Achève le traitement de la requête
        return $reservations;
    }

    /**
     * Vérifie s'il y a une réservation à la date spécifiée.
     *
     * @param string $date Date à vérifier
     * @return mixed Le nombre de réservations trouvées
     */
    public function IsThereReservation($date) {
        $sql = "SELECT count(IdPiste) FROM Reservation WHERE DebutReservation > timestamp('$date');";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $reservation = $rqt->fetch();
        return $reservation;
    }
}
?>
