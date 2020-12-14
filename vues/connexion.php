<?php
$page_title = "Se connecter";
?>

<div class="container-connexion">
    <div class="bloc-formulaire bloc-connexion">
        <div class="bloc-logo">
            <img src="<?= BASEURL; ?>assets/img/logo.png" alt="Logo de MIAMS">
        </div>
        <h1>Se connecter</h1>
        <div class="input-form">
            <input type="email" name="mail" id="mail" placeholder="Adresse mail">
        </div>
        <div class="input-form">
            <input type="password" name="pass" id="pass" placeholder="Mot de passe">
            <p class="mot-de-passe-oublie">Mot de passe oublié</p>
        </div>
        <button type="submit" class="btn-formulaire">Connexion</button>
        <div class="bloc-non-membre">
            <p>Vous ne possédez pas encore de compte ? <a href="<?= BASEURL; ?>inscription.html">Créez-vous en un ici</a>.</p>
        </div>
        <div class="bloc-social">
            <button class="btn-social .btn-facebook">Facebook</button>
            <button class="btn-social .btn-google">Google</button>
        </div>
    </div>
</div>