<?php
/**
 * Created by PhpStorm.
 * User: david
 * Date: 2/11/17
 * Time: 4:34 PM
 */
use \Davis\core\baseurl\BaseUrl;
use \Davis\core\directory\Directory;

/**
 * Twig Configurations
 */

$loader = new \Twig_Loader_Filesystem(Directory::Dir().'develop/views/');
$twig = new \Twig_Environment($loader);

/**
 * Twig Functions
 */

$style = new \Twig_Function('style_davis', function ($text) {
	$found = strpos($text, '.css');
	if ($found)	{
		return BaseUrl::url().'web/'.$text;
	}
});

$script = new \Twig_Function('script_davis', function ($text) {
	$found = strpos($text, '.js');
	if ($found)	{
		return BaseUrl::url().'web/'.$text;
	}
});

$images = new \Twig_Function('images_davis', function ($text) {
	return BaseUrl::url().'web/'.$text;
});

$video = new \Twig_Function('video_davis', function ($text) {
	return Security::urlBaseHttp().'web/'.$text;
});

$route = new \Twig_Function('route', function ($route) {
	if (strlen($route) > 1) {
		return BaseUrl::url().trim($route,'/');
	} else {
		return substr(BaseUrl::url(), 0, -1);
	}
});


/**
 * Twig Add Functions
 */

$twig->addFunction($style);
$twig->addFunction($script);
$twig->addFunction($images);
$twig->addFunction($video);
$twig->addFunction($route);
