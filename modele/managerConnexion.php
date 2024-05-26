<?php

require_once("modele/modele.php");

/**
 * Gère les opérations liées à la connexion en accédant à la base de données.
 */
class managerConnexion extends Connexiondb {

    /**
     * Constructeur de la classe.
     */
    public function __construct(){
        parent::__construct();
    }

    /**
     * Vérifie l'authenticité des informations d'identification.
     * 
     * @param string $login Le nom d'utilisateur
     * @param string $password Le mot de passe de l'utilisateur
     * @return array Le résultat de la vérification (1 = OUI / 0 = NON)
     */
    public function getUtilisateur($login, $password) 
    {
        $sql = "SELECT count(*) FROM Utilisateur WHERE LoginUser = :login AND MdpUser = :password";            
        $rqt = $this->cnx->prepare($sql);
        
        $rqt->bindParam(':login', $login, PDO::PARAM_STR);
        $rqt->bindParam(':password', $password, PDO::PARAM_STR);
        $rqt->execute();
        $result = $rqt->fetch(PDO::FETCH_ASSOC);
        $rqt->closeCursor();

        return $result;
    }
}

?>