<?php
namespace App\Controllers\Admin;

class Users extends \Core\Controller {

  protected function before() {
    // make sure an admin user is logged in or return false
  }
  public function indexAction() {
    echo 'Admin index action';
  }
}

?>