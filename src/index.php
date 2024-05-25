<?php 

require_once __DIR__ . '/controller/homeContoller.php';
require_once __DIR__ . '/controller/loginController.php';
require_once __DIR__ . '/controller/registerController.php';

require_once __DIR__ . '/database/createDatabase.php';

$routes = [
    '/' => ['controller' => 'home\homeController', 'method' => 'home'],
    '/register' => ['controller'=> 'register\registerController', 'method' => 'register'],
    '/login' => ['controller' => 'login\loginController', 'method' => 'login'],
];

$requestParts = explode('?', $_SERVER['REQUEST_URI'], 2);
$path = $requestParts[0];

if (array_key_exists($path, $routes)) {
  $controllerName = $routes[$path]['controller'];
  $methodName = $routes[$path]['method'];
  $controller = new $controllerName();
  $params = isset($requestParts[1]) ? $requestParts[1] : '';
  $controller->$methodName();
} else {
  http_response_code(404);
  require __DIR__ . '/views/templates/404/404.html';
}