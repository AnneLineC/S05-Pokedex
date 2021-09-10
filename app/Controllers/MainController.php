<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;
use Pokedex\Models\Type;

class MainController {

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
     * Route 'home'
     * URL '/'
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
     * Route 'home'
     * URL '/'
     */
    function types() {

        $typeObject = new Type;
        $types = $typeObject->findAll();

        $this->show('types', ['types' => $types]);
    }


    /**
     * Méthode show() permettant d'afficher le bon template -> private car doit être appelée uniquement au sein du controller
     */
    private function show($viewName, $viewData = []) {

        // On rend la variable $router, définie sur index.php, accessible depuis la méthode show() et donc depuis toutes les vues, afin de pouvoir générer les liens automatiquement avec altorouter
        global $router;

        require __DIR__ . '/../views/header.part.php';
        // on inclut une vue selon la valeur du paramètre $viewName
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.part.php';

    }
}