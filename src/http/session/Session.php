<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 09-07-16
 * Time: 01:55 PM
 */

namespace Davis\http\session;

use Davis\http\thunder\route\RouterException;
use Davis\interfaces\session\InterfaceSession;

/**
 * Class Session
 * @package Davis\core\http\session
 */

class Session {
	//private $val;

	public function __construct() {
		//self::start();
	}

	public static function get($val) {
		if (empty($_SESSION[trim($val)])) {
			//RouterException::Session($_SESSION[trim($val)]);
		} else {
			return $_SESSION[$val];
		}
	}

	public static function set($val,$val2) {
		if (!(empty($val) && empty($val2))) {
			return $_SESSION[$val] = $val2;
		} else {
			/*\Davis\core\http\thunder\route\exception\RouterException::Session($val);*/
		}
	}

	public static function start() {
		return session_start();
	}

	public static function destroy() {
		return session_destroy();
	}
}