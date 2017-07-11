<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2/11/17
 * Time: 3:23 PM
 */

namespace Davis\http\redirect;


use Davis\baseurl\BaseUrl;

/**
 * Class Response
 * @package Davis\core\http\response
 */

class Redirect {

	public function __construct() {
	}

	public static function go($url) {
		if ($url == '/') {
			return header('Location: '.BaseUrl::url());
		} else {
			return header('Location: '.BaseUrl::url().$url);
		}
	}

}