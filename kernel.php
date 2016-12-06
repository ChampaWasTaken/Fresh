<?php
ob_start();

/**
 * Zapocinjemo sessiju (niz/array $_SESSION)
 */

session_start();

/**
 * Ukljucujemo sve vazne fajlove
 */

require_once ("vendor/autoload.php");
require_once ("Core/Libraries/functions.php");

/**
 * Traitove ubacujemo ovdje (kolekcije funkcija)
 */

require_once ("Core/Traits/textparser.trait.php");

/**
 * Klase ovdje
 */

require_once ("Core/Database/database.mysql-pdo.php");
require_once ("Core/Libraries/smarty/libs/Smarty.class.php");
require_once ("Core/Classes/config.class.php");
require_once ("Core/Classes/object.class.php");
require_once ("Core/Classes/objectloader.class.php");
require_once ("Core/Classes/error_handler.class.php");
require_once ("Core/Classes/core.class.php");
require_once ("Core/Classes/crypto.class.php");
require_once ("Core/Classes/debug.class.php");
require_once ("Core/Classes/template.class.php");
require_once ("Core/Classes/log.class.php");
require_once ("Core/Classes/router.class.php");
require_once ("Core/Classes/request.class.php");
require_once ("Core/Classes/session.class.php");
require_once ("Core/Classes/user.class.php");

/**
 * Namespaces ovdje
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Filesystem\Exception\IOExceptionInterface;
use Core\Database\MySQL_PDO\Database;
use Core\Classes\Config;
use Core\Classes\Object;
use Core\Classes\ErrorHandler;
use Core\Classes\Debug;
use Core\Classes\Template;
use Core\Classes\Router;
use Core\Classes\Log;
use Core\Classes\RequestClass;

Debug::executionStart();
Config::Init();

/**
 * Inicijalizacija klasa
 */

$DB				=	new Database(Config::Get('database'));
$template 		=	new Template();
$router 		=	new Router();
$log 			=	new Log();
$requestclass 	=	new RequestClass();
$filesystem		=	new Filesystem();
$errhandler		=	new ErrorHandler();

$request = Request::createFromGlobals();

/**
 * Sve bitne klase(objekte) preko funkcije loadObjects stavljamo u staticne varijable metode "Object" tako da su dostupne u svim klasama (globalno)
 */
Object::loadObjects($DB, $template, $requestclass, $log, $filesystem);

/**
 * Dodajemo link putanje (URI ili URL)
 * Primjer:
 * http://stranica.com/neka/putanja => $router->add('/neka/putanja', 'Klasa@Metoda');
 * Klasa@Metoda moze bit bilo koja klasa sa svojom metodom ali mi koristimo kontrolere za to
 * Kontroleri se nalaze u folderu Core/Classes/Controllers
 * Kontroleri su ustvari klase koje pozivamo kada se dati zahtjev poklopi sa nekom nasom putanjom koju dodamo sa $router->add()
 * Te klase (kontroleri) sadrze metode (metodu dodajumo poslje @ znaci Klasa@Metoda)
 * U tim klasama prikazujemo template, pozivamo nove klase, kontaktiramo bazu itd itd...
 */

/**
 * Frontend kontroleri (Manje logike, vise displeja)
 */

require_once ("Core/Routes/frontend.routes.php");

/**
 * Backend kontroleri (Vise logike, manje displeja)
 */

require_once ("Core/Routes/backend.routes.php");

/**
 * Poredimo trazeni URI sa nizom putanja koje smo dodali preko $router->add
 */

$response = $router->handle($request);

/**
 * Debug konzola 
 */

if(Config::Get('underdev')){
	$end_time = round(microtime(true) - Debug::$execution_start, 4);

	$template->display('debug.tpl', [
		'queries'		=>	Debug::$sql_queries,
		'templates'		=>	Debug::$templates,
		'languages'		=>	Debug::$languages,
		'execution'		=>	$end_time,
		'ram_usage'		=>	convertBytes(memory_get_usage()),
		'peak_ram'		=>	convertBytes(memory_get_peak_usage()),
		'request_type'	=>	$_SERVER['REQUEST_METHOD']
	]);
}

/**
 * Prekidamo konekciju sa bazon
 */

$DB->DestroyConnection();

/**
 Flushamo podatke
 */

ob_flush();
?>