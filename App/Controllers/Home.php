<?php
namespace App\Controllers;

class Home extends \Core\Controller {
  protected function before(){
    echo 'before';
    // return false; // prevents the execution of the originally called method we could use this to check if the user had logged in or has the right permissions
  }
  protected function after() {
    echo 'after';
  }
  public function indexAction() {
    echo 'Hello its index from the home controller';
  }
}
