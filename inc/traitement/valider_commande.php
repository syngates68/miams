<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

if (champs_non_vides(['quantite', 'heure']))
{
    if (is_numeric($_POST['quantite']))
    {
        if ($_POST['quantite'] <= req_plat_by_id($_POST['id_plat'])['quantite'])
        {
            $_SESSION['commande_valide'] = true;
            ajouter_commande($_SESSION['utilisateur'], $_POST['quantite'], $_POST['heure'], $_POST['id_plat']);
            update_quantite_plat($_POST['id_plat'], $_POST['quantite']);
        }
        else
        {
            echo "Il ne reste actuellement que ".req_plat_by_id($_POST['id_plat'])['quantite'].' parts pour ce plat, vous ne pouvez donc pas en commander '.$_POST['quantite'].'.';
        }
    }
    else
    {
        echo "Veuillez saisir une quantité correcte.";
    }
}
else
{
    echo "Tous les champs sont obligatoires.";
}