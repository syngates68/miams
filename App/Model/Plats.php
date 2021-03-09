<?php
namespace App\Model;

use Core\Model;

use PDO;

class Plats extends Model
{
    protected static $TABLE_NAME = "plats";

    private $_id;
    private $_nom;
    private $_type_plat;
    private $_prix;
    private $_quantite;
    private $_heure_debut;
    private $_heure_fin;
    private $_adresse;
    private $_code_postal;
    private $_ville;
    private $_informations_supplementaires;
    private $_photo_plat;
    private $_slug;
    private $_id_utilisateur;
    private $_date_publication;

    public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function get_nom(){
		return $this->_nom;
	}

	public function set_nom($_nom){
		$this->_nom = $_nom;
	}

	public function get_type_plat(){
		return $this->_type_plat;
	}

	public function set_type_plat($_type_plat){
		$this->_type_plat = $_type_plat;
	}

	public function get_prix(){
		return $this->_prix;
	}

	public function set_prix($_prix){
		$this->_prix = $_prix;
	}

	public function get_quantite(){
		return $this->_quantite;
	}

	public function set_quantite($_quantite){
		$this->_quantite = $_quantite;
	}

	public function get_heure_debut(){
		return $this->_heure_debut;
	}

	public function set_heure_debut($_heure_debut){
		$this->_heure_debut = $_heure_debut;
	}

	public function get_heure_fin(){
		return $this->_heure_fin;
	}

	public function set_heure_fin($_heure_fin){
		$this->_heure_fin = $_heure_fin;
	}

	public function get_adresse(){
		return $this->_adresse;
	}

	public function set_adresse($_adresse){
		$this->_adresse = $_adresse;
	}

	public function get_code_postal(){
		return $this->_code_postal;
	}

	public function set_code_postal($_code_postal){
		$this->_code_postal = $_code_postal;
	}

	public function get_ville(){
		return $this->_ville;
	}

	public function set_ville($_ville){
		$this->_ville = $_ville;
	}

	public function get_informations_supplementaires(){
		return $this->_informations_supplementaires;
	}

	public function set_informations_supplementaires($_informations_supplementaires){
		$this->_informations_supplementaires = $_informations_supplementaires;
	}

	public function get_photo_plat(){
		return $this->_photo_plat;
	}

	public function set_photo_plat($_photo_plat){
		$this->_photo_plat = $_photo_plat;
	}

	public function get_slug(){
		return $this->_slug;
	}

	public function set_slug($_slug){
		$this->_slug = $_slug;
	}

	public function get_id_utilisateur(){
		return $this->_id_utilisateur;
	}

	public function set_id_utilisateur($_id_utilisateur){
		$this->_id_utilisateur = $_id_utilisateur;
	}

	public function get_date_publication(){
		return $this->_date_publication;
	}

	public function set_date_publication($_date_publication){
		$this->_date_publication = $_date_publication;
	}

    public static function getAll()
    {
		return self::_getInner('plats p', ' LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur', 'CONCAT(u.prenom, " ", u.nom) as vendeur, u.avatar as photo_vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.informations_supplementaires, p.photo_plat', '', []);
	}
	
	public static function getById($id)
	{
		return self::_getOne("plats p", "LEFT JOIN utilisateurs u ON u.id = p.id_utilisateur", "CONCAT(u.prenom, ' ', u.nom) as vendeur, u.avatar as photo_vendeur, p.id as id_plat, p.nom as nom_plat, p.prix, p.quantite, p.heure_debut, p.heure_fin, p.date_publication, p.slug, p.adresse, p.code_postal, p.ville, p.informations_supplementaires, p.photo_plat", "p.id = :id", [
			['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT]
		]);
	}

	public static function getBySimpleId($id)
	{
		return self::_getOne(static::$TABLE_NAME, '', '', "id = :id", [
			['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT]
		]);
	}

	public function insert_plat()
    {
        $p = self::_insert(self::$TABLE_NAME, [
            ['key' => 'nom', 'value' => $this->get_nom(), 'type' => PDO::PARAM_STR],
            ['key' => 'type_plat', 'value' => $this->get_type_plat(), 'type' => PDO::PARAM_INT],
            ['key' => 'prix', 'value' => $this->get_prix(), 'type' => PDO::PARAM_INT],
            ['key' => 'quantite', 'value' => $this->get_quantite(), 'type' => PDO::PARAM_INT],
            ['key' => 'heure_debut', 'value' => $this->get_heure_debut(), 'type' => PDO::PARAM_STR],
            ['key' => 'heure_fin', 'value' => $this->get_heure_fin(), 'type' => PDO::PARAM_STR],
            ['key' => 'adresse', 'value' => $this->get_adresse(), 'type' => PDO::PARAM_STR],
            ['key' => 'code_postal', 'value' => $this->get_code_postal(), 'type' => PDO::PARAM_STR],
            ['key' => 'ville', 'value' => $this->get_ville(), 'type' => PDO::PARAM_STR],
            ['key' => 'informations_supplementaires', 'value' => $this->get_informations_supplementaires(), 'type' => PDO::PARAM_STR],
            ['key' => 'photo_plat', 'value' => $this->get_photo_plat(), 'type' => PDO::PARAM_STR],
            ['key' => 'slug', 'value' => $this->get_slug(), 'type' => PDO::PARAM_STR],
            ['key' => 'id_utilisateur', 'value' => $this->get_id_utilisateur(), 'type' => PDO::PARAM_INT],
            ['key' => 'date_publication', 'value' => $this->get_date_publication(), 'type' => PDO::PARAM_STR]
        ]);

        $this->set_id($p['id']);

        return ($p['count'] > 0) ? $this : false;
    }

	public function update_quantite()
	{
		return self::_update(self::$TABLE_NAME, [
			['key' => 'quantite', 'value' => $this->get_quantite(), 'type' => PDO::PARAM_INT]
		], "id = :id", [
			['key' => ':id', 'value' => $this->get_id(), 'type' => PDO::PARAM_INT]
		]);
	}

    public static function buildModel(array $line)
    {
        $p = new Plats([
            "id" => $line['id'],
            "nom" => $line['nom'],
            "type_plat" => $line['type_plat'],
            "prix" => $line['prix'],
            "quantite" => $line['quantite'],
            "heure_debut" => $line['heure_debut'],
            "heure_fin" => $line['heure_fin'],
            "adresse" => $line['adresse'],
            "code_postal" => $line['code_postal'],
            "ville" => $line['ville'],
            "informations_supplementaires" => $line['informations_supplementaires'],
            "photo_plat" => $line['photo_plat'],
            "slug" => $line['slug'],
            "id_utilisateur" => $line['id_utilisateur'],
            "date_publication" => $line['date_publication'],
        ]);
        
        return $p;
	}
	
	public static function buildInner(array $line)
    {
		$tab = [
			"vendeur" => $line['vendeur'],
			"photo_vendeur" => $line['photo_vendeur'],
            "id_plat" => $line['id_plat'],
            "nom_plat" => $line['nom_plat'],
            "prix" => $line['prix'],
            "quantite" => $line['quantite'],
            "heure_debut" => $line['heure_debut'],
            "heure_fin" => $line['heure_fin'],
            "date_publication" => $line['date_publication'],
            "slug" => $line['slug'],
            "adresse" => $line['adresse'],
            "code_postal" => $line['code_postal'],
            "ville" => $line['ville'],
            "informations_supplementaires" => $line['informations_supplementaires'],
            "photo_plat" => $line['photo_plat']
		];

		return $tab;
	}
}