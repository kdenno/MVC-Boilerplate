<?php
class Router
{
  // create a routing table
  protected $routes = [];
  protected $params = [];
  /**
   * Add a route to the routing table
   * 
   * @param string $route The route URL
   * @param array $params Parameters (controllers, actions, etc.)
   * 
   * @return void
   */
  public function add($route, $params = [])
  {
    // convert the route to regular expressions, escape the forward slashes
    $route = preg_replace('/\//', '\\/', $route);
    // convert variables e.g {controllers}
    $route = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $route);
    // convert variables with custom regular expressions e.g {id:\d+}
    $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $route);
    // add start and end delimiters and case isensitive flag
    $route = '/^' . $route . '$/i';

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

  /**
   * match the route to the routes in the routing table, setting the $params property if the route is found
   *
   * @param  string $url the route URL
   *
   * @return boolean true if the match is found
   */
  public function match($url)
  {
    /*
    foreach ($this->routes as $route => $params) {
      if ($url == $route) {
        $this->params = $params;
        return true;
      }
    }
    */
    // $reg_exp = '/^(?P<controller>[a-z-]+)\/(?<action>[a-z-]+)$/';
    foreach ($this->routes as $route => $params) {
      if (preg_match($route, $url, $matches)) {
        foreach ($matches as $key => $value) {
          if (is_string($key)) {
            $params[$key] = $value;
          }
        }
      }

      $this->params = $params;
      return true;
    }
    return false;
  }


  public function getParams()
  {
    return $this->params;
  }

  public function dispatch($url)
  {
    if ($this->match($url)) {
      $controller = $this->params['controller'];
      $controller = $this->convertToStudlyCaps($controller);

      if (class_exists($controller)) {
        $controller_object = new $controller;
        $action = $this->params['action'];
        $action = $this->convertToCamelCase($action);

        if (is_callable($controller_object, $action)) {
          $controller_object->$action();
        } else {
          echo "Method $action (in controller $controller) not found ";
        }
      } else {
        echo "Controller classs $controller not found";
      }
    } else {
      echo 'No route matched';
    }
  }

  /**
   * convert a string with hyphens to studlycaps
   * e.g post-authors=> PostAuthors
   * 
   * @param  $string the string to convert
   * @return string
   */
  protected function convertToStudlyCaps($string)
  {
    return str_replace(' ', '', ucwords(str_replace('-', '', $string)));
  }

  /**
   * convert a string with hyphens to camelcase
   * e.g add-new=> addNew
   * 
   * @param  $string the string to convert
   * @return string
   */
  protected function convertToCamelCase($string)
  {
    return lcfirst($this->convertToStudlyCaps($string));
  }
}
