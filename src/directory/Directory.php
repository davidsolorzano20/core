<?php
/**
 * Created by PhpStorm.
 * User: el_patron
 * Date: 12-12-16
 * Time: 02:57 PM
 */

namespace Davis\directory;

/**
 * Class Directory
 * @package Davis\directory
 */

class Directory {

	public function __construct() {
	}

	public static function Dir() {
		return $_SERVER['DOCUMENT_ROOT'];
	}

	public static function Home() {
		return $_SERVER['DOCUMENT_ROOT'];
	}

}