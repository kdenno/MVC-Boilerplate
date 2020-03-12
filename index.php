<?php
require "./vendor/autoload.php";

$router = new Core\Router();
$router->add('', array('controller' => 'Home', 'action' => 'index'));
$router->add('posts', array('controller' => 'Posts', 'action' => 'index'));
//$router->add('posts/new', array('controller' => 'Posts', 'action' => 'new'));
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'admin']); // specify namespace as an option

$router->dispatch($_SERVER['QUERY_STRING']);
