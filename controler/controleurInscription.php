<?php
/**
 * Classe controleurInscription
 */
class controleurInscription {
    /**
     * Redirige vers la page d'inscription.
     *
     * @return void
     */
    public function PageInscription() {
        include("vue/vueInscription.php");
    }

    /**
     * Gère l'inscription de l'utilisateur.
     *
     * @return void
     */
    public function Inscription() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $prenom = $_POST["prenom"];
            $nom = $_POST["nom"];
            $naissance = $_POST["naissance"];
            $email = $_POST["email"];
            $password = $_POST["password"];
            $ptsfidelite = 0;
        }

        require_once('modele/managerInscription.php');
        $managerInscription = new managerInscription();
        $managerInscription->insertUtilisateur($prenom, $nom, $naissance, $email, $ptsfidelite, $password);
    }
}
?>