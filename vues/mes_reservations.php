<?php
$page_title = 'Mes commandes';
?>

<div class="container-mes-commandes">
    <h1>Mes réservations</h1>
        <?php if (sizeof(req_commandes_by_utilisateur($_SESSION['utilisateur'])) > 0) : ?>
            <div class="liste-commandes">
                <div class="nbr-commandes">Vous avez actuellement <?= req_nb_commandes_en_cours_by_utilisateur($_SESSION['utilisateur']); ?> réservation(s) en cours.</div>
                <?php foreach (req_commandes_by_utilisateur($_SESSION['utilisateur']) as $c) : ?>
                    <div class="commande">
                        <div class="bloc-gauche">
                            <div class="etat etat<?= $c['etat']; ?>">
                                <span class="material-icons">adjust</span> <?= ($c['etat'] == 0) ? 'A récupérer' : 'Récupérée'; ?> 
                            </div>
                            <div class="bloc-informations">
                                <div class="reference">Commande #<?= $c['reference']; ?></div>
                                <div class="date-commande">Du <?= formate_date_heure($c['date_commande']); ?></div>
                                <div class="vendeur">
                                    <div class="bloc-img">
                                        <img src="<?= BASEURL; ?>assets/<?= $c['avatar']; ?>" alt="Photo de profil de <?= $c['vendeur']; ?>">
                                    </div>
                                    Vendu par <?= $c['vendeur']; ?>
                                </div>
                                <div class="recapitulatif">
                                    <ul>
                                        <li>Plat : <?= $c['nom_plat']; ?></li>
                                        <li>Quantité : <?= $c['quantite']; ?></li>
                                        <li>Heure souhaitée de récupération : <?= $c['heure_souhaitee']; ?></li>
                                        <?php if ($c['date_recuperation'] != null) : ?>
                                            <li class="etat1">Récupérée le <?= formate_date_heure($c['date_recuperation']); ?></li>
                                        <?php endif; ?>
                                        <li>Adresse : <?= $c['adresse'].' '.$c['code_postal'].' '.$c['ville']; ?></li>
                                        <li><B>Montant total : <?= $c['montant']; ?>€</B></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="bloc-droit">
                            <?php if ($c['etat'] == 0) : ?>
                                <button class="button btn-annuler-reservation" data-id="<?= $c['id_commande']; ?>">Annuler</button>
                                <button class="button btn-modifier-reservation">Modifier</button>
                            <?php endif; ?>      
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else : ?>
            Vous n'avez pas encore passé de commande.<br/>
        <?php endif; ?>
</div>