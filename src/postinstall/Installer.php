<?php
/**
 * Created by PhpStorm.
 * User: el_patron
 * Date: 12-12-16
 * Time: 03:13 PM
 */

namespace DavisPostInstall;
/**
 * Class Installer
 * @package DavisPostInstall
 */

class Installer {

	public static function CreateProject() {
		@exec('npm install && bower install && cd web && node_modules/.bin/gulp ');
	}

	public static function PostInstall() {
		@exec('npm install && bower install && cd web && node_modules/.bin/gulp ');
	}

}


