<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

if (isset($_POST['submit_plat']))
{
    if (champs_non_vides(['nom', 'type_plat', 'heure_debut', 'heure_fin', 'adresse', 'code_postal', 'ville', 'prix', 'quantite']))
    {
        $rep = upload_image($_FILES['photo_plat']);

        if (substr($rep[0], 0, 1) == 1)
        {
            ajouter_plat($_POST['nom'], $_POST['type_plat'], $_POST['prix'], $_POST['quantite'], $_POST['heure_debut'], $_POST['heure_fin'], $_POST['adresse'], $_POST['code_postal'], $_POST['ville'], nl2br($_POST['informations_supplementaires']), str_replace('../', '', $rep[1]), $_SESSION['utilisateur']);
            $_SESSION['success_ajout'] = "Votre plat a bien été ajouté, merci.";
            header('Location:'.BASEURL.'ajouter_plat.html');
            exit;
        }
        else
        {
            $_SESSION['nom'] = (isset($_POST['nom'])) ? $_POST['nom'] : NULL;
            $_SESSION['type_plat'] = (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL;
            $_SESSION['heure_debut'] = (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL;
            $_SESSION['heure_fin'] = (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL;
            $_SESSION['adresse'] = (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL;
            $_SESSION['prix'] = (isset($_POST['prix'])) ? $_POST['prix'] : NULL;
            $_SESSION['quantite'] = (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL;
            $_SESSION['informations_supplementaires'] = (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL;
            $_SESSION['error_ajout'] = substr($rep[0], 1);
            header('Location:'.BASEURL.'ajouter_plat.html');
            exit;
        }
    }
    else
    {
        $_SESSION['nom'] = (isset($_POST['nom'])) ? $_POST['nom'] : NULL;
        $_SESSION['type_plat'] = (isset($_POST['type_plat'])) ? $_POST['type_plat'] : NULL;
        $_SESSION['heure_debut'] = (isset($_POST['heure_debut'])) ? $_POST['heure_debut'] : NULL;
        $_SESSION['heure_fin'] = (isset($_POST['heure_fin'])) ? $_POST['heure_fin'] : NULL;
        $_SESSION['adresse'] = (isset($_POST['adresse'])) ? $_POST['adresse'] : NULL;
        $_SESSION['prix'] = (isset($_POST['prix'])) ? $_POST['prix'] : NULL;
        $_SESSION['quantite'] = (isset($_POST['quantite'])) ? $_POST['quantite'] : NULL;
        $_SESSION['informations_supplementaires'] = (isset($_POST['informations_supplementaires'])) ? $_POST['informations_supplementaires'] : NULL;
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