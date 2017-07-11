<?php
/**
 * Created by PhpStorm.
 * User: Luis Solorzano
 * Date: 08-21-16
 * Time: 09:03 AM
 */

namespace Davis\http\thunder\route\exception;
/**
 * Class RouterException
 * @package Davis\core\http\thunder\route\exception
 */


class RouterException extends \Exception{
	/*public function __construct($message, $code, \Exception $previous) {
		parent::__construct($message, $code, $previous);
	}*/

	public static function Input($input) {
			if (empty($input)) {
			echo 'Los campos estan vacios';
			}
	}

	public static function Route() {
			echo 'No matching routes in DavisFramework';
	}

  public static function Session($session) {
    if (empty($session)) {
      echo 'La variable session no contiene valor';
    }

  }

}