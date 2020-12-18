<?php
$page_title = "Accueil";
?>

<div class="container-liste-plats">
    <div class="liste-plats">
        <?php foreach (req_liste_plats() as $p) : ?>
            <div class="card">
                <div class="card-img-top">
                    <div class="bloc-filtre"></div>
                    <img src="<?= BASEURL; ?>assets/img/<?= $p['photo_plat']; ?>">
                    <div class="card-titre-plat"><?= $p['nom_plat'];?></div>
                </div>
                <div class="card-body">
                    <div class="card-top">
                        <div class="card-posteur-plat">Proposé par <?= $p['vendeur']; ?></div>
                        <div class="card-recommandations">Recommandé à 97% (sur 77 avis)</div>
                        <div class="card-prix-plat"><?= $p['prix']; ?>€/assiette (reste <?= $p['quantite']; ?>)</div>
                        <div class="card-adresse-plat"><span class="material-icons">location_on</span><?= $p['ville']; ?> (<?= $p['code_postal']; ?>)</div>
                    </div>
                    <div class="card-description"><?= extrait_texte($p['description'], 200); ?></div>
                    <div class="card-titre">Disponibilités</div>
                    <div class="card-disponibilite">
                        <span class="material-icons">query_builder</span>
                        Disponible de <?= $p['heure_debut']; ?> à <?= $p['heure_fin']; ?>
                    </div>
                    <div class="card-date-publication">Publié le <?= $p['date_publication']; ?></div>
                    <div class="card-footer">
                        <button class="card-button btn-main"><span class="material-icons">list</span>Ajouter à ma liste</button>
                        <a href="<?= BASEURL; ?>plat/<?= $p['slug'].'-'.$p['id_plat']; ?>.html" class="card-button btn-secondary"><span class="material-icons">add_circle_outline</span>En savoir plus</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>