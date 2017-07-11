<?php $router->get('/', 'IndexController<>Index');
$router->get('user/create', 'IndexController<>UserCreate');
$router->get('user/login', 'IndexController<>Login');
$router->get('user/logout', 'IndexController<>Logout');
$router->post('user/loginpost', 'IndexController<>UserLogin_Post');
$router->get('update', 'IndexController<>Update');
