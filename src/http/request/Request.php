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
	public function __construct() {
	}

	public function input($name) {
		if (empty($_POST[trim($name)])) {
			RouterException::Input($_POST[trim($name)]);
		} else {
			return $_POST[trim($name)];
		}
	}

	public function file() {
		return $this;
	}

	public function getName($name) {
		if (isset($_FILES[$name])) {
			return $_FILES[$name]['name'];
		}
	}

	public function getPathFile($name) {
		if (isset($_FILES[$name])) {
			return $_FILES[$name]['tmp_name'];
		}
	}

}