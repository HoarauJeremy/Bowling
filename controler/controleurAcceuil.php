<?php
    class controleurAcceuil
    {
        function Acceuil() {
            include "vue/vueAccueil.php";
        }

        function mention() {
            include "vue/vueMention.php";
        }

        function cookie() {
            include "vue/vueCookies.php";
        }
        
    }
?>