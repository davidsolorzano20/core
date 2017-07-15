<?php
/**
 * Created by PhpStorm.
 * User: Luis Solorzano
 * Date: 08-21-16
 * Time: 08:23 AM
 */

namespace Davis\http\thunder\route\router;

use Davis\baseurl\BaseUrl;
use Davis\http\thunder\route\exception\RouterException;
use Davis\http\thunder\route\route\Route;
use Davis\views\Views;

/**
 * Class Router
 * @package Davis\core\http\thunder\route\router
 */

class Routing {
	private static $url;
	private static $routes = [];
	private static $nameRoutes = [];

	public function __construct() {
		self::$url = $_GET['url'];
	}

	public static function Load() {
		self::$url = $_GET['url'];
	}

	public static function get($path, $callable, $name = NULL) {
		self::add($path, $callable, $name, 'GET');
	}

	public static function post($path, $callable, $name = NULL) {
		self::add($path, $callable, $name, 'POST');
	}

	public static function delete($path, $callable, $name = NULL) {
		self::add($path, $callable, $name, 'DELETE');
	}

	public static function put($path, $callable, $name = NULL) {
		self::add($path, $callable, $name, 'PUT');
	}

	/*public static function update($path, $callable, $name = NULL) {
		self::add($path, $callable, $name, 'UPDATE');
	}*/

	protected static function add($path, $callable, $name, $method) {
		$route = new Route($path, $callable);
		self::$routes[$method][] = $route;
		if ($name) {
			self::$nameRoutes[$name] = $route;
		}
		return $route;
	}

	public static function start() {
		if (!isset(self::$routes[$_SERVER['REQUEST_METHOD']])) {
			echo('REQUEST_METHOD does not exist in Davis');
		} else {
			foreach (self::$routes[$_SERVER['REQUEST_METHOD']] as $route) {
				if ($route->match (self::$url)) {
					return $route->call();
				}
			}
			if (self::$routes['DELETE']) {
				foreach (self::$routes['DELETE'] as $route) {
					if ($route->match (self::$url)) {
						return $route->call();
					}
				}
			}
			if (self::$routes['PUT']) {
				foreach (self::$routes['PUT'] as $route) {
					if ($route->match (self::$url)) {
						return $route->call();
					}
				}
			}
/*			if (self::$routes['UPDATE']) {
				foreach (self::$routes['UPDATE'] as $route) {
					if ($route->match (self::$url)) {
						return $route->call();
					}
				}
			}*/
		}
		$base_url = BaseUrl::url();
		Views::go('error.404',['base_url'=>$base_url]);
	}

	public function url($name, $params = []) {
		if (!isset(self::$nameRoutes[$name])) {
			$base_url = BaseUrl::url();
			Views::go('error.404',['base_url'=>$base_url]);
		}
		self::$nameRoutes[$name] = $this->getURL($params);

	}
}
