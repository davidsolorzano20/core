<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 7/8/17
 * Time: 4:47 PM
 */
namespace Davis\core\http\request;

use Davis\core\http\thunder\route\exception\RouterException;


class Request {

	public function input($name) {
		if (empty($_POST[trim($name)])) {
			RouterException::Input($_POST[trim($name)]);
		} else {
			return $_POST[trim($name)];
		}
	}

	public function file($name) {
		if (empty($_POST[trim($name)])) {
			RouterException::Input($_POST[trim($name)]);
		} else {
			return $_POST[trim($name)];
		}
	}

}