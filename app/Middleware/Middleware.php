<?php


namespace sumollapi\Middleware;


use sumollapi\Bootstrap\Http;
use sumollapi\Config\ConfigInterface;
use sumollapi\Config\Constant\Constants;
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

    private object $router;
    private object $http;
    private object $config;

    private string $controllerPointer;


    public function __construct(RouterInterface $router, Http $http, ConfigInterface $config){
        $this->router = $router;
        $this->http = $http;
        $this->config = $config;
        $routes = $router->parseRoutes(include_once(Constants::APP_PATH.'Router/Router.php'));
        $this->publicRoutes = $routes['PublicRoutes'];
        $this->authenticatedRoutes = $routes['AuthenticatedRoutes'];
        $this->controllerPointer = $this->config->get('ControllerNameSpace').$this->http->getRequestedUrl();
    }

    public function forwardRequest()
    {

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
            if (!$session->logged()){
                return new Response('Unauthorized',StatusCodes::$unAuthorized);
            }

        return $this->requestBuilder($method);

    }

    private function requestBuilder(string $method){

        if(!empty($_POST))
            return  $this->router->post(new $this->controllerPointer(), $method, Request::capture());


        if($this->http->getRequestedUrlWithId())
            return $this->router->get(new $this->controllerPointer(), $method,$this->http->getRequestedUrlWithId());

        return $this->router->get(new $this->controllerPointer(), $method);
    }

}
