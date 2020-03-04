<?php
require 'Core/Router.php';
$router = new Router();
$router->add('', array('controller' => 'Home', 'action' => 'index'));
$router->add('posts', array('controller' => 'Posts', 'action' => 'index'));
$router->add('posts/new', array('controller' => 'Posts', 'action' => 'new'));
