<?php

namespace Core\Classes;

class Config
{

	private static $data;

	public static function Init(){

		Config::$data = require_once ("../config.php");
	}

	public static function Get(string $key){

		return Config::$data[$key];
	}

	public static function Set(string $key, $val){

		return Config::$data[$key] = $val;
	}
}
?>