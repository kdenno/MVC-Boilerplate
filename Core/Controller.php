<?php

namespace Core;

abstract class Controller
{
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

  public function __call($name, $arguments)
  {
    // all controller methods have the Action suffix so they literally wont exist when they are called and thats when this method will be called to add the suffix
    $method = $name . 'Action';
    if (method_exists($this, $method)) {
      if ($this->before() !== false) {
        call_user_func_array([$this, $method], $arguments);
        $this->after();
      } else {
        echo "Method $method not found in controller " . get_class($this);
      }
    }
  }

  /**
   * before filter, will be run before every action class is called 
   *
   * @return void
   */
  protected function before()
  {
  }
  /**
   * after filter
   * will be run after every action
   *
   * @return void
   */
  protected function after()
  {
  }
}
