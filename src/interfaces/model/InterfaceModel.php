<?php
/**
 * Created by PhpStorm.
 * User: luis
 * Date: 08-31-16
 * Time: 03:41 PM
 */

namespace Davis\core\interfaces\model;

Interface InterfaceModel {

	public function union($value_one);
	public function join();
	public function save();
	public function update();
	public function delete();
	public function where($value_one, $value_two);
	public function orwhere($value_one, $value_two);
	public function like();
	public function count();
	public function get();
	public function compare($value_one, $value_two, $value_three);
	public function check();

}