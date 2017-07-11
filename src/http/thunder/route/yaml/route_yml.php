<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2/4/17
 * Time: 5:43 PM
 */
\Davis\http\session\Session::start();
use \Davis\http\thunder\route\router\Routing;
$router = new Routing();
require 'script.php';
$router->run();