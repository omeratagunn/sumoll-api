<?php
namespace sumollapi\Router;

use Illuminate\Http\Request;
use sumollapi\Controllers\ControllerInterface;
class RouteProvider implements RouterInterface
{

    public function get(ControllerInterface $controller, string $method, int $id = null)
    {
        return $controller->$method($id);
    }

    public function post(ControllerInterface $controller, string $method, Request $request)
    {
       return $controller->$method($request);
    }

    public function parseRoutes(array $routes)
    {
        return $routes;//include_once(Constants::APP_PATH.'Router/Router.php');
    }

}
