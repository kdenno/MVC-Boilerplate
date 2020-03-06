<?php
namespace Core;

abstract class Controller {  
  /**
   * parameters from the matched array
   *
   * @var array
   */
  protected $route_params = [];
  
  /**
   * Class constructor
   * 
   *
   * @param  array $route_params parameters from the route
   * @return void
   */
  public function __construct($route_params)
  {
    $this->route_params = $route_params;
  }
}
