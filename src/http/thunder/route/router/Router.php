<?php
/**
 * Created by PhpStorm.
 * User: Luis Solorzano
 * Date: 08-21-16
 * Time: 08:23 AM
 */

namespace Davis\core\http\thunder\route\router;


use Davis\core\baseurl\BaseUrl;
use Davis\core\http\thunder\route\route\Route;
use Davis\core\views\Views;

class Router {
	private $url;
	private $routes = [];
	private $nameRoutes = [];

	public function __construct() {
		$this->url = $_GET['url'];
	}

	public function get($path, $callable, $name = NULL) {
		$this->add($path, $callable, $name, 'GET');
	}

	public function post($path, $callable, $name = NULL) {
		$this->add($path, $callable, $name, 'POST');
	}

	public function add($path, $callable, $name, $method) {
		$route = new Route($path, $callable);
		$this->routes[$method][] = $route;
		if ($name) {
			$this->nameRoutes[$name] = $route;
		}
		return $route;
	}

	public function start() {
		if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
			echo('REQUEST_METHOD does not exist in DavisFramework');
		}
		foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
			if ($route->match ($this->url)) {
				return $route->call();
			}
		}
		$base_url = BaseUrl::url();
		Views::go('error.404',['base_url'=>$base_url]);
	}

	public function url($name, $params = []) {
		if (!isset($this->nameRoutes[$name])) {
			$base_url = BaseUrl::url();
			Views::go('error.404',['base_url'=>$base_url]);
		}
		$this->nameRoutes[$name] = $this->getURL($params);

	}

}