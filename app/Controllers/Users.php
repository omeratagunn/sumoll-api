<?php


namespace sumollapi\Controllers;
use sumollapi\Helpers\StatusCodes;

use sumollapi\Models\User;
use sumollapi\Response\Response;


class Users implements ControllerInterface
{

    public function getUserDetails(int $id = null){
        $userDetails = new User();
        $repo = $userDetails->read($id);
            if ($repo)
            return new Response($repo, StatusCodes::$success);

        return new Response('Not found', StatusCodes::$notFound);

    }

}
