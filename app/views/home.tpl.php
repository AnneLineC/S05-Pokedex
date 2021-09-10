<div class="pokemon-list">
<?php foreach ($viewData['pokemons'] as $pokemon) : ?>
    <div class="pokemon-list__box">
        <a href="#">
            <img class="pokemon-list__img" src="img/<?= $pokemon->getNumero() ?>.png" alt="">
        </a>
        <p><a href="#">#<?= $pokemon->getNumero() ?> <?= $pokemon->getNom() ?></a></p>
    </div>
<?php endforeach; ?>
</div>