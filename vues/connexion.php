<?php
$page_title = "Se connecter";
?>

<div class="container-connexion">
    <div class="bloc-formulaire bloc-connexion">
        <div class="bloc-logo">
            <img src="<?= BASEURL; ?>assets/img/logo.svg" alt="Logo de MIAMS">
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
            <div class="form-container">
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <label for="mail">Adresse mail</label>
                            <input type="email" name="mail" id="mail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l12">
                        <div class="input-form">
                            <label for="pass">Mot de passe</label>
                            <input type="password" name="pass" id="pass">
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn-formulaire" name="submit_connexion">Connexion</button>
                <div class="bloc-social">
                    <button class="btn-social btn-facebook"><img src="<?= BASEURL; ?>assets/img/facebook.svg">Facebook</button>
                    <button class="btn-social btn-google"><img src="<?= BASEURL; ?>assets/img/google.svg">Google</button>
                </div>
            </div>
        </form>
        <div class="bloc-non-membre">
            <p>Vous ne possédez pas encore de compte ? <a href="<?= BASEURL; ?>inscription.html">Créez-vous en un ici</a>.</p>
        </div>
    </div>
</div>