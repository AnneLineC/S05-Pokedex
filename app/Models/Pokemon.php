<?php

namespace Pokedex\Models;

use Pokedex\utils\Database;
use \PDO;

class Pokemon extends CoreModel {

    private $pv;
    private $attaque;
    private $defense;
    private $attaque_spe;
    private $defense_spe;
    private $vitesse;
    private $numero;

    public function findAll() {
        $sql = "
        SELECT * FROM `pokemon`
        ";

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // renvoie un tableau d'objets
        return $pokemons;
    }

    public function findAllByType($id) {
        $sql = "
        SELECT pokemon.*,
        pokemon_type.type_id 
        FROM `pokemon` 
        INNER JOIN pokemon_type
        ON pokemon_type.pokemon_numero = pokemon.numero
        WHERE type_id =
        " . $id;

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // renvoie un tableau d'objets
        return $pokemons;
    }

    public function find($numero) {
        $sql = "SELECT * FROM `pokemon` WHERE numero = " . $numero;

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $pokemons = $pdoStatement->fetchObject(self::class);

        // renvoie un tableau d'objets
        return $pokemons;
    }    

    /**
     * Get the value of pv
     */ 
    public function getPv()
    {
        return $this->pv;
    }

    /**
     * Set the value of pv
     *
     * @return  self
     */ 
    public function setPv($pv)
    {
        $this->pv = $pv;
    }

    /**
     * Get the value of attaque
     */ 
    public function getAttaque()
    {
        return $this->attaque;
    }

    /**
     * Set the value of attaque
     *
     * @return  self
     */ 
    public function setAttaque($attaque)
    {
        $this->attaque = $attaque;
    }

    /**
     * Get the value of defense
     */ 
    public function getDefense()
    {
        return $this->defense;
    }

    /**
     * Set the value of defense
     *
     * @return  self
     */ 
    public function setDefense($defense)
    {
        $this->defense = $defense;
    }

    /**
     * Get the value of attaque_spe
     */ 
    public function getAttaque_spe()
    {
        return $this->attaque_spe;
    }

    /**
     * Set the value of attaque_spe
     *
     * @return  self
     */ 
    public function setAttaque_spe($attaque_spe)
    {
        $this->attaque_spe = $attaque_spe;
    }

    /**
     * Get the value of defense_spe
     */ 
    public function getDefense_spe()
    {
        return $this->defense_spe;
    }

    /**
     * Set the value of defense_spe
     *
     * @return  self
     */ 
    public function setDefense_spe($defense_spe)
    {
        $this->defense_spe = $defense_spe;
    }

    /**
     * Get the value of vitesse
     */ 
    public function getVitesse()
    {
        return $this->vitesse;
    }

    /**
     * Set the value of vitesse
     *
     * @return  self
     */ 
    public function setVitesse($vitesse)
    {
        $this->vitesse = $vitesse;

        return $this;
    }

    /**
     * Get the value of numero
     */ 
    public function getNumero()
    {
        return $this->numero;
    }

    /**
     * Set the value of numero
     *
     * @return  self
     */ 
    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }
}