<?php
/**
 * Created by PhpStorm.
 * User: el_patron
 * Date: 12-12-16
 * Time: 03:39 PM
 */

namespace Davis\core\interfaces\postinstall;


interface PostInstallInterface {
	public static function PostInstall();
	public static function PostUpdate();

}