<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 7/11/17
 * Time: 4:48 PM
 */
namespace Davis\loader;

use Davis\directory\Directory;

/**
 * Class Loader
 * @package Davis\loader
 */

class Loader {
	public function __construct() {
	}

	public static function Load() {
		return require Directory::Home('vendor/davidsolorzano20/core/src/loader/loader.php');
	}

	public static function Routing() {
		return require Directory::Home('routes/web.php');
	}

}