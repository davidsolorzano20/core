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

$loader = new \Twig_Loader_Filesystem(Directory::Dir() . 'develop/views/');
$twig = new \Twig_Environment($loader);

/**
 * Twig Functions
 */

$assets = new \Twig_Function('asset_davis', function ($text) {
  if (strpos($text, '.css')) {
    return BaseUrl::url() . 'web/' . $text;
  }
  else {
    if (strpos($text, '.js')) {
      return BaseUrl::url() . 'web/' . $text;
    }
    else {
      return BaseUrl::url() . 'web/' . $text;
    }
  }
});

$route = new \Twig_Function('route', function ($route) {
  if (strlen($route) > 1) {
    return BaseUrl::url() . trim($route, '/');
  }
  else {
    return substr(BaseUrl::url(), 0, -1);
  }
});


/**
 * Twig Add Functions
 */

$twig->addFunction($assets);
$twig->addFunction($route);
