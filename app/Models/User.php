<?php


namespace sumollapi\Models;

use sumollapi\Repository\UserRepository;

class User extends UserRepository
{

    protected int $id;
    protected array $userDetails;

    public function get(int $id){
        return $this->userDetails = (new UserRepository())->read($id);
    }

    public function update(int $id, array $data){

    }
}
