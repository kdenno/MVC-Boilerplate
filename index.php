<?php
require 'Core/Router.php';
require 'Controllers/Posts.php';
$router = new Router();
$router->add('', array('controller' => 'Home', 'action' => 'index'));
$router->add('posts', array('controller' => 'Posts', 'action' => 'index'));
//$router->add('posts/new', array('controller' => 'Posts', 'action' => 'new'));
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
