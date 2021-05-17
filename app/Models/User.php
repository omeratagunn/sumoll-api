<?php


namespace sumollapi\Models;

use sumollapi\Database\DatabaseInterface;
use sumollapi\Database\NoSql\NoSqlInterface;
use sumollapi\Repository\UserRepository;

class User extends UserRepository
{

    protected int $id;
    protected array $userDetails;
    public function __construct(DatabaseInterface $database, NoSqlInterface $redis)
    {
        parent::__construct($database, $redis);
    }

    public function get(int $id){
        return $this->userDetails = $this->read($id);
    }

    public function update(int $id, array $data){

    }
}
