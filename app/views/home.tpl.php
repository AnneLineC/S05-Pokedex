<div class="pokemon-list">
<?php foreach ($viewData['pokemons'] as $pokemon) : ?>
    <article class="pokemon-list__box">
        <a href="<?= $viewData['router']->generate('detail', ['numero' => $pokemon->getNumero()]) ?>">
            <img class="pokemon-list__img" src="img/<?= $pokemon->getNumero() ?>.png" alt="">
        </a>
        <p><a href="<?= $viewData['router']->generate('detail', ['numero' => $pokemon->getNumero()]) ?>">#<?= $pokemon->getNumero() ?> <?= $pokemon->getNom() ?></a></p>
    </article>
<?php endforeach; ?>
</div>