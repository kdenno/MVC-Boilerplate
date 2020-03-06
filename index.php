<?php
spl_autoload_register(function ($class) {
  $root = dirname(__DIR__); // get parent directory
  // convert namespaced class name into a directory
  $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_readable($file)) {
    require $root . '/' . str_replace('\\', '/', $class) . '.php';
  }
});

$router = new Core\Router();
$router->add('', array('controller' => 'Home', 'action' => 'index'));
$router->add('posts', array('controller' => 'Posts', 'action' => 'index'));
//$router->add('posts/new', array('controller' => 'Posts', 'action' => 'new'));
$router->add('{controller}/{action}');
$router->add('admin/{action}/{controller}');
$router->add('{controller}/{id:\d+}/{action}');

$router->dispatch($_SERVER['QUERY_STRING']);
