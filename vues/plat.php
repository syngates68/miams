<?php
$page_title = "Le nom du plat";
$id = explode('-', $_GET['param'])[sizeof(explode('-', $_GET['param'])) - 1];
$plat = req_plat_by_id($id);
?>

<div class="container-plat">
    <div class="bloc-plat">
        <div class="bloc-plat-top">
            <div class="bloc-image-plat">
                <img src="<?= BASEURL; ?>assets/img/<?= $plat['photo_plat']; ?>" alt="Photo du plat">
            </div>
            <div class="bloc-vendeur-plat">
                <div class="bloc-titre">Vendeur :</div>
                <div class="bloc-informations-vendeur">
                    <div class="bloc-image-vendeur">
                        <img src="<?= BASEURL; ?>assets/img/compte_test.jpeg" alt="Photo du vendeur">
                    </div>
                    <div class="bloc-infos">
                        <div class="nom-vendeur"><?= $plat['vendeur']; ?></div>
                        <div class="avis-vendeur">Recommandé à 97% (7 avis)</div>
                    </div>
                </div>
                <div class="bloc-actions">
                    <button class="btn">Contacter le vendeur</button>
                </div>
            </div>
        </div>
        <div class="bloc-informations-plat">
            <div class="bloc-titre-plat"><?= $plat['nom_plat']; ?></div>
            <div class="bloc-prix-plat"><?= $plat['prix']; ?>€/l'assiette</div>
            <div class="bloc-date-post">Publié le <?= $plat['date_publication']; ?></div>
            <button class="button btn-main"><span class="material-icons">list</span>Ajouter à ma liste</button>
        </div>
        <div class="bloc-description-plat">
            <div class="bloc-titre-categorie">Description</div>
            <div class="bloc-description"><?= $plat['description']; ?></div>
        </div>
        <div class="alert alert-info">
            <span class="material-icons">info</span>
            <span class="message">
                Si vous êtes allergiques à certains aliments, veillez à contacter le posteur de
                l'annonce afin d'obtenir plus d'informations sur les potentiels allergènes pouvant être contenus
                dans le plat.
            </span>
        </div>
        <div class="bloc-adresse-plat">
            <div class="adresse">
                <?= $plat['adresse']; ?><br/>
                <?= $plat['code_postal'].' '.$plat['ville']; ?>
            </div>
            <div class="bloc-map">
                <img src="<?= BASEURL; ?>assets/img/map.png">
            </div>
        </div>
    </div>
</div>