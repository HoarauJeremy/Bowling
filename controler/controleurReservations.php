<?php

/**
 * Classe controleurReservations
 */
class controleurReservations
{
    /**
     * @var managerReservations
     */
    public $manageReservations;

    /**
     * Constructeur de la classe controleurReservations
     */
    public function __construct() {
        require_once("modele/managerReservations.php");
        $this->manageReservations = new managerReservations();
    }

    /**
     * Affiche les réservations.
     *
     * @return void
     */
    public function Reservations() {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $reservations = $this->manageReservations->getReservations();
            include 'vue/vueReservations.php';
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    /**
     * Affiche une réservation spécifique.
     *
     * @param int $id L'ID de la réservation.
     *
     * @return void
     */
    public function reservation($id) {
        if ($_SESSION['type'] == 2 && $_SESSION['CONNECTER'] == "OK") {
            $reservation = $this->manageReservations->getRes($id);
            if ($reservation != null) {
                require_once("modele/administration.php");
                $res = new administration($reservation);
                include 'vue/vueReservation.php';
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueAccueil.php';
        }
    }

    /**
     * Ajoute une nouvelle réservation.
     *
     * @return void
     */
    public function addReservation() {
        $currentDateTime = new DateTime('now');
        $currentDate = $currentDateTime->format('Y-m-d H:m:s');

        $data = array($_POST['NbPers'],$currentDate,$_POST['HD'],$_POST['HF'],$_POST['Formule'],$_POST['mailClient']);
        $reservation = $this->manageReservations->addReservation($data);
        include 'vue/vueAllReservations.php';
    }

    /**
     * Modifie une réservation spécifique.
     *
     * @param int $id L'ID de la réservation à modifier.
     *
     * @return void
     */
    public function modifier($id) {
        if ($_SESSION['CONNECTER'] == "OK") {
            $element = $this->manageReservations->getRes($id);
            if ($element != null) {
                require_once("modele/administration.php");
                $modifreservation = new administration($element);
                include 'vue/vueModifAdmin.php';
            } else {
                include 'vue/vueErreur.php';
            }
        } else {
            include 'vue/vueConnexion.php';
        }
    }

    /**
     * Supprime une réservation spécifique.
     *
     * @param int $id L'ID de la réservation à supprimer.
     *
     * @return void
     */
    public function supprimer($id) {
        if ($_SESSION['CONNECTER'] == "OK") {
            $element = $this->manageReservations->deleteReservation($id);
            if ($element != null) {
                $message = "La réservation n° ".$id." a été supprimée avec succès!";
                header('Location: index.php');
            } else {
                include 'vue/vueReservations.php';
            }
        } else {
            include 'vue/vueConnexion.php';
        }
    }

    /**
     * Affiche toutes les réservations.
     *
     * @return void
     */
    public function ShowReservations() {
        $reservations = $this->manageReservations->ShowReservations();
        include 'vue/vueAllReservations.php';
    }

    /**
     * Vérifie s'il y a une réservation pour une date spécifique.
     *
     * @param string $date La date pour laquelle vérifier la réservation.
     *
     * @return mixed
     */
    public function IsThereReservation($date) {
        $statut = ($this->manageReservations->IsThereReservation($date));
        return $statut;
    }
}
?>