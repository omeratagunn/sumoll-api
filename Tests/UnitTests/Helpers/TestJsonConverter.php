<?php


namespace UnitTests\Helpers;


use sumollapi\Helpers\ToJson;
use PHPUnit\Framework\TestCase;

class TestJsonConverter extends TestCase
{
    public function test_converts_to_json(){
        $configArr = ['test', 'banana', 'potato', 'cucumber'];
        $toJson = ToJson::convertToJson($configArr);
        $this->assertJson($toJson);
    }

}
