<?php
$page_title = "Se connecter";
?>

<div class="container-connexion">
    <div class="bloc-formulaire bloc-connexion">
        <div class="bloc-logo">
            <img src="<?= BASEURL; ?>assets/img/logo.png" alt="Logo de MIAMS">
        </div>
        <h1>Se connecter</h1>
        <form method="POST" action="<?= BASEURL; ?>inc/traitement/connexion.php">
            <?php 
                if (isset($_SESSION['error_connexion']))
                {
            ?>
                <div class="alert alert-erreur">
                    <span class="material-icons">error</span>
                    <span class="message"><?= $_SESSION['error_connexion']; ?></span>
                </div>
            <?php
                unset($_SESSION['error_connexion']) ;
                }
            ?>    
            <?php 
                if (isset($_SESSION['success_connexion']))
                {
            ?>
                <div class="alert alert-succes">
                    <span class="material-icons">check_circle</span>
                    <span class="message"><?= $_SESSION['success_connexion']; ?></span>
                </div>
            <?php
                unset($_SESSION['success_connexion']) ;
                }
            ?>    
            <div class="input-form">
                <input type="email" name="mail" id="mail" placeholder="Adresse mail">
            </div>
            <div class="input-form">
                <input type="password" name="pass" id="pass" placeholder="Mot de passe">
                <p class="mot-de-passe-oublie">Mot de passe oublié</p>
            </div>
            <button type="submit" class="btn-formulaire" name="submit_connexion">Connexion</button>
            <div class="bloc-social">
                <button class="btn-social btn-facebook"><img src="<?= BASEURL; ?>assets/img/facebook.svg">Facebook</button>
                <button class="btn-social btn-google"><img src="<?= BASEURL; ?>assets/img/google.svg">Google</button>
            </div>
        </form>
        <div class="bloc-non-membre">
            <p>Vous ne possédez pas encore de compte ? <a href="<?= BASEURL; ?>inscription.html">Créez-vous en un ici</a>.</p>
        </div>
    </div>
</div>