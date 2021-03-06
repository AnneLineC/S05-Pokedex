<?php

namespace Pokedex\Models;

use Pokedex\utils\Database;
use \PDO;

class Type extends CoreModel {

    private $couleur;

    public function findAll() {
        $sql = "
        SELECT * FROM `type`
        ";

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // renvoie un tableau d'objets
        return $types;
    }

    public function findAllByNumero($numero) {
        $sql = "
        SELECT
        type.*
        FROM `pokemon_type`
        INNER JOIN `type`
        ON pokemon_type.type_id = type.id
        WHERE pokemon_type.pokemon_numero = " . $numero;

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $types = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // renvoie un tableau d'objets
        return $types;
    }

    public function find($id) {
        $sql = "SELECT * FROM `type` WHERE id = " . $id;

        // Database::getPDO() retourne l'objet PDO représentant la connexion à la BDD
        $pdo = Database::getPDO();

        // Exécution de la requête pour récupérer les Products
        $pdoStatement = $pdo->query($sql);

        // PDO va construire un tableau qui a pour éléments des objets Product 
        // self::class renvoie le nom complet de la classe courante
        $type = $pdoStatement->fetchObject(self::class);

        // renvoie un tableau d'objets
        return $type;
    }


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