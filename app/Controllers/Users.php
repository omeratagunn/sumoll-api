<?php


namespace sumollapi\Controllers;
use sumollapi\Config\Config;
use sumollapi\Database\Database;
use sumollapi\Database\NoSql\Redis;
use sumollapi\Helpers\StatusCodes;
use sumollapi\Models\User;
use sumollapi\Response\Response;


class Users implements ControllerInterface
{

    public function getUserDetails(int $id = null){
        $config = new Config();
        $repo = new User(new Database($config), new Redis($config));
        $userDetails = $repo->read($id);
            if ($userDetails)
            return new Response($userDetails, StatusCodes::$success);

        return new Response('Not found', StatusCodes::$notFound);

    }

}
