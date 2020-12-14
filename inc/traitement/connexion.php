<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

if (isset($_POST['submit_connexion']))
{
    if (champs_non_vides(['mail', 'pass']))
    {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
           if (count_utilisateur_by_mail($_POST['mail']) == 1)
           {
                $utilisateur = req_utilisateur_by_mail($_POST['mail']);
                
                if (password_verify($_POST['pass'], $utilisateur['pass']))
                {
                    $_SESSION['utilisateur'] = $utilisateur['id'];
                    header('Location:'.BASEURL);
                    exit;
                }
                else
                {
                    $_SESSION['error_connexion'] = "Mauvaise adresse mail ou mot de passe, veuillez vérifier les informations rentrées.";
                    $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                    header('Location:'.BASEURL.'connexion.html');
                    exit;
                }
           }
           else
           {
                $_SESSION['error_connexion'] = "Aucun compte ne correspond aux informations renseignées.";
                $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                header('Location:'.BASEURL.'connexion.html');
                exit;
           }
        }
        else
        {
            $_SESSION['error_connexion'] = "Veuillez saisir une adresse mail valide.";
            $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
            header('Location:'.BASEURL.'connexion.html');
            exit;
        }
    }
    else
    {
        $_SESSION['error_connexion'] = "Tous les champs sont obligatoires.";
        $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
        header('Location:'.BASEURL.'connexion.html');
        exit;
    }
}
else
{
    header('Location:'.BASEURL.'connexion.html');
    exit;
}