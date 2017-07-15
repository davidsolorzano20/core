<?php
/**
 * Created by PhpStorm.
 * User: Luis Solorzano
 * Date: 08-21-16
 * Time: 10:11 AM
 */

namespace Davis\http\thunder\route\route;
/**
 * Class Route
 * @package Davis\core\http\thunder\route\route
 */

class Route {
	private $path;
	private $callable;
	private $matches = [];
	private $params = [];

	public function __construct($path, $callable) {
		$this->path = trim($path, '/');
		$this->callable = $callable;
	}

	public function match($url) {
		$url = trim($url, '/');
		$path = preg_replace_callback('#{([\w]+)}#', [$this,'paramMatch'], $this->path);
		$regex = "#^$path$#i";

		if (!preg_match($regex, $url, $matches)) {
			return FALSE;
		}
		array_shift($matches);
		$this->matches = $matches;
		return TRUE;
	}

	public function with($param, $regex) {
		$this->params[$param] = str_replace('(','(?:',$regex);
		return $this;
	}

	public function paramMatch($match) {
		if (isset($this->params[$match[1]])) {
			return '('.$this->params[$match[1]].')';
		}
		return '([^/]+)';
	}

	public function call() {
		if(is_string($this->callable)) {
			$params = explode('@', $this->callable);
			$controller = "Develop\\controller\\" . $params[0];
			$controller = new $controller();
			return call_user_func_array([$controller, $params[1]], $this->matches);
		} else {
			return call_user_func_array($this->callable, $this->matches);
		}
	}

	public function getURL($params) {
		$path = $this->path;
		foreach ($params as $k => $v) {
			$path = str_replace(":$k", $v, $path);
		}
		return $path;
	}
}