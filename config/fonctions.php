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

function inscription_utilisateur($nom, $prenom, $mail, $pass, $code, $avatar)
{
	$sql = "INSERT INTO utilisateurs(nom, prenom, mail, pass, avatar, code_confirmation, date_inscription) VALUES (:nom, :prenom, :mail, :pass, :avatar, :code_confirmation, :date_inscription)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'nom' => $nom,
		'prenom' => $prenom,
		'mail' => $mail,
		'pass' => $pass,
		'avatar' => $avatar,
		'code_confirmation' => $code,
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

function req_liste_plats($id_utilisateur)
{
	$where = '';
	if ($id_utilisateur != NULL)
		$where = 'WHERE p.id_utilisateur != '.$id_utilisateur;
	
	$sql = "SELECT CONCAT(u.prenom, ' ', u.nom) as vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.photo_plat FROM plats p LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur $where ORDER BY p.date_publication DESC";
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

function ajouter_plat($nom, $type_plat, $prix, $quantite, $heure_debut, $heure_fin, $adresse, $code_postal, $ville, $informations_supplementaires, $image, $id_utilisateur)
{
	$sql = "INSERT INTO plats(nom, type_plat, prix, quantite, heure_debut, heure_fin, adresse, code_postal, ville, informations_supplementaires, photo_plat, slug, id_utilisateur, date_publication) VALUES (:nom, :type_plat, :prix, :quantite, :heure_debut, :heure_fin, :adresse, :code_postal, :ville, :informations_supplementaires, :photo, :slug, :id_utilisateur, :date_publication)";
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
		'photo' => $image,
		'slug' => slugify($nom),
		'id_utilisateur' => $id_utilisateur,
		'date_publication' => date('Y-m-d H:i:s')
	]);
}

function ajouter_commande($id_utilisateur, $quantite, $heure_souhaitee, $montant, $id_plat)
{
	$sql = "INSERT INTO commandes(id_utilisateur, quantite, heure_souhaitee, montant, id_plat, date_commande) VALUES (:id_utilisateur, :quantite, :heure_souhaitee, :montant, :id_plat, :date_commande)";
	$ins = db()->prepare($sql);
	$ins->execute([
		'id_utilisateur' => $id_utilisateur,
		'quantite' => $quantite,
		'heure_souhaitee' => $heure_souhaitee,
		'montant' => $montant,
		'id_plat' => $id_plat,
		'date_commande' => date('Y-m-d H:i:s')
	]);
}

function update_quantite_plat($id_plat, $quantite, $more)
{
	$op = '+';
	if (!$more)
		$op = '-';

	$sql = "UPDATE plats SET quantite = quantite $op :quantite WHERE id = :id";
	$upd = db()->prepare($sql);
	$upd->execute([
		'quantite' => $quantite,
		'id' => $id_plat
	]);
}

function req_derniere_commande_utilisateur($id_utilisateur)
{
	$sql = "SELECT id FROM commandes WHERE id_utilisateur = :id_utilisateur ORDER BY id DESC LIMIT 1";
	$req = db()->prepare($sql);
	$req->execute(['id_utilisateur' => $id_utilisateur]);
	return $req->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
}

function update_reference_commande($id_commande, $reference)
{
	$sql = "UPDATE commandes SET reference = :reference WHERE id = :id";
	$upd = db()->prepare($sql);
	$upd->execute([
		'reference' => $reference,
		'id' => $id_commande
	]);
}

