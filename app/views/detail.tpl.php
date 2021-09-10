<h2 class="page-title">Détails de <?= $viewData['pokemon']->getNom(); ?></h2>

<article class="pokemon-detail">
    <div class="pokemon-detail__img-box">
        <img class="pokemon-detail__img" src="img/<?= $viewData['pokemon']->getNumero() ?>.png" alt="">
    </div>
    <div class="pokemon-detail__card">
        <h3 class="pokemon-detail__name">#<?= $viewData['pokemon']->getNumero() ?> <?= $viewData['pokemon']->getNom(); ?></h3>

        <?php foreach ($viewData['types'] as $type) : ?>
        <button class="pokemon-type" style="background-color: #<?= $type->getCouleur() ?>;"><?= $type->getNom() ?></button>
        <?php endforeach; ?>

        <h4 class="pokemon-detail__stats-title">Statistiques</h4>
        
        <table class="pokemon-detail__table">
            <tr>
                <td class="pokemon-detail__cell">PV</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getPv() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['pvSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pokemon-detail__cell">Attaque</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getAttaque() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['attaqueSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pokemon-detail__cell">Défense</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getDefense() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['defenseSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pokemon-detail__cell">Attaque Spé.</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getAttaque_spe() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['attaqueSpeSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pokemon-detail__cell">Défense Spé.</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getDefense_spe() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['defenseSpeSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
            <tr>
                <td class="pokemon-detail__cell">Vitesse</td>
                <td class="pokemon-detail__cell pokemon-detail__cell--stat"><?= $viewData['pokemon']->getVitesse() ?></td>
                <td class="pokemon-detail__cell pokemon-detail__cell--progress">
                    <div class="progress-bar">
                        <div class="progress-bar__full" style="width:<?= $viewData['divSizes']['vitesseSize'] ?>%;"></div>
                    </div>
                </td>
            </tr>
        </table>

    </div>
</article>

<p class="homelink">
    <a class="homelink__link" href="<?php $router->generate('home') ?>">Revenir à la liste</a>
</p>