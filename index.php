<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

include("config/config.php");
include("config/fonctions.php");

ob_start();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/png" href="<?= BASEURL; ?>assets/img/logo.svg" />
    <title><!-- TITLE --> - Commandez votre repas de ce soir en ligne</title>
    <link rel="stylesheet" href="<?= BASEURL ?>assets/css/main.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet"> 
    <script src="<?= BASEURL; ?>assets/js/jquery.min.js"></script>
    <script src="<?= BASEURL; ?>assets/js/emoji-button-3.0.3.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="icon" type="image/png" href="<?= BASEURL ?>assets/img/favicon.png" />
    <!--<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>-->
    <script src="<?= BASEURL; ?>assets/ckeditor/ckeditor.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Roboto">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        var baseurl = "<?= BASEURL; ?>"
    </script>
</head>
<body>

    <?php include("vues/index.php"); ?>

    <script src="<?= BASEURL; ?>assets/js/main.js"></script>
</body>
</html>

<?php 
$content = ob_get_clean();
echo str_replace('<!-- TITLE -->', $page_title, $content);