<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController extends CoreController {

    /**
     * Route 'home'
     * URL '/'
     */
    function home() {

        $pokemonObject = new Pokemon;
        $pokemons = $pokemonObject->findAll();

        $this->show('home', ['pokemons' => $pokemons]);
    }

    /**
     * Route 'detail'
     * URL '/detail/[i:id]'
     */
    function detail($params) {
        
        // On récupère le détail d'un pokémon en fonction de son numéro
        $pokemonObject = new Pokemon;
        $pokemon = $pokemonObject->find($params['numero']);

        // On récupère les types d'un pokémon en fonction de son numéro
        $typeObject = new Type;
        $types = $typeObject->findAllByNumero($params['numero']);

        // On calcule la taille de la div représentant la progression de la statistique
        $pv = $pokemon->getPv();
        $pvSize = ($pv * 100 / 255);
        $attaque = $pokemon->getAttaque();
        $attaqueSize = ($attaque * 100 / 255);
        $defense = $pokemon->getDefense();
        $defenseSize = ($defense * 100 / 255);
        $attaque_spe = $pokemon->getAttaque_spe();
        $attaqueSpeSize = ($attaque_spe * 100 / 255);
        $defense_spe = $pokemon->getDefense_spe();
        $defenseSpeSize = ($defense_spe * 100 / 255);
        $vitesse = $pokemon->getVitesse();
        $vitesseSize = ($vitesse * 100 / 255);
        $divSizes = [
            'pvSize' => $pvSize, 
            'attaqueSize' => $attaqueSize, 
            'defenseSize' => $defenseSize, 
            'attaqueSpeSize' => $attaqueSpeSize, 
            'defenseSpeSize' => $defenseSpeSize, 
            'vitesseSize' => $vitesseSize
        ];

        $this->show('detail', [
            'pokemon' => $pokemon, 
            'types' => $types,
            'divSizes' => $divSizes
        ]);
    }

    /**
     * Route 'types'
     * URL '/types'
     */
    function types() {

        $typeObject = new Type;
        $types = $typeObject->findAll();

        $this->show('types', ['types' => $types]);
    }

    /**
     * Route 'pokemons-by-type'
     * URL '/type/[i:id]'
     */
    function pokemonsByType($params) {

        $pokemonObject = new Pokemon;
        $pokemons = $pokemonObject->findAllByType($params['id']);

        $typeObject = new Type;
        $type = $typeObject->find($params['id']);

        $this->show('type', [
            'pokemons' => $pokemons, 
            'type' => $type
        ]);
    }

    /**
     * Route 'error404'
     * URL not found
     */
    function error404() {

        $this->show('error404');

    }

}