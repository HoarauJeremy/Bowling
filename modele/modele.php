<?php
    /* Accès à la base de données */
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
        /*
        Rappel : 2 compte utilisateur (Admin / Client général)
        Le client n'a acces qu'à ces informations et ce qu'il à le droit de modifier
        */
        public function __construct(){
            $this->host   = "mysql-bowlingdufrontdemer.alwaysdata.net";     // Hôte de la base de donnée
            $this->port   = 3306;                                           // Port
            $this->dbname = "bowlingdufrontdemer_db";                       // Nom de la BD            
            $this->user   = '329923';                                       // Utilisateur
            $this->passwd = "Abc_1234";

            $this->sgbd   = "mysql";                                        // Server de Gestion de Base de donnée

            $this->cnx = null;                                              // Initialisation de la connexion à NULL

            $this->getConnection();                                         // Début de la connexion
            }

        // Constructeur Méthode de connexion à la base de données
        public function getConnection(){

            // Supression de la connexion précédente
            $this->fermerConnexion();

            // On essaie de se connecter à la base
            // Singleton : la classe PDO sera instanciée qu'une seule fois dans l'application.
            try{
                $this->cnx = new PDO($this->sgbd.":host=" . $this->host . ";dbname=" . $this->dbname, $this->user, $this->passwd);
                $this->cnx->exec("set names utf8");
            }catch(PDOException $exception){
                echo "Connexion à la base de données impossible : " . $exception->getMessage();
            }
            
            // Renvoie de la connexion
            return $this->cnx;
        }

        // Execute une requête SQL paramétrée
        protected function executeRequete($sql, $vars = null)
        {
            // Exécution d'une requête préparée
            $rqt = $this->cnx->prepare($sql);
            $rqt->execute($vars);

            // Renvoie du résultat de la requête
            return $rqt;
        }

        // Méthode de déconnexion à la base de données
        public function fermerConnexion() 
        {
            $this->cnx = null;
        }
    }
?>