<?php

namespace Pokedex\Controllers;

class CoreController {

    protected $router;

    // On récupère en paramètre de MainController l'objet $router,
    // nécessaire dans les vues à la génération des toutes par Altorouter
    function __construct($router) {
        $this->router = $router;
    }

    function getRouter() {
        return $this->router;
    }

    /**
     * Méthode show() permettant d'afficher le bon template -> protected car doit être appelée uniquement au sein des controllers
     */
    protected function show($viewName, $viewData = []) {

        // On récupère le contenu de la propriété $router pour l'ajouter au tableau $viewData
        $viewData['router'] = $this->getRouter();

        require __DIR__ . '/../views/header.part.php';
        // on inclut une vue selon la valeur du paramètre $viewName
        require __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require __DIR__ . '/../views/footer.part.php';

    }

}