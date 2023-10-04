<?php
    /* Accès à la base de données *************************/
    class Connexiondb {
        // Définition des attributs
        protected $host;
        protected $port;
        protected $dbname;
        protected $user;
        protected $passwd;
        protected $sgbd;
        protected $cnx;

        // Constructeur initialisation des données
        public function __construct(){
            $this->host   = "127.0.0.1";
            $this->port   = 3306;
            $this->dbname = ""; // Nom de la BD            
            $this->user   = ""; // Utilisateur 
            $this->passwd = ""; // Mot de Passe
            $this->sgbd   = "mysql";

            $this->cnx = null;

            $this->getConnection();
            }

        // Constructeur Méthode de connexion à la base de données
        public function getConnection(){
            // On supprime la connexion précédente
            $this->fermerConnexion();
            // On essaie de se connecter à la base
            // Singleton : la classe PDO sera instanciée qu'une seule fois dans l'application. 
            try{
                $this->cnx = new PDO($this->sgbd.":host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
                $this->cnx->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connexion à la base de données impossible : " . $exception->getMessage();
            }
            return $this->cnx;
        }

        // Execute une requête SQL paramétrée
        protected function executeRequete($sql, $vars = null)
        {
            // Exécution d'une requête préparée
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($vars);
            return $rqt;
        }

        // Méthode de déconnexion à la base de données
        public function fermerConnexion() 
        {
            $this->cnx = null;
        }
    }
?>