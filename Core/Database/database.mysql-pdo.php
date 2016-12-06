<?php

namespace Core\Database\MySQL_PDO;

use \PDO;
use Core\Classes\Config;
use Core\Classes\Debug;

class Database
{
	private $con;
	
	public function __construct($data){
		$this->con = new PDO($data['driver'] .':host='. $data['host'] .';dbname='. $data['database'] , $data['user'], $data['password'], [PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING]);
	}
	
	public function DestroyConnection(){
		return $this->con = null;
	}
	
	public function LastID(){
		return $this->con->lastInsertId();
	}
	
	public function CountRows($query){
		return $query->rowCount();
	}
	
	public function Error(){
		return $this->con->errorCode();
	}
	
	public function Query($query, $vars = []){
		$Statement = $this->con->prepare($query);

		if(is_array($vars))
			foreach($vars AS $key => $val){
				if (is_string($val))
					$Statement->bindParam($key, $vars[$key], PDO::PARAM_STR);
				else if(is_integer($val))
					$Statement->bindParam($key, $vars[$key], PDO::PARAM_INT);
			}
		$exec = $Statement->execute();

		if(Config::Get('underdev'))
			Debug::addQuery($query, $vars);

		if(!$exec)
			var_dump($Statement->errorInfo());
		else
			return $Statement;
	}
	
	public function Select($query, $vars = [], $multi = false){
		$Statement = $this->con->prepare($query);

		if(is_array($vars))
			foreach($vars AS $key => $val){
				if (is_string($val))
					$Statement->bindParam($key, $vars[$key], PDO::PARAM_STR);
				else if(is_integer($val))
					$Statement->bindParam($key, $vars[$key], PDO::PARAM_INT);
			}

		if(!$Statement->execute())
			var_dump($Statement->errorInfo());

		if(Config::Get('underdev'))
			Debug::addQuery($query, $vars);

		if(!$multi)
			return $Statement->fetch(PDO::FETCH_ASSOC);
		else
			return $Statement->fetchAll(PDO::FETCH_ASSOC);
	}
}
?>