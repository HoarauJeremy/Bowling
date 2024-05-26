<?php

/**
 * Classe controleurClients
 */
class controleurClients
{
    /**
     * @var managerClients
     */
    public $manageClients;

    /**
     * Constructeur de la classe controleurClients
     */
    public function __construct() {
        require_once("modele/managerClients.php");
        $this->manageClients = new managerClients();
    }

    /**
     * Affiche la liste des clients.
     *
     * @return void
     */
    public function clients() {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $reservations = $this->manageClients->getClients();
            include 'vue/vueClients.php';
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    /**
     * Affiche les détails d'un client spécifique.
     *
     * @param int $id L'ID du client.
     *
     * @return void
     */
    public function client($id) {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $client = $this->manageClients->getClient($id);
            if ($client != null) {
                require_once("modele/client.php");
                $res = new client($client);
                include 'vue/vueClient.php';
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    /**
     * Affiche les réservations d'un client spécifique.
     *
     * @param int $id L'ID du client.
     *
     * @return void
     */
    public function reservations($id) {
        if ($_SESSION["type"] == 1 && $_SESSION['CONNECTER'] == "OK") {
            $reservation = $this->manageClients->getReservationClient($id);
            if ($reservation != null) {
                require_once("modele/client.php");
                $res = new administration($reservation);
                include 'vue/vueReservationsClients.php';
            } else {
                include 'vue/vueAucuneReservation.php';
            }
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    /**
     * Supprime un client spécifique.
     *
     * @param int $id L'ID du client.
     *
     * @return void
     */
    public function supprimer($id) {
        if ($_SESSION["type"] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $element = $this->manageClients->deleteClient($id);
            if ($element != null) {
                $message = "Le client n° ".$id." a été supprimé avec succès!";
                header('Location: index.php?url=Clients/clients');
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueAccueil.php';
        }
    }
}
?>