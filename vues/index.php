<?php
if (file_exists('vues/'.$var_page.'.php'))
{
?>

<div class="navbar">
    <div class="bloc-logo">
        <img src="<?= BASEURL; ?>assets/img/logo.png" alt="Logo de MIAMS">
        <span class="material-icons">menu</span>
    </div>
    <div class="bloc-lien">
        <a href="<?= BASEURL; ?>connexion.html">Se connecter</a>
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