<?php


namespace UnitTests\Helpers;


use sumollapi\Config\Config;
use sumollapi\Database\Database;
use sumollapi\Database\NoSql\Redis;
use sumollapi\Models\User;
use sumollapi\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class TestUser extends TestCase
{
    public function test_user_can_return_array(){
        $config = new Config();
        $user = new UserRepository(new Database($config), new Redis($config));
        $this->assertIsArray($user->read(1));
    }


}
