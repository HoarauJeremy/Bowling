<?php
    require_once("modele/modele.php");

    class managerClients extends Connexiondb {
        public function __construct() {
            parent :: __construct();
        }

        // Extraction des données des adhérents depuis la base de données.
        public function getClients()
        {
            $sql = "SELECT * FROM Clients;";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute();
            $clients = $rqt->fetchAll(PDO::FETCH_ASSOC);
            $rqt->closeCursor(); // Achève le traitement de la requête
            return $clients;
        }

        public function getClient($id) {
            $sql = "";
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute(array($id));
            $client = $rqt->fetch(PDO::FETCH_ASSOC);
            $rqt->closeCursor();
            return $client;
        }

        public function addClient() {

        }
        
        /**
         * Definit le format de la date de naissance
         * @param $dateNaiss
         * @return string
         */
        static function formatDateNaiss($dateNaiss) {
            $jour = $dateNaiss->format('d');
            $annee = $dateNaiss->format('Y');
            $mois = $dateNaiss->format('m');
            return $jour.'/'. $mois .'/'. $annee;
        }
    }
?>