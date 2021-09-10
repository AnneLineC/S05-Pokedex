<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="<?= $_SERVER['BASE_URI'] ?>/">
    <title>Pokedex</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bree+Serif&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="container">
        <header class="site-header">
            <h1 class="main-title"><a href="<?= $router->generate('home') ?>">Pokédex</a></h1>
            <nav class="site-nav">
                <ul class="site-nav__list">
                    <li class="site-nav__item">
                        <a class="site-nav__link" href="<?= $router->generate('home') ?>">Liste</a>
                    </li>
                    <li class="site-nav__item">
                        <a class="site-nav__link" href="<?= $router->generate('types'); ?>">Types</a>
                    </li>
                </ul>
            </nav>
        </header>
        <main>