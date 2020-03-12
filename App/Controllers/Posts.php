<?php
namespace App\Controllers;
use \Core\View;

/**
 * display posts
 * 
 * @return void
 */
class Posts extends \Core\Controller
{
  public function indexAction()
  {
    View::renderTemplate('Posts/index.html');
  }

  /**
   * show add new page
   *
   * @return void
   */
  public function addNewAction()
  {
    echo 'Hello from the add new action in the posts controller';
  }
}
