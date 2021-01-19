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
                    <div class="notification sparkle"></div>
                <?php endif; ?>
                <div class="titre">Notifications</div>
            </div>
            <div class="bloc-messages">
                <span class="material-icons">chat_bubble_outline</span>
                <?php if (req_nbr_messages_by_user($_SESSION['utilisateur']) > 0) : ?> 
                    <div class="notification sparkle"></div>
                <?php endif; ?>
                <div class="titre">Messages</div>
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
                <?php if (req_nbr_notifications_by_user($_SESSION['utilisateur']) > 0) : ?> 
                    <?php foreach (req_liste_notifications_by_user($_SESSION['utilisateur']) as $notification) : ?>
                        <div class="notification">
                            <span class="material-icons">beenhere</span>
                            <div class="contenu">
                                <?= $notification['contenu']; ?>
                                <div class="date-notification"><?= formate_date_heure($notification['date_notification']); ?></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="aucune-notification">Vous n'avez aucune notification.</div>
                <?php endif; ?>
            </div>

            <div class="mes-messages">
                <?php if (req_nbr_messages_by_user($_SESSION['utilisateur']) > 0) : ?> 
                    <div class="message">
                        <img src="<?= BASEURL; ?>assets/utilisateurs/grogu_pink.png">
                        <div class="contenu">
                            <div class="message-de">Emilie COUCHOT</div>
                            <div class="contenu-message">Bonjour, je vous contacte car j'aimerais savoir si...</div>
                            <div class="date-message">Le 18/01/2021 à 14h01</div>
                        </div>
                    </div>
                    <div class="message">
                        <img src="<?= BASEURL; ?>assets/utilisateurs/grogu_blue.png">
                        <div class="contenu">
                            <div class="message-de">Nathan SCHIFFERLE</div>
                            <div class="contenu-message">Bonjour Monsieur, j'ai commandé chez vous la dernière fois et...</div>
                            <div class="date-message">Le 18/01/2021 à 14h01</div>
                        </div>
                    </div>
                <?php else : ?>
                    <div class="aucun-message">Vous n'avez aucun message.</div>
                <?php endif; ?>
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