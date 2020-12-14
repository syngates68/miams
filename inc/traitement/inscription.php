<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

if (isset($_POST['submit_inscription']))
{
    if (champs_non_vides(['nom', 'prenom', 'mail', 'mail_confirm', 'pass', 'pass_confirm']))
    {
        if (filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL))
        {
            if ($_POST['mail'] == $_POST['mail_confirm'])
            {
                if ($_POST['pass'] == $_POST['pass_confirm'])
                {
                    inscription_utilisateur(ucfirst($_POST['nom']), ucfirst($_POST['prenom']), $_POST['mail'], password_hash($_POST['pass'], PASSWORD_BCRYPT));
                    
                    $_SESSION['success_inscription'] = "Vous êtes désormais inscrit, bienvenue sur Miams.";
                    header('Location:'.BASEURL.'inscription.html');
                    exit;
                }
                else
                {
                    $_SESSION['error_inscription'] = "Les deux mots de passe renseignés ne sont pas identiques.";
                    $_SESSION['_nom'] = isset($_POST['nom']) ? $_POST['nom'] : null;
                    $_SESSION['_prenom'] = isset($_POST['prenom']) ? $_POST['prenom'] : null;
                    $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                    header('Location:'.BASEURL.'inscription.html');
                    exit;
                }
            }
            else
            {
                $_SESSION['error_inscription'] = "Les deux adresses mail renseignées ne sont pas identiques.";
                $_SESSION['_nom'] = isset($_POST['nom']) ? $_POST['nom'] : null;
                $_SESSION['_prenom'] = isset($_POST['prenom']) ? $_POST['prenom'] : null;
                $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
                header('Location:'.BASEURL.'inscription.html');
                exit;
            }
        }
        else
        {
            $_SESSION['error_inscription'] = "Veuillez saisir une adresse mail valide.";
            $_SESSION['_nom'] = isset($_POST['nom']) ? $_POST['nom'] : null;
            $_SESSION['_prenom'] = isset($_POST['prenom']) ? $_POST['prenom'] : null;
            $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
            header('Location:'.BASEURL.'inscription.html');
            exit;
        }
    }
    else
    {
        $_SESSION['error_inscription'] = "Tous les champs sont obligatoires. Veuillez les remplir afin de vous inscrire.";
        $_SESSION['_nom'] = isset($_POST['nom']) ? $_POST['nom'] : null;
        $_SESSION['_prenom'] = isset($_POST['prenom']) ? $_POST['prenom'] : null;
        $_SESSION['_mail'] = isset($_POST['mail']) ? $_POST['mail'] : null;
        header('Location:'.BASEURL.'inscription.html');
        exit;
    }
}
else
{
    header('Location:'.BASEURL.'inscription.html');
    exit;
}