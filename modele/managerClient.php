<?php

require_once("modele/managerClient");

/**
 * Gère les clients en accédant à la base de données
 */
class managerClient extends Connexiondb {

    /**
     * Constructeur de la classe
     */
    public function __construct() {
        parent::__construct();
    }
}

?>