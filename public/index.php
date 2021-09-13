<?php

// Pour utiliser les librairies gérées par Composer (ici Altorouteur)
require __DIR__ . '/../vendor/autoload.php';

// Instanciation d'Altorouteur
$router = new AltoRouter();

// On déclare à Altorouteur que notre site est placé dans un sous-répertoire
// BASE_URI est défini dans le .htaccess
$router->setBasePath($_SERVER['BASE_URI']);


//* Tableau des routes

$routes = [
    // Route 'home'
    [
        'GET',
        '/',
        [
            'controller' => 'MainController',
            'action' => 'home'
        ],
        'home'
    ],
    // Route 'detail'
    [
        'GET',
        '/detail/[i:numero]',
        [
            'controller' => 'MainController',
            'action' => 'detail'
        ],
        'detail'
    ],
    // Route 'types'
    [
        'GET',
        '/types',
        [
            'controller' => 'MainController',
            'action' => 'types'
        ],
        'types'
    ],
    // Route 'type'
    [
        'GET',
        '/bytype/[i:id]',
        [
            'controller' => 'MainController',
            'action' => 'pokemonsByType'
        ],
        'by-type'
    ],
];

//* Transmission des routes à Altorouteur

$router->addRoutes($routes);


//* Dispatcher, qui va rediriger vers la bonne action en fonction de l'URL

$match = $router->match();

if ($match !== false) {
    // On récupére avec altorouteur (le résultat de match()) les données de la route (mappé plus haut)
    $controllerToUse = 'Pokedex\\Controllers\\' . $match['target']['controller'];
    $methodToUse = $match['target']['action'];
    $params = $match['params'];
}
else {
    // Si l'URL n'existe pas dans notre tableau de routes, on renvoie vers la page 404
    // http_response_code('404'); ?? Utile ?
    $controllerToUse = 'Pokedex\\Controllers\\MainController';
    $methodToUse = 'error404';
    $params = [];
}

// On instancie le controller et exécute la méthode
$controller = new $controllerToUse($router);
$controller->$methodToUse($params);
