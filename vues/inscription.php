<?php
$page_title = "S'inscrire";
?>

<div class="container-inscription">
    <div class="bloc-formulaire bloc-inscription">
        <div class="bloc-logo">
            <img src="<?= BASEURL; ?>assets/img/logo.png" alt="Logo de MIAMS">
        </div>
        <h1>S'inscrire</h1>
        <p class="phrase-accroche">Créez-vous un compte sur miams.fr afin de rejoindre la communauté 
        et de partager ou commander vos plats préférés.</p>
        <div class="input-form double-input">
            <input type="text" name="nom" id="nom" placeholder="Nom">
            <input type="text" name="prenom" id="prenom" placeholder="Prénom">
        </div>
        <div class="input-form double-input">
            <input type="email" name="mail" id="mail" placeholder="Adresse mail">
            <input type="email" name="mail_confirm" id="mail_confirm" placeholder="Confirmation de l'adresse mail">
        </div>
        <div class="input-form double-input">
            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Mot de passe">
            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Confirmation du mot de passe">
        </div>
        <button type="submit" class="btn-formulaire">Inscription</button>
        <div class="bloc-non-membre">
            <p>Vous avez déjà un compte ? <a href="<?= BASEURL; ?>connexion.html">Connectez-vous ici</a>.</p>
        </div>
    </div>
</div>