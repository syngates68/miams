<?php
$page_title = 'Mes commandes';
?>

<div class="container-mes-commandes">
    <?php foreach (req_commandes_by_utilisateur($_SESSION['utilisateur']) as $c) : ?>
        <div class="commande">
            <div class="bloc-img">
                <img src="<?= BASEURL; ?>assets/img/<?= $c['photo_plat']; ?>" alt="">
            </div>
            <div class="bloc-infos">
                <p>Commande n°<?= $c['reference']; ?></p>
                <p>Plat : <?= $c['nom_plat']; ?></p>
                <p>Quantité : <?= $c['quantite']; ?></p>
                <p>A récupérer pour : <?= $c['heure_souhaitee']; ?></p>
                <p>Montant de la commande : <?= $c['montant']; ?>€</p>
                <p>Commandée le <?= $c['date_commande']; ?></p>
            </div>
        </div>
    <?php endforeach; ?>
</div>