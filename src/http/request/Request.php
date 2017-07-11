<?php

/**
 * Created by PhpStorm.
 * User: david
 * Date: 7/8/17
 * Time: 4:47 PM
 */
namespace Davis\http\request;

use Davis\http\thunder\route\exception\RouterException;

/**
 * Class Request
 * @package Davis\http\request
 */

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