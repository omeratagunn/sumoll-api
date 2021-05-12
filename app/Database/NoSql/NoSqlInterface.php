<?php
namespace sumollapi\Database\NoSql;

interface NoSqlInterface
{

    public function get(string $key);
    public function set(string $key, $value, $ttl);
    public function increment(string $key);
    public function incrementByValue(string $key, $value);
    public function delete(string $key);
    public function ping(string $message);

}
