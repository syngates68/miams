<?php
if (file_exists('vues/'.$var_page.'.php'))
{
?>

<div class="navbar">
    <div class="bloc-menu">
        <span class="material-icons">menu</span>
    </div>
    <div class="bloc-logo">
        <a href="<?= BASEURL; ?>">
            <img src="<?= BASEURL; ?>assets/img/logo.svg" alt="Logo de MIAMS">
        </a>
    </div>
    <div class="bloc-liens">
        <?php 
        if (isset($_SESSION['utilisateur'])) :
            $user = req_utilisateur_by_id($_SESSION['utilisateur']);
        ?>
            <div class="bloc-utilisateur">
                <span class="utilisateur"><?= $user['prenom']; ?></span>
                <div class="bloc-avatar dropdown-utilisateur">
                    <img src="<?= BASEURL; ?>assets/img/compte_test.jpeg" alt="Photo de profil de <?= $user['prenom'].' '.$user['nom']; ?>">
                </div>
            </div>
            <div class="bloc-dropdown-utilisateur">
                <div class="lien-dropdown">
                    <a href="#">Mon compte</a>
                </div>
                <div class="lien-dropdown">
                    <a href="#">Mes préférences</a>
                </div>
                <div class="lien-dropdown">
                    <a href="<?= BASEURL; ?>deconnexion.html">Déconnexion</a>
                </div>
            </div>
        <?php 
        else : 
        ?>
            <a href="<?= BASEURL; ?>connexion.html">Se connecter</a>
        <?php
        endif;
        ?>
    </div>
</div>

<?php
    include($var_page.'.php');
?>

<footer>
    <div class="footer-social">
        <span class="material-icons">facebook</span>
        <span class="material-icons">facebook</span>
        <span class="material-icons">facebook</span>
    </div>
    <div class="footer-liens">
        <a href="#">Contact</a> - <a href="#">CGU</a> - <a href="#">CGV</a>
    </div>
    <div class="footer-copyright">
        <span class="material-icons">copyright</span> <?= date('Y'); ?> Miams
    </div>
</footer>

<?php
}