<?php

namespace Core\Classes;

use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\HttpKernel;
use Core\Controller;

class Router extends Core
{
	/**
	 * @param RouteCollection
	*/

	protected $routes;

	/**
	 * Kreira novu kolekciju putanji
	 *
	 * @return void
	*/

	public function __construct()
	{
		$this->routes = new RouteCollection();
	}
		
	/**
	 * Pokusava da pronadje putanju iz $this->routes
	 * Ako uspije, poziva kontroler (method/closure/function)
	 *
	 * @param $request: Request
	 * @return mixed
	*/

	public function handle($request){

		// Kreiramo kontekst koristeci zahtjev
		$context = new RequestContext();
		$context->fromRequest($request);
		$response = true;	
		$matcher = new UrlMatcher($this->routes, $context);

		try {
			$attributes = $matcher->match($request->getPathInfo());
			$controller = $attributes['controller'];

			if(is_string($controller) && $this->validMethodController($controller)){

				$controller = $this->createActionFromController($controller);

				if(!class_exists($controller[0]))
					require ("../Core/Classes/Controllers/". strtolower(str_replace('Controller', '.controller.php', $controller[0])));

				$conobj = new $controller[0]();

				if(is_callable(array($conobj, $controller[1])))
					$response = call_user_func_array(array($conobj, $controller[1]), $this->prepareArgsForMethod($attributes));
				
			} else if(parent::isClosure($controller))
				$response = call_user_func_array($controller, $this->prepareArgsForMethod($attributes));
			else if(is_callable($controller))
				call_user_func_array($controller, $this->prepareArgsForMethod($attributes));

		} catch (ResourceNotFoundException $e) {
			$response = $e;
		}

		return $response;
	}
	
	/**
	 * https://www.youtube.com/watch?v=OPf0YbXqDm0 This one for the hood girls them good girls
	 * Dodajemo POST putanju
	 *
	 * @param $path: String
	 * @param $controller: String|Closure
	 * @return void
	 */

	public function post($path, $controller){
		return $this->add($path, $controller, 'POST');
	}

	/**
	 * Dodajemo GET putanju
	 *
	 * @param $path: String
	 * @param $controller: String|Closure
	 * @return void
	 */

	public function get($path, $controller){
		return $this->add($path, $controller, 'GET');
	}

	/**
	 * Dodajemo putanju i kontroler u putanje
	 *
	 * @param $path: String
	 * @param $controller: String|Closure
	 * @return void
	*/

	private function add($path, $controller, $method){
		$this->routes->add($path, new Route(
			$path,
			array('controller' => $controller),
			[],
			[],
			'',
			[],
			[$method]
		));
	}

	/**
	 * Provjerava da li je dati string validan kontroler Class@Method
	 *
	 * @param $action: String
	 * @return bool
	*/

	private function validMethodController($action){

		if(strpos($action, '@') !== false)
			return true;
		else
			return false;
	}

	/**
	 * Priprema argumente za call_user_func_array()
	 *
	 * @param $array: Array
	 * @return array
	*/

	private function prepareArgsForMethod($array){
		unset($array['controller'], $array['_route']);
		return $array;
	}

	/**
	 * "Reze" string na svakom @
	 *
	 * @param $action: String
	 * @return void
	*/

	private function createActionFromController($action){

		return explode("@", $action);
	}
}
?>