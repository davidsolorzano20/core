<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08-22-16
 * Time: 02:32 PM
 */

namespace Davis\collection\input;

use Davis\http\thunder\route\RouterException;

/**
 * Class Form
 * @package Davis\collection\input
 */

class Form {
	private $name;

	public function __construct($name) {
		$this->name = $name;
	}

	public static function input($name) {
		if (empty($_POST[trim($name)])) {
			RouterException::Input($_POST[trim($name)]);
		} else {
			return $_POST[trim($name)];
		}
	}

	private function validate() {

	}


}