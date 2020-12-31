<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

if (isset($_POST['submit_plat']))
{
    if (champs_non_vides(['nom', 'type_plat', 'heure_debut', 'heure_fin', 'adresse', 'code_postal', 'ville', 'prix', 'quantite']))
    {
        ajouter_plat($_POST['nom'], $_POST['type_plat'], $_POST['prix'], $_POST['quantite'], $_POST['heure_debut'], $_POST['heure_fin'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], $_POST['informations_supplementaires'], $_SESSION['utilisateur']);
        $_SESSION['success_ajout'] = "Votre plat a bien été ajouté, merci.";
        header('Location:'.BASEURL.'ajouter_plat.html');
        exit;
    }
    else
    {
        $_SESSION['error_ajout'] = "Tous les champs sont obligatoires.";
        header('Location:'.BASEURL.'ajouter_plat.html');
        exit;
    }
}
else
{
    header('Location:'.BASEURL);
    exit;
}