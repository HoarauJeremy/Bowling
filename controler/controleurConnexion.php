<?php

    session_name("Login");
    session_start();
    class ControleurConnexion {

        public function __construct() {
        }

        public function PageConnexion() //Redirige vers la page de connexion
        {
            include("vue/vueConnexion.php");
        }

        public function EspaceClient() //Redirige vers l'espace client de l'utilisateur
        {
            include("vue/vueProfil.php");
        }

        public function Connexion() //Gère la connexion de l'utilisateur sur la page
        {
            $username = ($_POST['username']); 
            $password = ($_POST['password']);

            require_once('modele/managerProfil.php');
            $managerProfil = new managerProfil();
        
            $verifMDP = $managerProfil->getMDP($username);

            if (password_verify($password, $verifMDP)) {
                
                require_once('modele/managerConnexion.php');
                $managerConnexion = new ManagerConnexion();
            
                $count = $managerConnexion->getUtilisateur($username, $verifMDP);
    
                if ($count['count(*)'] == "1") {
                    $_SESSION['username'] = $username;
                    $_SESSION['CONNECTER'] = "OK";
                    include('vue/vueProfil.php'); 
                } else { //En cas d'entrée de faux identifiants
                    $ErreurConnexion = "Identifiant ou mot de passe incorrect !";
                    include("vue/vueConnexion.php");
                    session_destroy();
                    session_abort();
                }   
            } else {
                $ErreurConnexion = "Identifiant ou mot de passe incorrect !";
                include("vue/vueConnexion.php");
                session_destroy();
                session_abort();
            }
        }
        
        public function Deconnexion() //Déconnecte le client de la page (Destruction de la session en cours)
        {
            session_destroy();
            session_abort();
            header('Location: index.php');
        }
}
?>