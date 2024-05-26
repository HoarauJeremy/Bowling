<?php

/**
 * Classe controleurAdmin
 */
class controleurAdmin {
    /**
     * @var managerAdministration
     */
    public $manageAdmin;

    /**
     * Constructeur de la classe controleurAdmin
     */
    public function __construct() {
        require_once("modele/managerAdministration.php");
        $this->manageAdmin = new managerAdministration();
    }

    /**
     * Dispatch les actions administratives selon l'action spécifiée.
     *
     * @param string $action L'action à réaliser.
     * @param int|null $id L'ID de l'élément (si applicable).
     *
     * @return void
     */
    public function Dispatcher($action, $id = null) {
        switch ($action) {
            case 'modifier':
                $element = $this->manageAdmin->getRes($id);
                if ($element != null) {
                    require_once("modele/administration.php");
                    $modifreservation = new administration($element);
                    include 'vue/vueModifAdmin.php';
                } else {
                    include 'vue/vueErreur.php';
                }
                break;
            
            case 'supprimer':
                $element = $this->manageAdmin->deleteReservation($id);
                $message = "La réservation n° ".$id." a été supprimée avec succès!";
                header('Location: index.php?action=&val='.$message);
                break;
            
            case 'details':
                $element = $this->manageAdmin->getReservation($id);
                if ($element != null) {
                    require_once("modele/administration.php");
                    $reservation = new administration($element);
                    include 'vue/vueReservation.php';
                } else {
                    include 'vue/vueErreur.php';
                }
                break;

            case 'reservations':
                $reservations = $this->manageAdmin->getReservations();
                include 'vue/vueReservations.php';
                break;

            /*case 'clients':
                $clients = $this->manageAdmin->getClients();
                include 'vue/vueClients.php';
                break;*/

            case 'connexion':                 
                include 'vue/vueConnexion.php';
                break;
            
            default:
                // On appelle la page d'accueil par défaut
                include 'vue/vueAccueil.php';
                break;
        }
    }
}

?>
