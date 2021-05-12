<?php


namespace sumollapi\Database\NoSql;

use sumollapi\Config\ConfigInterface;
use sumollapi\Helpers\ToJson;

class Redis implements NoSqlInterface
{
    public \Redis $instance;
    public function __construct(ConfigInterface $config){
        $this->instance = new \Redis();
        $this->instance->connect($config->get('REDIS_SERVER'));
    }
    public function get(string $key){
       return ToJson::decodeFromJson($this->instance->get($key));
    }
    public function set(string $key, $value, $ttl){
        $this->instance->set($key,ToJson::convertToJson($value),$ttl);
    }
    public function increment(string $key){
        $this->instance->incr($key);
    }
    public function incrementByValue(string $key, $value){
        $this->instance->incrBy($key, ToJson::convertToJson($value));
    }
    public function delete(string $key){
        $this->instance->del($key);
    }
    public function ping(string $message){
        return $this->instance->ping($message);
    }
}