function req_commandes_by_utilisateur($id_utilisateur)
{
	$sql = "SELECT c.id as id_commande, c.quantite, c.heure_souhaitee, c.montant, c.reference, c.etat, c.date_commande, c.date_recuperation, p.nom as nom_plat, p.adresse, p.code_postal, p.ville, p.photo_plat, CONCAT(u.prenom, ' ', u.nom) as vendeur, u.avatar FROM commandes c LEFT JOIN plats p ON p.id = c.id_plat LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur WHERE c.id_utilisateur = :id_utilisateur AND annule = 0 ORDER BY c.date_commande DESC";
	$req = db()->prepare($sql);
	$req->execute(['id_utilisateur' => $id_utilisateur]);
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_nb_commandes_en_cours_by_utilisateur($id_utilisateur)
{
	$sql = "SELECT COUNT(*) as nbr FROM commandes c WHERE c.id_utilisateur = :id_utilisateur AND c.etat = 0 AND c.annule = 0";
	$req = db()->prepare($sql);
	$req->execute(['id_utilisateur' => $id_utilisateur]);
	return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nbr'];
}


function req_total_depenses($id_utilisateur)
{
	$sql = "SELECT SUM(c.montant) as total FROM commandes c WHERE c.id_utilisateur = :id_utilisateur AND c.annule = 0";
	$req = db()->prepare($sql);
	$req->execute(['id_utilisateur' => $id_utilisateur]);
	return $req->fetchAll(PDO::FETCH_ASSOC)[0]['total'];
}

function annuler_commande($id_commande)
{
	$sql = "UPDATE commandes SET annule = 1 WHERE id = :id";
	$upd = db()->prepare($sql);
	$upd->execute([
		'id' => $id_commande
	]);
}

function req_commande_by_id($id_commande)
{
	$sql = "SELECT * FROM commandes WHERE id = :id_commande";
	$req = db()->prepare($sql);
	$req->execute(['id_commande' => $id_commande]);
	
	return $req->fetch(PDO::FETCH_ASSOC);
}

function req_nbr_notifications_by_user($id_utilisateur)
{
	$sql = "SELECT COUNT(*) as nbr FROM notifications WHERE lu = 0 AND id_utilisateur = :id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute([
		'id_utilisateur' => $id_utilisateur
	]);
	return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nbr'];
}

function req_nbr_messages_by_user($id_utilisateur)
{
	$sql = "SELECT COUNT(*) as nbr FROM messages WHERE lu = 0 AND id_utilisateur = :id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute([
		'id_utilisateur' => $id_utilisateur
	]);
	return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nbr'];
}

function req_liste_notifications_by_user($id_utilisateur)
{
	$sql = "SELECT * FROM notifications WHERE lu = 0 AND id_utilisateur = :id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute([
		'id_utilisateur' => $id_utilisateur
	]);
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_liste_messages_by_user($id_utilisateur)
{
	$sql = "SELECT * FROM messages WHERE lu = 0 AND id_utilisateur = :id_utilisateur";
	$req = db()->prepare($sql);
	$req->execute([
		'id_utilisateur' => $id_utilisateur
	]);
	return $req->fetchAll(PDO::FETCH_ASSOC);
}

function update_notification_lue($id_notification)
{
	$sql = "UPDATE notifications SET lu = 1 WHERE id = :id";
	$upd = db()->prepare($sql);
	$upd->execute([
		'id' => $id_notification
	]);
}

function upload_image(array $fichier)
{
    $max_size = 1000000;
    $types = array('image/jpg', 'image/png', 'image/jpeg');
    $fichier_temp = $fichier['tmp_name'];

    $type = $fichier['type'];
    $size = $fichier['size'];
    $dossier = '../../assets/plats/';

    $msg = '';

    if(in_array($type, $types))
    {
        if ($type == 'image/jpg')
            $type = '.jpg';

        if ($type == 'image/png')
            $type = '.png';

        if ($type == 'image/jpeg')
            $type = '.jpeg';

        if($size < $max_size)
        {
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $string = '';
            for($j = 0; $j < 9; $j++)
            {
                $string .= $char[rand(0, strlen($char)-1)];
            }

            $nom_fichier = $string.$type;
            $url = $dossier.$nom_fichier;

            if(move_uploaded_file($fichier_temp, $url))
                $msg = '1';
            else
                $msg = '0Une erreur innatendue s\'est produite durant le téléchargement de votre image.';
        }
        else
            $msg = '0L\'illustration choisie est trop lourde.';
    }
    else
        $msg = '0L\'illustration doit être au format PNG, JPG ou JPEG.';

    return [$msg, $url];
}