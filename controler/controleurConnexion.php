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

            public function MDPOublie() //Redirige vers l'espace client de l'utilisateur
            {
                include("vue/vueMDPOublie.php");
            }

            public function EspaceClient() //Redirige vers l'espace client de l'utilisateur
            {
                include("vue/vueProfil.php");
            }

            public function Connexion() //Gère la connexion de l'utilisateur sur la page
            {
                $login = ($_POST['login']); 
                $password = ($_POST['password']);

                require_once('modele/managerProfil.php');
                $managerProfil = new managerProfil();
            
                $verifMDP = $managerProfil->getMDP($login);

                $type = $managerProfil->getType($login);

                if (password_verify($password, $verifMDP)) {
                    
                    require_once('modele/managerConnexion.php');
                    $managerConnexion = new ManagerConnexion();
                    $count = $managerConnexion->getUtilisateur($login, $verifMDP);
        
                    if ($count['count(*)'] == "1") {
                        $_SESSION['login'] = $login;
                        $_SESSION['CONNECTER'] = "OK";
                        $_SESSION['type'] = $type;
                        include('vue/vueProfil.php'); 
                    } else { //En cas d'entrée de faux identifiants
                        $_SESSION['type'] = 0;
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
            
            public function NouvMDP()
            {
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $email = $_SERVER["email"];
                    $password = $_POST["password"];
                }
                $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
                require_once('modele/managerProfil.php');
                $managerProfil = new ManagerProfil();
                $managerProfil->newMDP($hashedPassword, $login);
            }

            public function Deconnexion() //Déconnecte le client de la page (Destruction de la session en cours)
            {
                session_unset();
                session_destroy();
                session_abort();
                header('Location: index.php');
            }
    }
?>