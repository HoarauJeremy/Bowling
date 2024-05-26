<?php
session_name("Login");
session_start();

/**
 * Classe ControleurConnexion
 */
class ControleurConnexion {

    /**
     * Constructeur de la classe ControleurConnexion
     */
    public function __construct() {
    }

    /**
     * Redirige vers la page de connexion.
     *
     * @return void
     */
    public function PageConnexion() {
        include("vue/vueConnexion.php");
    }

    /**
     * Redirige vers la page de récupération de mot de passe.
     *
     * @return void
     */
    public function MDPOublie() {
        include("vue/vueMDPOublie.php");
    }

    /**
     * Redirige vers l'espace client de l'utilisateur.
     *
     * @return void
     */
    public function EspaceClient() {
        include("vue/vueProfil.php");
    }

    /**
     * Gère la connexion de l'utilisateur.
     *
     * @return void
     */
    public function Connexion() {
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
            } else {
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
    
    /**
     * Enregistre un nouveau mot de passe pour l'utilisateur.
     *
     * @return void
     */
    public function NouvMDP() {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_SESSION["email"];
            $password = $_POST["password"];
        }
        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        require_once('modele/managerProfil.php');
        $managerProfil = new ManagerProfil();
        $managerProfil->newMDP($hashedPassword, $email);
    }

    /**
     * Valide le code de confirmation pour la récupération de mot de passe.
     *
     * @return void
     */
    function ValidCode() {
        if (empty($_POST['code'])) {
            $ErreurCode = "Aucun code n'a été rentré.";
            include("vue/vueMDPOublie.php");
        } else {
            $code_entre = $_POST['code'];
            $email = $_SESSION['email'];
            $code_envoye = $_SESSION['confirmationCode'];
            
            if($code_entre == $code_envoye) {
                include("vue/vueNouvMDP.php");
                exit();
            } else {
                $ErreurCode = "Les codes ne correspondent pas !";
                include("vue/vueMDPOublie.php");
            }
        }
    }

    /**
     * Déconnecte l'utilisateur en cours.
     *
     * @return void
     */
    public function Deconnexion() {
        session_unset();
        session_destroy();
        session_abort();
        header('Location: index.php');
    }
}
?>