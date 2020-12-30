<?php
$page_title = "Le nom du plat";
$id = explode('-', $_GET['param'])[sizeof(explode('-', $_GET['param'])) - 1];
$plat = req_plat_by_id($id);
?>

<div class="container-plat">
    <div class="bloc-plat">
        <div class="titre"><?= $plat['nom_plat']; ?></div>
        <div class="vendeur">Proposé par <?= $plat['vendeur']; ?> (<a href="#">contacter</a>) le <?= formate_date_heure($plat['date_publication']); ?></div>
        <button class="button"><span class="material-icons">shopping_cart</span>Commander</button>
        <div class="image-plat">
            <img src="<?= BASEURL; ?>assets/img/<?= $plat['photo_plat']; ?>" alt="Photo du plat">
        </div>
        <div class="informations">
            <p>Informations :</p>
            <div class="prix"><?= $plat['prix']; ?>€/unité</div>
            <div class="quantite">Reste <?= $plat['quantite']; ?></div>
            <div class="heures">Disponible de <?= $plat['heure_debut']; ?> à <?= $plat['heure_fin']; ?></div>
            <div class="adresse"><?= $plat['adresse'].' '.$plat['ville'].' '.$plat['code_postal']; ?></div>
        </div>
        <div class="informations-supplementaires">
            <p>Informations supplémentaires :</p>
            <?php
                if ($plat['informations_supplementaires'] != NULL)
                {
            ?>
                    <?= $plat['informations_supplementaires']; ?>
            <?php
                }
                else
                {
            ?>
                    <span>Aucune information supplémentaire</span>
            <?php
                }
            ?>
        </div>
        <div class="alert alert-warning">
            <span class="material-icons">warning</span>
            <span class="message">
                Si vous êtes victimes d'allergies ou d'intolérence à un aliment, 
                n'hésitez pas à contacter le vendeur afin de savoir si le plat 
                ne représente aucun danger pour votre santé.
            </span>
        </div>
    </div>
</div>