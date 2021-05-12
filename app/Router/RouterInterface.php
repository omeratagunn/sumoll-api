<?php
namespace sumollapi\Router;

use Illuminate\Http\Request;
use sumollapi\Controllers\ControllerInterface;
interface RouterInterface
{

     public function get(ControllerInterface $controller,  string $method, int $id = null);

     public function post(ControllerInterface $controller, string $method, Request $request);

     public function parseRoutes(array $routes);

}
