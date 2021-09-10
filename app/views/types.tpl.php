<h2 class="page-title">Les différents types de Pokémons</h2>

<?php foreach ($viewData['types'] as $type) : ?>
<a href="<?= $router->generate('by-type', ['id' => $type->getId()]) ?>"><button class="pokemon-type" style="background-color: #<?= $type->getCouleur() ?>;"><?= $type->getNom() ?></button></a>
<?php endforeach; ?>