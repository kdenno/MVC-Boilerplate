<?php

namespace App\Controllers;

use \Core\View; // use the core/view class

class Home extends \Core\Controller
{
  protected function before()
  {
    echo 'before';
    // return false; // prevents the execution of the originally called method we could use this to check if the user had logged in or has the right permissions
  }
  protected function after()
  {
    echo 'after';
  }
  public function indexAction()
  {
    // View::render('Home/index.php', ['name' => 'Deno', 'colors' => ['blue', 'green', 'red']]);
    View::renderTemplate('Home/index.html', ['name' => 'Deno', 'colors' => ['blue', 'green', 'red']]);
  }
}
