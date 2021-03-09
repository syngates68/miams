<?php
namespace App\Model;

use Core\Model;

use PDO;

class Reservations extends Model
{
    protected static $TABLE_NAME = "commandes";

    private $_id;
    private $_id_utilisateur;
    private $_quantite;
    private $_heure_souhaitee;
    private $_montant;
    private $_id_plat;
    private $_reference;
    private $_etat;
    private $_date_commande;
    private $_date_recuperation;
    private $_annule;

    public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function get_id_utilisateur(){
		return $this->_id_utilisateur;
	}

	public function set_id_utilisateur($_id_utilisateur){
		$this->_id_utilisateur = $_id_utilisateur;
	}

	public function get_quantite(){
		return $this->_quantite;
	}

	public function set_quantite($_quantite){
		$this->_quantite = $_quantite;
	}

	public function get_heure_souhaitee(){
		return $this->_heure_souhaitee;
	}

	public function set_heure_souhaitee($_heure_souhaitee){
		$this->_heure_souhaitee = $_heure_souhaitee;
	}

	public function get_montant(){
		return $this->_montant;
	}

	public function set_montant($_montant){
		$this->_montant = $_montant;
	}

	public function get_id_plat(){
		return $this->_id_plat;
	}

	public function set_id_plat($_id_plat){
		$this->_id_plat = $_id_plat;
	}

	public function get_reference(){
		return $this->_reference;
	}

	public function set_reference($_reference){
		$this->_reference = $_reference;
	}

	public function get_etat(){
		return $this->_etat;
	}

	public function set_etat($_etat){
		$this->_etat = $_etat;
	}

	public function get_date_commande(){
		return $this->_date_commande;
	}

	public function set_date_commande($_date_commande){
		$this->_date_commande = $_date_commande;
	}

	public function get_date_recuperation(){
		return $this->_date_recuperation;
	}

	public function set_date_recuperation($_date_recuperation){
		$this->_date_recuperation = $_date_recuperation;
	}

	public function get_annule(){
		return $this->_annule;
	}

	public function set_annule($_annule){
		$this->_annule = $_annule;
	}
	
	public static function getById($id)
	{
		return self::_getOne(static::$TABLE_NAME, '', '', "id = :id", [
			['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT]
		]);
    }
    
    public function insert_reservation()
    {
        $r = self::_insert(self::$TABLE_NAME, [
            ['key' => 'id_utilisateur', 'value' => $this->get_id_utilisateur(), 'type' => PDO::PARAM_INT],
            ['key' => 'quantite', 'value' => $this->get_quantite(), 'type' => PDO::PARAM_INT],
            ['key' => 'heure_souhaitee', 'value' => $this->get_heure_souhaitee(), 'type' => PDO::PARAM_STR],
            ['key' => 'montant', 'value' => $this->get_montant(), 'type' => PDO::PARAM_INT],
            ['key' => 'id_plat', 'value' => $this->get_id_plat(), 'type' => PDO::PARAM_INT],
            ['key' => 'date_commande', 'value' => $this->get_date_commande(), 'type' => PDO::PARAM_STR]
        ]);

        $this->set_id($r['id']);

        return ($r['count'] > 0) ? $this : false;
    }

	public function update_reference()
	{
		return self::_update(self::$TABLE_NAME, [
			['key' => 'reference', 'value' => $this->get_reference(), 'type' => PDO::PARAM_STR]
		], "id = :id", [
			['key' => ':id', 'value' => $this->get_id(), 'type' => PDO::PARAM_INT]
		]);
	}

    public static function buildModel(array $line)
    {
        $r = new Reservations([
            "id" => $line['id'],
            "id_utilisateur" => $line['id_utilisateur'],
            "quantite" => $line['quantite'],
            "heure_souhaitee" => $line['heure_souhaitee'],
            "montant" => $line['montant'],
            "id_plat" => $line['id_plat'],
            "reference" => $line['reference'],
            "etat" => $line['etat'],
            "date_commande" => $line['date_commande'],
            "date_recuperation" => $line['date_recuperation'],
            "annule" => $line['annule']
        ]);
        
        return $r;
	}
}