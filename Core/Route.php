<?php 

namespace Core;

use App\Middlewares\GuestMiddleware;

use function Core\abort;

class Route {

  public $routes = [];

  public function get($uri, $controller, $middleware = null) {

    $this->addRoute('GET', $uri, $controller, $middleware);

    return $this;
  }

  public function addRoute($httpMethod, $uri, $controller, $middleware = null) {

    if (is_string($controller)) {
      $data = [
        'class' => $controller,
        'method' => '__invoke',
        'middleware' => $middleware
      ];
    }


    if (is_array($controller)) {
      $data = [
        'class' => $controller[0],
        'method' => $controller[1],
        'middleware' => $middleware,
      ];
    }

    $this->routes[$httpMethod][$uri] = $data;

    return $this;
  }

  public function post($uri, $controller, $middleware = null) {

    $this->addRoute('POST', $uri, $controller, $middleware);

    return $this;
  }

  public function run() {

    $uri = parse_url($_SERVER['REQUEST_URI'])['path'];
    
    $httpMethod = $_SERVER['REQUEST_METHOD'];

    if (!isset($this->routes[$httpMethod][$uri])) {
      abort((404));
    }

    $routeInfo = $this->routes[$httpMethod][$uri];

    $class = $routeInfo['class'];
    $method = $routeInfo['method'];
    $middleware = $routeInfo['middleware'];

    if ($middleware) {
      $m = new $middleware();
      $m -> handle();
    }

    $c = new $class();
    $c->$method();
  }
}