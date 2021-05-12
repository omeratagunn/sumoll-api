<?php
namespace sumollapi\Controllers;
use sumollapi\Helpers\StatusCodes;
use sumollapi\Response\Response;


class Index implements ControllerInterface
{

    public function index(int $id = null){
        return new Response('Hello world', StatusCodes::$success);
    }

}
