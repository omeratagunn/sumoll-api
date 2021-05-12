<?php


namespace UnitTests\Helpers;


use sumollapi\Models\User;
use sumollapi\Repository\UserRepository;
use PHPUnit\Framework\TestCase;

class TestUser extends TestCase
{
    public function test_user_can_return_array(){
        $user = new UserRepository();
        $this->assertIsArray($user->read(1));
    }


}
