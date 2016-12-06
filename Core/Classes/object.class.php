<?php

namespace Core\Classes;

class Object
{
	public static $DB, $template, $request, $log, $filesystem;

	public static function loadObjects($db, $template, $requestclass, $log, $filesystem){

		Object::$DB = $db;
		Object::$template = $template;
		Object::$request = $requestclass;
		Object::$log = $log;
		Object::$filesystem = $filesystem;
	}
}
?>