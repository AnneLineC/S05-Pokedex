<?php

namespace Pokedex\Models;

use Pokedex\Utils\Database;
use \PDO;

class Type extends CoreModel {

    private $couleur;

    function findAllByNumero($numero) {
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
        $pokemons = $pdoStatement->fetchAll(PDO::FETCH_CLASS, self::class);

        // renvoie un tableau d'objets
        return $pokemons;
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