<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08-24-16
 * Time: 07:31 AM
 */

namespace Davis\core\database;


use Illuminate\Database\Capsule\Manager;

Class BaseDatabase {

	public static function ConnectionBase($config) {
		$drive = new Manager;
		$drive->addConnection($config);
		$drive->setAsGlobal();
		$drive->bootEloquent();
	}


}