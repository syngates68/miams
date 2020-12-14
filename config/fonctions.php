<?php
include('database.php');

function slugify($string, $delimiter = '-') 
{
	$oldLocale = setlocale(LC_ALL, '0');
	setlocale(LC_ALL, 'en_US.UTF-8');
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower($clean);
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$clean = trim($clean, $delimiter);
    setlocale(LC_ALL, $oldLocale);
    
	return $clean;
}

function formate_date($date)
{
    return date("d/m/Y", strtotime($date)); 
}

function champs_non_vides($valeurs)
{
	$is_empty = 1;

	foreach ($valeurs as $v)
	{
		if (!isset($_POST[$v]) || empty($_POST[$v]) || str_replace(' ', '', $_POST[$v]) == '')
		{
			$is_empty = 0;
			break;
		}
	}

	return $is_empty;
}

function inscription_utilisateur($nom, $prenom, $mail, $pass)
{
	$sql = "INSERT INTO utilisateurs(nom, prenom, mail, pass, date_inscription) VALUES (:nom, :prenom, :mail, :pass, :date_inscription)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'nom' => $nom,
		'prenom' => $prenom,
		'mail' => $mail,
		'pass' => $pass,
		'date_inscription' => date('Y-m-d H:i:s')
	]);
}

function count_utilisateur_by_mail($mail)
{
	$sql = "SELECT COUNT(*) FROM utilisateurs WHERE mail = :mail";
	$count = db()->prepare($sql);
	$count->execute(['mail' => $mail]);
	
	return $count->fetch(PDO::FETCH_NUM)[0];
}

function req_utilisateur_by_mail($mail)
{
	$sql = "SELECT * FROM utilisateurs WHERE mail = :mail";
	$req = db()->prepare($sql);
	$req->execute(['mail' => $mail]);
	
	return $req->fetch(PDO::FETCH_ASSOC);
}