<?php
use PHPUnit\Framework\TestCase;
use sumollapi\Router\RouterInterface;
use sumollapi\Router\RouteProvider;
use sumollapi\Controllers\Index;
use Illuminate\Contracts\Routing\ResponseFactory;
final class TestRouter extends TestCase
{
    private function viaRouter(RouterInterface $router){
        return $router;
    }
    public function test_interface_returns_expected_class(){

            $this->assertInstanceOf(RouteProvider::class, $this->viaRouter(new RouteProvider()));
    }

    public function test_router_returns_expected_class(){
        $router = new RouteProvider();
        $this->assertInstanceOf(\sumollapi\Response\Response::class,$router->get(new Index(), 'index'));

    }

    public function test_router_fails_to_return(){
        // assume class does not exist //
        $router = new RouteProvider();
        $this->expectExceptionCode(0);
        $router->get(new AmazingClass(), 'read');

    }

}
