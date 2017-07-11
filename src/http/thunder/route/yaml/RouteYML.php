<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2/4/17
 * Time: 5:03 PM
 */

namespace Davis\core\http\thunder\route\yaml;
use Davis\core\http\thunder\route\router\Routing;
use Symfony\Component\Yaml\Yaml;
use Symfony\Component\Yaml\Exception\ParseException;


class RouteYML {

	public static function RouteYML() {
		$route = '';
		$controller = '';

		try {
			$value = Yaml::parse(file_get_contents('workspace/routes/routes.yml'));
			//$value = Yaml::parse(file_get_contents('config.yml'));
		} catch (ParseException $e) {
			printf("Unable to parse the YAML string: %s", $e->getMessage());
		}

		var_dump($value);

		$route_yml = new Routing();
		$route_yml->get($route, $controller);

	}


}