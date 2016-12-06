<?php

namespace Core\Classes;

class ObjectLoader
{

	public $DB, $template, $request, $log, $filesystem;

	public function __construct($database = null, $temp = null, $req = null, $logg = null, $fs = null){

		if($database == null) $this->DB = $GLOBALS['DB'];
		else $this->DB = $database;

		if($temp == null) $this->template = $GLOBALS['template'];
		else $this->template = $temp;

		if($req == null) $this->request = $GLOBALS['requestclass'];
		else $this->request = $req;

		if($logg == null) $this->log = $GLOBALS['log'];
		else $this->log = $logg;

		if($fs == null) $this->filesystem = $GLOBALS['filesystem'];
		else $this->filesystem = $fs;
	}
}
?>