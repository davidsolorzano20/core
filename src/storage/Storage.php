<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 7/14/17
 * Time: 11:15 AM
 */

namespace Davis\storage;
use Davis\directory\Directory;
use mikehaertl\shellcommand\Command;

/**
 * Class Storage
 * @package Davis\Storage
 */
class Storage {
	public static $storage;

	public function __construct() {
	}

	public static function drive($drive) {
		self::$storage = $drive;
		return new static;
	}

	public function upload($name, $path) {
		include Directory::Home('app/config/storage.php');
		$root = $storage['drive'][self::$storage]['root'].'/'.$storage['drive'][self::$storage]['folder'];
		if(!file_exists($root)){
			$command = new Command('cd '.$storage['drive'][self::$storage]['root'].' && mkdir '.$storage['drive'][self::$storage]['folder']);
			if ($command->execute()) {
				echo $command->getOutput();
			} else {
				echo $command->getError();
				$command->getExitCode();
			}
			@move_uploaded_file($path, $root.'/'.$name);
			return 'Success';
		} else {
			@move_uploaded_file($path, $root.'/'.$name);
			return 'Success';
		}
	}


}

