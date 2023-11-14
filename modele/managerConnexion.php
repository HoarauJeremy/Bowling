<?php
    require_once("modele/modele.php");

    class managerUtilisateur extends Connexiondb {
        public function __construct(){
            parent :: __construct();
        }

        public function getUtilisateur($username, $password, $cnx)
        {
            // Lignes pour empêcher l'insertion de code SQL
            $username = mysqli_real_escape_string($cnx,htmlspecialchars($_POST['username'])); 
            $password = mysqli_real_escape_string($cnx,htmlspecialchars($_POST['password']));
        
            if($username !== "" && $password !== "")
            {
                $sql = "SELECT count(*) FROM Utilisateur where LoginUser = '".$username."' AND MdpUser = '".$password."' ";
                $rqt = $this->cnx->prepare($sql);
                $rqt->execute();
                $exec_requete = mysqli_query($cnx,$rqt);
                $reponse = mysqli_fetch_array($exec_requete);
        
                $count = $reponse['count(*)'];
                if($count!=0) // nom d'utilisateur et mot de passe correctes
                    {
                        $_SESSION['CONNECTER'] = "OK";
                        header('Location: vueProfil.php');
                        echo "Connexion réussie";
                    }
                else
                    {
                        header('Location: vueConnexion.php?erreur=1'); // utilisateur ou mot de passe incorrect
                }
            }
            mysqli_close($cnx);
        }
    }
?>