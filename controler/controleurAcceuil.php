<?php
/**
 * Classe controleurAcceuil
 */
class controleurAcceuil
{
    /**
     * Affiche la vue d'accueil.
     *
     * @return void
     */
    function Acceuil() {
        include "vue/vueAccueil.php";
    }

    /**
     * Affiche la vue des mentions légales.
     *
     * @return void
     */
    function mention() {
        include "vue/vueMention.php";
    }
}
?>