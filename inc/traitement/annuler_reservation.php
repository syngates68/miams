<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

annuler_commande($_POST['id_commande']);
$commande = req_commande_by_id($_POST['id_commande']);
update_quantite_plat($commande['id_plat'], $commande['quantite'], true);