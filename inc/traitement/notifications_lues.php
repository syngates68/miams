<?php
session_start();
include("../../config/config.php");
include("../../config/fonctions.php");

foreach (req_liste_notifications_by_user($_SESSION['utilisateur']) as $notification)
{
    update_notification_lue($notification['id']);
}