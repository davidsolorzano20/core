<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08-24-16
 * Time: 07:31 AM
 */

namespace Davis\core\controller;

use Davis\core\directory\Directory;
use Illuminate\Database\Capsule\Manager;

class DavisController {

	public function __construct() {
		include Directory::Dir().'app/config/database.php';
		$connectionBase = new Manager();
		$connectionBase->addConnection([
			'driver' => $database['driver'],
			'host' => $database['host'],
			'database' => $database['database'],
			'username' => $database['username'],
			'password' => $database['password'],
			'charset' => $database['charset'],
			'collation' => $database['collation'],
			'prefix' => $database['prefix']
		]);
		$connectionBase->setAsGlobal();
		$connectionBase->bootEloquent();
	}

}