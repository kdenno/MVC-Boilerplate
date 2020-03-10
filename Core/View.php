<?php
namespace Core;

class View {  
  /**
   * Render a view file
   * $param string $view the view file
   * @return void
   */
  public static function render($view) {
    $file = "../App/Views/$view"; // relative to core directory
    if(is_readable($file)) {
      require $file;

    }else {
      echo '$file file not found';
    }
    
  }
}
?>