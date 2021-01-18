<?php
if (file_exists('vues/'.$var_page.'.php'))
{
?>

<div class="navbar">
    <!--<div class="bloc-menu">
        <span class="material-icons">menu</span>
    </div>-->
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
            <div class="bloc-notifications">
                <span class="material-icons">notifications_none</span>
                <?php if (req_nbr_notifications_by_user($_SESSION['utilisateur']) > 0) : ?> 
                    <div class="notification"></div>
                <?php endif; ?>
            </div>
            <div class="bloc-messages">
                <span class="material-icons">chat_bubble_outline</span>
                <?php if (req_nbr_messages_by_user($_SESSION['utilisateur']) > 0) : ?> 
                    <div class="notification"></div>
                <?php endif; ?>
            </div>
            <div class="bloc-utilisateur">
                <div class="bloc-avatar dropdown-utilisateur">
                    <img src="<?= BASEURL; ?>assets/<?= $user['avatar']; ?>" alt="Photo de profil de <?= $user['prenom'].' '.$user['nom']; ?>">
                </div>
                <span class="utilisateur"><?= $user['prenom']; ?></span>
            </div>
            <div class="bloc-dropdown-utilisateur">
                <div class="lien-dropdown">
                    <span class="material-icons">beenhere</span>
                    <a href="<?= BASEURL; ?>mes_reservations.html">Mes réservations</a>
                </div>
                <div class="lien-dropdown">
                    <span class="material-icons">restaurant</span>
                    <a href="#">Mes plats</a>
                </div>
                <div class="lien-dropdown">
                    <span class="material-icons">settings</span>
                    <a href="#">Mes préférences</a>
                </div>
                <div class="lien-dropdown">
                    <span class="material-icons">meeting_room</span>
                    <a href="<?= BASEURL; ?>deconnexion.html">Déconnexion</a>
                </div>
            </div>

            <div class="mes-notifications">
                <div class="notification">
                    <span class="material-icons">beenhere</span>
                    <div class="contenu">
                        Une nouvelle réservation a été faite pour votre plat <B>Gratin Dauphinois</B>
                        <div class="date-notification">Le 18/01/2021 à 14h01</div>
                    </div>
                </div>
                <div class="notification">
                    <span class="material-icons">star_half</span>
                    <div class="contenu">
                        Emilie COUCHOT vient de donner un avis vous concernant
                        <div class="date-notification">Le 18/01/2021 à 14h01</div>
                    </div>
                </div>
                <div class="notification">
                    <span class="material-icons">beenhere</span>
                    <div class="contenu">
                        Une nouvelle réservation a été faite pour votre plat <B>Tarte au citron meringué</B>
                        <div class="date-notification">Le 18/01/2021 à 14h01</div>
                    </div>
                </div>
            </div>
        <?php 
        else : 
        ?>
            <a class="btn-connexion" href="<?= BASEURL; ?>connexion.html">Se connecter</a>
        <?php
        endif;
        ?>
    </div>
</div>

    <div class="site-content">
<?php
        include($var_page.'.php');
?>
    </div>
<?php
    $bg_footer = 'bg-img';
    if ($var_page == 'connexion' || $var_page == 'inscription')
        $bg_footer = 'bg-color';
?>
<footer class="<?= $bg_footer; ?>">
    <div class="bloc-footer">
        <a href="">Mentions légales</a>
        <a href="">Conditions Générales d'Utilisation</a>
        <a href="">Conditions Générales de Vente</a>
    </div>
    <div class="bloc-footer">
        <a href="">Contact</a>
        <a href="">Qui sommes-nous ?</a>
    </div>
    <div class="bloc-footer">
        <span class="copyright">Copyright MIAMS <?= date('Y'); ?></span>
    </div>
</footer>

<?php
}