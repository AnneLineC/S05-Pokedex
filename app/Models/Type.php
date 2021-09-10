<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use \PDO;

class Type extends CoreModel {

    private $couleur;


    /**
     * Get the value of couleur
     */ 
    public function getCouleur()
    {
        return $this->couleur;
    }

    /**
     * Set the value of couleur
     *
     * @return  self
     */ 
    public function setCouleur($couleur)
    {
        $this->couleur = $couleur;
    }
}