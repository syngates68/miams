<?php

function db()
{
    try{
        $bdd = new PDO('mysql:host=localhost;port=3307;dbname=miams;charset=utf8mb4', 'root', '');
    }
    catch(PDOException $e){
        print "Erreur : ". $e->getMessage()."<br/>";
        die();
    }

    return $bdd;
}