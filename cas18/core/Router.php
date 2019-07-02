<?php

namespace App\Core;

class Router
{
	protected $routes = [
		'GET' => [

		],
		'POST' => [

		]
	];

	public function get($uri, $controller) 
	{
		$this->routes['GET'][$uri] = $controller;
	}

	public function post($uri, $controller) 
	{
		$this->routes['POST'][$uri] = $controller;
	}

	public function direct($uri, $requestType)
	{                         //echo $uri.'...'.$requestType;exit;
		if(array_key_exists($uri, $this->routes[$requestType])){
			return $this->callAction(...explode('@', $this->routes[$requestType][$uri]));
		}

		throw new Exception('No route defined for this URI');
	}

	public static function load($file)
	{
		$router = new static;

		require $file;
		
		return $router;
	}

	public function callAction($controller, $action)
	{
		$controller = "App\\Controllers\\{$controller}";//   echo $controller;exit   ;
        //include($controller.'.php');
        //echo $controller;exit;
		$controller = new $controller;
		
		if(!method_exists($controller, $action)) {
			throw new Exception("Controller does not respond to the $action action");
		}

		return $controller->$action();
	}
}