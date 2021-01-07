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
            $lettres = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z'];
            $montant = $_POST['quantite'] * req_plat_by_id($_POST['id_plat'])['prix']; 
            ajouter_commande($_SESSION['utilisateur'], $_POST['quantite'], $_POST['heure'], $montant, $_POST['id_plat']);
            update_quantite_plat($_POST['id_plat'], $_POST['quantite']);
            $id_commande = req_derniere_commande_utilisateur($_SESSION['utilisateur']);
            $reference = '';
            $reference = $reference.$lettres[rand(0, 25)].rand(0, 9);
            $reference = $reference.$id_commande.date('Ymd');
            update_reference_commande($id_commande, $reference);
            $_SESSION['commande_valide'] = true;
            $_SESSION['reference'] = $reference;
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