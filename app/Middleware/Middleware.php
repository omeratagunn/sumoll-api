<?php


namespace sumollapi\Middleware;


use sumollapi\Bootstrap\Configuration;
use sumollapi\Bootstrap\Http;
use sumollapi\Helpers\Find;
use sumollapi\Helpers\StatusCodes;
use sumollapi\Response\Response;
use sumollapi\Router\RouterInterface;
use sumollapi\Session\Session;
use sumollapi\Session\SessionInterface;
use Illuminate\Http\Request;


class Middleware implements MiddlewareInterface
{
    private array $publicRoutes;
    private array $authenticatedRoutes;

    private RouterInterface $router;
    private Http $http;
    private Configuration $config;

    private string $controllerPointer;


    public function __construct(RouterInterface $router, Http $http, Configuration $config){
        $this->router = $router;
        $this->http = $http;
        $this->config = $config;
        $routes = $router->parseRoutes(include_once(APP_PATH.'/app/Router/Router.php'));
        $this->publicRoutes = $routes['PublicRoutes'];
        $this->authenticatedRoutes = $routes['AuthenticatedRoutes'];
        $this->controllerPointer = $this->config->getControllerPath().$this->http->getRequestedUrl();
    }

    public function filterRequest(){

        if (Find::keyInArray($this->publicRoutes, $this->http->getRequestedUrl()))
            return $this->publicRequests($this->publicRoutes[$this->http->getRequestedUrl()]);

        if (Find::keyInArray($this->authenticatedRoutes, $this->http->getRequestedUrl()))
            return $this->authenticatedRequests($this->authenticatedRoutes[$this->http->getRequestedUrl()], new Session());

        return new Response('Not found', StatusCodes::$notFound);
    }

    private function publicRequests(string $method){

        return $this->requestBuilder($method);

    }

    private function authenticatedRequests(string $method, SessionInterface $session){

            return $session->logged() ? $this->requestBuilder($method) : new Response('Unauthorized',StatusCodes::$unAuthorized);

    }

    private function requestBuilder(string $method){

        if(!empty($_POST))
            return  $this->router->post(new $this->controllerPointer(), $method, Request::capture());


        if($this->http->getRequestedUrlWithId())
            return $this->router->get(new $this->controllerPointer(), $method,$this->http->getRequestedUrlWithId());


        return $this->router->get(new $this->controllerPointer(), $method);
    }

}
