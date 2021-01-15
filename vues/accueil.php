<?php
$page_title = "Accueil";
?>

<div class="container-liste-plats">
    <div class="bloc-liste-plats">
        <div class="liste-header">
            <h1>Liste des plats</h1>
            <p class="phrase-accroche">
                Trouvez votre bonheur parmis les plats suivants, près de chez vous !
            </p>
            <a class="btn-proposer-plat" href="<?= BASEURL; ?>ajouter_plat.html">Proposer un plat</a>
        </div>
        <div class="liste-plats">
            <div class="liste-plats-content">
                <?php foreach (req_liste_plats() as $p) : ?>
                    <div class="card">
                        <div class="card-img-top">
                            <img src="<?= BASEURL; ?><?= $p['photo_plat']; ?>">
                        </div>
                        <div class="card-body">
                            <div class="titre"><a href="<?= BASEURL; ?>plat/<?= $p['slug'].'-'.$p['id_plat']; ?>.html"><?= $p['nom_plat']; ?></a></div>
                            <div class="prix"><span class="valeur"><?= $p['prix']; ?></span><span class="euro">€</span> / unité (<span class="reste">reste <?= $p['quantite']; ?></span>)</div>
                            <div class="adresse"><?= $p['ville'].' '.$p['code_postal']; ?></div>
                            <div class="heures">Disponible entre <?= $p['heure_debut']; ?> et <?= $p['heure_fin']; ?></div>
                            <div class="date-publication"><?= ecart_date($p['date_publication']); ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>