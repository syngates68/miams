<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

annuler_commande($_POST['id_commande']);