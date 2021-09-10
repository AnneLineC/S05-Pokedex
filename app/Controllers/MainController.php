<?php

namespace Pokedex\Controllers;

use Pokedex\Models\Pokemon;

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
        
        
        $this->show('detail');
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