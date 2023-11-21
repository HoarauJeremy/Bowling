<?php
 session_start();
class ControleurConnexion
{
    public $manageConnexion;

    public function __construct() {
    }

    public function PageConnexion()
    {
        include("vue/vueConnexion.php");
    }

    public function Connexion()
    {
        $username = ($_POST['username']); 
        $password = ($_POST['password']);
    
        // Inclure le fichier contenant la classe ManagerConnexion
        require_once('modele/managerConnexion.php');
        $managerConnexion = new ManagerConnexion();
    
        $count = $managerConnexion->getUtilisateur($username, $password);

        if ($count['count(*)'] == "1") {
            $_SESSION['CONNECTER'] = "OK";
            include('vue/vueProfil.php');
        } else { //En cas d'entrée de faux identifiants
            $ErreurConnexion = "Identifiant ou mot de passe incorrect !";
            include("vue/vueConnexion.php");
            session_destroy();
            session_abort();
        }
    }
    

    public function Deconnexion()
    {
        session_destroy();
        session_abort();
        header('Location: index.php');
    }
}
?>