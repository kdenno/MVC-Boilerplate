<?php
namespace App\Controllers;

/**
 * display posts
 * 
 * @return void
 */
class Posts extends \Core\Controller
{
  public function index()
  {
    echo 'Hello from home page';
  }

  /**
   * show add new page
   *
   * @return void
   */
  public function addNew()
  {
    echo 'Hello from the add new action in the posts controller';
  }
}

?>