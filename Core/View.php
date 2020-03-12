<?php

namespace Core;

class View
{
  /**
   * Render a view file
   * $param string $view the view file
   * @return void
   */
  public static function render($view, $args = [])
  {
    extract($args, EXTR_SKIP); // convert array to variables
    $file = "../App/Views/$view"; // relative to core directory


    if (is_readable($file)) {
      require $file;
    } else {
      echo '$file file not found';
    }
  }
  /**
   * Render a view template using Twig
   * 
   *
   * @param  string $template The template file
   * @param  array $args Associative array of data to display in the views
   * @return void
   */
  public static function renderTemplate($template, $args = [])
  {
    static $twig = null;
    if ($twig === null) {
      $loader = new \Twig_Loader_Filesystem('../App/Views');
      $twig = new \Twig_Environment($loader);
    }
    echo $twig->render($template, $args);
  }
}
