<?php

namespace Core\Classes;

class ErrorHandler
{

	public function __construct(){

		register_shutdown_function([$this, "check_for_fatal"]);
		set_error_handler([$this, "log_error"]);
		set_exception_handler([$this, "log_exception"]);
		ini_set("display_errors", "off");
		error_reporting(E_ALL);
	}

	function check_for_fatal(){
		$error = error_get_last();
		if($error["type"] == E_ERROR)
			$this->log_error($error["type"], $error["message"], $error["file"], $error["line"]);
	}

	function log_error($num, $str, $file, $line, $context = null){
		return $this->log_exception(new \ErrorException($str, 0, $num, $file, $line));
	}

	/**
	 * Reportovanje errora
	 * Ako smo u development modu, prikazi ih
	 * Ako nismo, loguj ih
	 */

	function log_exception($e){

		if(Config::Get('underdev')){
			echo '<link rel="stylesheet" href="/Css/main.css" >
			<div class="error_debug">
				<h4>'. Config::Get('site_name') .' | '. get_class($e) .'</h4>
					
				<div class="body">
					<p><strong>Poruka:</strong> '. $e->getMessage() .'</p>
					<p><strong>Fajl:</strong> '. $e->getFile() .'</p>
					<p><strong>Linija:</strong> '. $e->getLine() .'</p>
					<p><strong>Stack trace</strong><br/>'. $e->getTraceAsString() .'</p>
				</div>
			</div>';
		} else {
			Object::$log->write('site_error', 'Tip: '. get_class($e) .' | Poruka: '. $e->getMessage() .' | Fajl: '. $e->getFile() .' | Linija: '. $e->getLine() .' | Stack trace: '. $e->getTraceAsString());

			Object::$request->Redirect('/pokvarena');
		}
		
		exit();
	}
}
?>