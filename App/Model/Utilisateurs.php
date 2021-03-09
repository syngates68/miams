<?php
namespace App\Model;

use Core\Model;

use PDO;

class Utilisateurs extends Model
{
    protected static $TABLE_NAME = "utilisateurs";

    private $_id;
    private $_nom;
    private $_prenom;
    private $_mail;
    private $_pass;
    private $_avatar;
    private $_code_confirmation;
    private $_confirm;
    private $_date_inscription;

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

	public function get_prenom(){
		return $this->_prenom;
	}

	public function set_prenom($_prenom){
		$this->_prenom = $_prenom;
	}

	public function get_mail(){
		return $this->_mail;
	}

	public function set_mail($_mail){
		$this->_mail = $_mail;
	}

	public function get_pass(){
		return $this->_pass;
	}

	public function set_pass($_pass){
		$this->_pass = $_pass;
	}

	public function get_avatar(){
		return $this->_avatar;
	}

	public function set_avatar($_avatar){
		$this->_avatar = $_avatar;
	}

	public function get_code_confirmation(){
		return $this->_code_confirmation;
	}

	public function set_code_confirmation($_code_confirmation){
		$this->_code_confirmation = $_code_confirmation;
	}

	public function get_confirm(){
		return $this->_confirm;
	}

	public function set_confirm($_confirm){
		$this->_confirm = $_confirm;
	}

	public function get_date_inscription(){
		return $this->_date_inscription;
	}

	public function set_date_inscription($_date_inscription){
		$this->_date_inscription = $_date_inscription;
    }
    
    public static function countByMail($mail)
    {
        return self::_count(static::$TABLE_NAME, '', "mail = :mail", [
            ['key' => 'mail', 'value' => $mail, 'type' => PDO::PARAM_STR]
        ]);
    }

    public static function getByMail($mail)
    {
        return self::_getOne(static::$TABLE_NAME, '', '', "mail = :mail", [
            ['key' => 'mail', 'value' => $mail, 'type' => PDO::PARAM_STR]
        ]);
    }

    public static function getById($id)
    {
        return self::_getOne(static::$TABLE_NAME, '', '', "id = :id", [
            ['key' => 'id', 'value' => $id, 'type' => PDO::PARAM_INT]
        ]);
    }

    public static function buildModel(array $line)
    {
        $u = new Utilisateurs([
            "id" => $line['id'],
            "nom" => $line['nom'],
            "prenom" => $line['prenom'],
            "mail" => $line['mail'],
            "pass" => $line['pass'],
            "avatar" => $line['avatar'],
            "code_confirmation" => $line['code_confirmation'],
            "confirm" => $line['confirm'],
            "date_inscription" => $line['date_inscription']
        ]);
        
        return $u;
	}
}