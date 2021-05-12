<?php


namespace UnitTests;


use sumollapi\Config\Config;
use sumollapi\Config\ConfigInterface;
use sumollapi\Database\Database;
use sumollapi\Database\NoSql\Redis;
use PHPUnit\Framework\TestCase;

class TestConfiguration extends TestCase
{
    private function viaInterface(ConfigInterface $config){
        return $config->getAll();
    }
    public function test_if_config_exist(){

       $this->assertIsArray($this->viaInterface(new Config()));

    }

    public function test_if_database_credentials_set(){
        $configArr = $this->viaInterface(new Config());
        foreach (['DB_HOST', 'DB_USER', 'DB_PASS', 'DB_NAME'] as $values){
            $this->assertArrayHasKey($values,$configArr );
        }

    }

    public function test_if_redis_connection_ok(){
        $redis = new Redis(new Config());
        $this->assertEquals('hello', $redis->ping('hello'));
    }

    public function test_if_database_connection_ok(){
        $db = new Database(new Config());
        $db->query('SELECT 1');
        $db->execute();
        $this->assertEquals('1', $db->single()[1]);
    }


}
