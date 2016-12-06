<?php

namespace Core\Classes;

class RequestClass
{
	public function __construct(){
		
		extract($_GET);
		extract($_POST);
		extract($_SERVER);
		extract($_FILES);
		extract($_ENV);
		extract($_COOKIE);
		extract($_SESSION);
		extract($_FILES);
	}

	public function Get($key = null, $val = null){

		if($val == null){
			if($key == null) return $_GET;
			else if(isset($_GET[$key])) return $_GET[$key];
			else return false;
		} else
			return $_GET[$key] = $val;
	}

	public function Post($key = null, $val = null){

		if($val == null){
			if($key == null) return $_POST;
			else if(isset($_POST[$key])) return $_POST[$key];
			else return false;
		} else
			return $_POST[$key] = $val;
	}

	public function Files($key = null, $val = null){

		if($val == null){
			if($key == null) return $_FILES;
			else if(isset($_FILES[$key])) return $_FILES[$key];
			else return false;
		} else
			return $_FILES[$key] = $val;
	}

	public function Cookie($key = null, $val = null, $expiry = 0){

		if($val == null){
			if($key == null) return $_COOKIE;
			else if(isset($_COOKIE[$key])) return $_COOKIE[$key];
			else return false;
		} else
			return setcookie($key, $val, $expiry, "/", NULL, NULL, TRUE);
	}

	public function Session($key = null, $val = null){

		if($val == null){
			if($key == null) return $_SESSION;
			else if(isset($_SESSION[$key])) return $_SESSION[$key];
			else return false;
		} else
			return $_SESSION[$key] = $val;
	}

	public function Redirect(string $location){

		if(!headers_sent()) header('Location: '. $location);
		else echo '<meta http-equiv="refresh" content="0; url='.  $location .'">';

		exit();
	}
}
?>