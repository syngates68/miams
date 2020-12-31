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

function formate_date_heure($date)
{
    return date("d/m/Y à H:i", strtotime($date)); 
}

function ecart_date($date)
{
    setlocale(LC_TIME, 'fra_fra');
    $now = time();
    $created = strtotime($date);
    // La différence est en seconde
    //echo $now;
    $diff = $now-$created;
    $m = ($diff)/(60); // on obtient des minutes
    $h = ($diff)/(60*60); // ici des heures
    $j = ($diff)/(60*60*24); // jours
    $s = ($diff)/(60*60*24*7); // semaines
    $mo = ($diff)/(60*60*24*7*4); //mois
    $a = ($diff)/(60*60*24*7*4*12); // années
    if ($diff < 60) { // "à l'instant"
        return 'À l\'instant';
    }
    elseif ($m < 60) { // "il y a x minutes"
        $minute = (floor($m) == 1) ? 'minute' : 'minutes';
        return 'Il y a '.floor($m).' '.$minute;
    }
    elseif ($h < 24) { // " il y a x heures"
        $heure = (floor($h) <= 1) ? 'heure' : 'heures';
        $dateFormated = 'Il y a '.floor($h).' '.$heure;
        return $dateFormated;
    }
    elseif ($j < 7) { // " il y a x jours"
        //$jour = (floor($j) <= 1) ? 'jour' : 'jours';
        if (floor($j) <= 1){
            $dateFormated = 'Hier';
        }
        else{
            $dateFormated = 'Il y a '.floor($j).' jours';
        }
        return $dateFormated;
    }
    elseif ($s < 5) { // " il y a x semaines"
        $semaine = (floor($s) <= 1) ? 'semaine' : 'semaines';
        $dateFormated = 'Il y a '.floor($s).' '.$semaine;
        return $dateFormated;
    }
    elseif ($mo < 12){
        $dateFormated = 'Il y a '.floor($mo).' mois';
        return $dateFormated;
    }
    else{
        $annees = (floor($a) <= 1) ? 'an' : 'ans';
        $dateFormated = 'Il y a '.floor($a).' '.$annees;
        return $dateFormated;
    }
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

function extrait_texte(string $texte, int $longueur)
{
	if (strlen($texte) <= $longueur)
		return $texte;
	
	$texte = substr($texte, 0, $longueur);
	$espace = strrpos($texte, '</p>');

	if ($espace > 0)
		$texte = substr($texte, 0, $espace);

	return $texte.'...';
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

function req_utilisateur_by_id($id)
{
	$sql = "SELECT * FROM utilisateurs WHERE id = :id";
	$req = db()->prepare($sql);
	$req->execute(['id' => $id]);
	
	return $req->fetch(PDO::FETCH_ASSOC);
}

function req_liste_plats()
{
	$sql = "SELECT CONCAT(u.prenom, ' ', u.nom) as vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.photo_plat FROM plats p LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute();
	
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_plat_by_id($id_plat)
{
	$sql = "SELECT CONCAT(u.prenom, ' ', u.nom) as vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.informations_supplementaires, p.photo_plat FROM plats p LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur WHERE p.id = :id_plat";
	$req = db()->prepare($sql);
	$req->execute(['id_plat' => $id_plat]);
	
	return $req->fetch(PDO::FETCH_ASSOC);
}

function ajouter_plat($nom, $type_plat, $prix, $quantite, $heure_debut, $heure_fin, $adresse, $code_postal, $ville, $informations_supplementaires, $id_utilisateur)
{
	$sql = "INSERT INTO plats(nom, type_plat, prix, quantite, heure_debut, heure_fin, adresse, code_postal, ville, informations_supplementaires, photo_plat, slug, id_utilisateur, date_publication) VALUES (:nom, :type_plat, :prix, :quantite, :heure_debut, :heure_fin, :adresse, :code_postal, :ville, :informations_supplementaires, 'bg-login.jpg', :slug, :id_utilisateur, :date_publication)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'nom' => $nom,
		'type_plat' => $type_plat,
		'prix' => $prix,
		'quantite' => $quantite,
		'heure_debut' => $heure_debut,
		'heure_fin' => $heure_fin,
		'adresse' => $adresse,
		'code_postal' => $code_postal,
		'ville' => $ville,
		'informations_supplementaires' => $informations_supplementaires,
		'slug' => slugify($nom),
		'id_utilisateur' => $id_utilisateur,
		'date_publication' => date('Y-m-d H:i:s')
	]);
}

function ajouter_commande($id_utilisateur, $quantite, $heure_souhaitee, $id_plat)
{
	$sql = "INSERT INTO commandes(id_utilisateur, quantite, heure_souhaitee, id_plat, date_commande) VALUES (:id_utilisateur, :quantite, :heure_souhaitee, :id_plat, :date_commande)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'id_utilisateur' => $id_utilisateur,
		'quantite' => $quantite,
		'heure_souhaitee' => $heure_souhaitee,
		'id_plat' => $id_plat,
		'date_commande' => date('Y-m-d H:i:s')
	]);
}