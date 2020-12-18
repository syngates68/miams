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
	$sql = "SELECT CONCAT(u.prenom, ' ', u.nom) as vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.description, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.photo_plat FROM plats p LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute();
	
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_plat_by_id($id_plat)
{
	$sql = "SELECT CONCAT(u.prenom, ' ', u.nom) as vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.description, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.photo_plat FROM plats p LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur WHERE p.id = :id_plat";
	$req = db()->prepare($sql);
	$req->execute(['id_plat' => $id_plat]);
	
	return $req->fetch(PDO::FETCH_ASSOC);
}

function ajouter_plat($nom, $prix, $description, $heure_debut, $heure_fin, $adresse, $code_postal, $ville, $id_utilisateur)
{
	$sql = "INSERT INTO plats(nom, prix, description, quantite, heure_debut, heure_fin, adresse, code_postal, ville, photo_plat, slug, id_utilisateur, date_publication) VALUES (:nom, :prix, :description, 10, :heure_debut, :heure_fin, :adresse, :code_postal, :ville, 'escalope.jpg', :slug, :id_utilisateur, :date_publication)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'nom' => $nom,
		'prix' => $prix,
		'description' => $description,
		'heure_debut' => $heure_debut,
		'heure_fin' => $heure_fin,
		'adresse' => $adresse,
		'code_postal' => $code_postal,
		'ville' => $ville,
		'slug' => slugify($nom),
		'id_utilisateur' => $id_utilisateur,
		'date_publication' => date('Y-m-d H:i:s')
	]);
}