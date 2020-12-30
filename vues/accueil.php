<?php
$page_title = "Accueil";
?>

<div class="container-liste-plats">
    <h1>Liste des plats</h1>
    <a href="<?= BASEURL; ?>ajouter_plat.html" class="ajouter-plat"><span class="material-icons">add_circle_outline</span>Proposer un plat</a>
    <div class="liste-plats">
        <?php foreach (req_liste_plats() as $p) : ?>
            <div class="card">
                <div class="card-img-top">
                    <img src="<?= BASEURL; ?>assets/img/<?= $p['photo_plat']; ?>">
                </div>
                <div class="card-body">
                    <div class="titre"><a href="<?= BASEURL; ?>plat/<?= $p['slug'].'-'.$p['id_plat']; ?>.html"><?= $p['nom_plat']; ?></a></div>
                    <div class="prix"><?= $p['prix']; ?>€/unité (reste <?= $p['quantite']; ?>)</div>
                    <div class="adresse"><?= $p['ville'].' '.$p['code_postal']; ?></div>
                    <div class="heures">Disponible entre <?= $p['heure_debut']; ?> et <?= $p['heure_fin']; ?></div>
                    <div class="date-publication"><?= ecart_date($p['date_publication']); ?></div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>