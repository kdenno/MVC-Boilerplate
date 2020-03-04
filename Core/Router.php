<?php
class Router
{
  // create a routing table
  protected $routes = [];
  /**
   * Add a route to the routing table
   * 
   * @param string $route The route URL
   * @param array $params Parameters (controllers, actions, etc.)
   * 
   * @return void
   */
  public function add($route, $params)
  {
    $this->routes[$route] = $params;
  }


  /**
   * Get all routes from the routing table
   *
   * @return array
   */
  public function getRoutes()
  {
    return $this->routes;
  }
}
