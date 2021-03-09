<?php
namespace App\Model;

use Core\Model;

use PDO;

class Messages extends Model
{
    protected static $TABLE_NAME = "messages";

    private $_id;
    private $_id_envoi;
    private $_id_reception;
    private $_contenu;
    private $_lu;
    private $_date_message;

    public function get_id(){
		return $this->_id;
	}

	public function set_id($_id){
		$this->_id = $_id;
	}

	public function get_id_envoi(){
		return $this->_id_envoi;
	}

	public function set_id_envoi($_id_envoi){
		$this->_id_envoi = $_id_envoi;
	}

	public function get_id_reception(){
		return $this->_id_reception;
	}

	public function set_id_reception($_id_reception){
		$this->_id_reception = $_id_reception;
	}

	public function get_contenu(){
		return $this->_contenu;
	}

	public function set_contenu($_contenu){
		$this->_contenu = $_contenu;
	}

	public function get_lu(){
		return $this->_lu;
	}

	public function set_lu($_lu){
		$this->_lu = $_lu;
	}

	public function get_date_message(){
		return $this->_date_message;
	}

	public function set_date_message($_date_message){
		$this->_date_message = $_date_message;
    }

    public static function getByUser($id_user)
    {
        return self::_getInner('messages m', ' LEFT JOIN utilisateurs u ON u.id = m.id_envoi', 'm.id, CONCAT(u.prenom, " ", u.nom) as utilisateur_envoi, m.contenu, m.lu, m.date_message', "m.id_reception = :id_user ORDER BY m.id DESC", [
            ['key' => 'id_user', 'value' => $id_user, 'type' => PDO::PARAM_INT]
        ]);
    }
    
    public static function countByUser($id_user)
    {
        return self::_count(static::$TABLE_NAME, '', "id_reception = :id_user AND lu = 0", [
            ['key' => 'id_user', 'value' => $id_user, 'type' => PDO::PARAM_INT]
        ]);
    }
    
    public function insert_message()
    {
        $m = self::_insert(self::$TABLE_NAME, [
            ['key' => 'id_envoi', 'value' => $this->get_id_envoi(), 'type' => PDO::PARAM_INT],
            ['key' => 'id_reception', 'value' => $this->get_id_reception(), 'type' => PDO::PARAM_INT],
            ['key' => 'contenu', 'value' => $this->get_contenu(), 'type' => PDO::PARAM_STR],
            ['key' => 'lu', 'value' => $this->get_lu(), 'type' => PDO::PARAM_INT],
            ['key' => 'date_message', 'value' => $this->get_date_message(), 'type' => PDO::PARAM_STR]
        ]);

        $this->set_id($m['id']);

        return ($m['count'] > 0) ? $this : false;
    }

    public static function buildModel(array $line)
    {
        $m = new Messages([
            "id" => $line['id'],
            "id_envoi" => $line['id_envoi'],
            "id_reception" => $line['id_reception'],
            "contenu" => $line['contenu'],
            "lu" => $line['lu'],
            "date_message" => $line['date_message']
        ]);
        
        return $m;
    }
    
    public static function buildInner(array $line)
    {
		$tab = [
			"id" => $line['id'],
			"utilisateur_envoi" => $line['utilisateur_envoi'],
            "contenu" => $line['contenu'],
            "lu" => $line['lu'],
            "date_message" => $line['date_message']
		];

		return $tab;
	}
}