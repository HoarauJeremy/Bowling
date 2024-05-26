<?php

require_once("modele/modele.php");

/**
 * Gère les opérations liées aux clients en accédant à la base de données.
 */
class managerClients extends Connexiondb {

    /**
     * Constructeur de la classe.
     */
    public function __construct() {
        parent::__construct();
    }

    /**
     * Récupère tous les clients depuis la base de données.
     * 
     * @return array Les données des clients
     */
    public function getClients() {
        $sql = "SELECT * FROM Clients;";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute();
        $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor();
        return $clients;
    }

    /**
     * Récupère les données d'un client en fonction de son identifiant.
     * 
     * @param int $id L'identifiant du client
     * @return array|null Les données du client ou null si non trouvé
     */
    public function getClient($id) {
        $sql = "SELECT * FROM Clients WHERE idUser = ?";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
        $client = $rqt->fetch(PDO::FETCH_ASSOC);
        $rqt->closeCursor();
        return $client;
    }

    /**
     * Supprime un client de la base de données.
     * 
     * @param int $id L'identifiant du client à supprimer
     * @return void
     */
    public function deleteClient($id) {
        $sql = "DELETE FROM Clients WHERE idUser = ?";
        $rqt = $this->cnx->prepare($sql);
        $rqt->execute(array($id));
    }

    /**
     * Récupère les réservations d'un client en fonction de son identifiant.
     * 
     * @param int $idClient L'identifiant du client
     * @return array Les réservations du client
     */
    public function getReservationClient($idClient) {
        $sql = "SELECT r.* FROM Clients c INNER JOIN Reservation r ON c.IdUser = r.IdUser  WHERE c.idUser = ?";
        $rqt = $this->executeRequete($sql, [$idClient]);
        $reservationClient = $rqt->fetchAll(PDO::FETCH_ASSOC);
        $rqt->closeCursor();
        return $reservationClient;
    }

    /**
     * Définit le format de la date de naissance.
     * 
     * @param DateTime $dateNaiss La date de naissance
     * @return string La date de naissance formatée
     */
    public static function formatDateNaiss($dateNaiss) {
        $jour = $dateNaiss->format('d');
        $annee = $dateNaiss->format('Y');
        $mois = $dateNaiss->format('m');
        return $jour . '/' . $mois . '/' . $annee;
    }
}

?>