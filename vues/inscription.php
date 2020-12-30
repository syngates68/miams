<?php
$page_title = "S'inscrire";
?>

<div class="container-inscription">
    <div class="bloc-formulaire bloc-inscription">
        <div class="bloc-logo">
            <img src="<?= BASEURL; ?>assets/img/logo.svg" alt="Logo de MIAMS">
        </div>
        <h1>S'inscrire</h1>
        <p class="phrase-accroche">Créez-vous un compte sur miams.fr afin de rejoindre la communauté 
        et de partager ou commander vos plats préférés.</p>
        <form method="POST" action="<?= BASEURL; ?>inc/traitement/inscription.php">
            <?php 
                if (isset($_SESSION['error_inscription']))
                {
            ?>
                <div class="alert alert-erreur">
                    <span class="material-icons">error</span>
                    <span class="message"><?= $_SESSION['error_inscription']; ?></span>
                </div>
            <?php
                unset($_SESSION['error_inscription']) ;
                }
            ?>    
            <?php 
                if (isset($_SESSION['success_inscription']))
                {
            ?>
                <div class="alert alert-succes">
                    <span class="material-icons">check_circle</span>
                    <span class="message"><?= $_SESSION['success_inscription']; ?></span>
                </div>
            <?php
                unset($_SESSION['success_inscription']) ;
                }
            ?>  
            <div class="form-container">
                <div class="row">
                    <div class="col l6">
                        <div class="input-form">
                            <input type="text" name="nom" id="nom" <?php if (isset($_SESSION['_nom'])) : ?>value="<?= $_SESSION['_nom']; ?>"<?php unset($_SESSION['_nom']); endif; ?> placeholder="Nom">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="input-form">
                            <input type="text" name="prenom" id="prenom" <?php if (isset($_SESSION['_prenom'])) : ?>value="<?= $_SESSION['_prenom']; ?>"<?php unset($_SESSION['_prenom']); endif; ?> placeholder="Prénom">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l6">
                        <div class="input-form">
                            <input type="email" name="mail" id="mail" <?php if (isset($_SESSION['_mail'])) : ?>value="<?= $_SESSION['_mail']; ?>"<?php unset($_SESSION['_mail']); endif; ?> placeholder="Adresse mail">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="input-form">
                            <input type="email" name="mail_confirm" id="mail_confirm" placeholder="Confirmation de l'adresse mail">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col l6">
                        <div class="input-form">
                            <input type="password" name="pass" id="pass" placeholder="Mot de passe">
                        </div>
                    </div>
                    <div class="col l6">
                        <div class="input-form">
                            <input type="password" name="pass_confirm" id="pass_confirm" placeholder="Confirmation du mot de passe">
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn-formulaire" name="submit_inscription">Inscription</button>
            <div class="bloc-social">
                <button class="btn-social btn-facebook"><img src="<?= BASEURL; ?>assets/img/facebook.svg">Facebook</button>
                <button class="btn-social btn-google"><img src="<?= BASEURL; ?>assets/img/google.svg">Google</button>
            </div>
        </form>
        <div class="bloc-non-membre">
            <p>Vous avez déjà un compte ? <a href="<?= BASEURL; ?>connexion.html">Connectez-vous ici</a>.</p>
        </div>
    </div>
</div>