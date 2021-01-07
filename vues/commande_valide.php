<?php
    $page_title = "Commande validée";
    if (isset($_SESSION['commande_valide']))
    {
?>
    <div class="container-commande-valide">
        <div class="bloc-validation">
            <div class="message-validation">
                <div class="bloc-image">
                    <img src="<?= BASEURL; ?>assets/img/valid.svg" alt="Image de validation">
                </div>
                <div class="message-validation-commande">
                    <p class="titre">Votre commande a bien été prise en compte.</p>
                    <p>Cette dernière porte le numéro <?= $_SESSION['reference']; ?>.</p>
                    <p>Merci de votre confiance.</p>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function()
        {
            var navbar = $('.navbar').css('height').replace('px', '');
            var footer = $('footer').css('height').replace('px', '');
            var _window = window.innerHeight;

            var h = _window - navbar - footer;
            $('.container-commande-valide .bloc-validation').css('height', h + 'px');
        });
    </script>
<?php
    unset($_SESSION['reference']);
    unset($_SESSION['commande_valide']);
    }
    else
    {
        header('Location:'.BASEURL);
        exit;
    }
?>