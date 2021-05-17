<?php


namespace UnitTests\Helpers;


use PHPUnit\Framework\TestCase;
use sumollapi\Helpers\IsThis;

class TestIsThis extends TestCase
{
    public function test_if_returns_true_given_string(){
        $tmpArr = ['john_1212', 'Michael', 'Doe123', 'Sumollsummoool','joe'];
        foreach ($tmpArr as $value){
            $this->assertTrue(IsThis::userName($value));
        }

    }
    public function test_if_returns_false_given_string(){
        $tmpArr = ['john@','george#', 'fury+', 'frank?','lucky/', '1'];
        foreach ($tmpArr as $value){
            $this->assertFalse(IsThis::userName($value));
        }

    }

}
