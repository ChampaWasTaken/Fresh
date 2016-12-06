<?php

namespace Core\Classes;

class Session 
{

	public $logged;
	private $DB;

	public function __construct($db){
		$this->DB = $db;
	}

	public static function sessionExist(string $ses_id) : bool{
		$q = "";
	}
}

?>