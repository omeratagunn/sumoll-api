<?php


namespace sumollapi\Repository;

use sumollapi\Database\DatabaseInterface;
use sumollapi\Database\NoSql\NoSqlInterface;

abstract class Model
{
    protected DatabaseInterface $database;
    protected NoSqlInterface $redis;
    public function __construct(DatabaseInterface $database, NoSqlInterface $redis){
        $this->database = $database;
        $this->redis = $redis;
    }

    protected string $table;
    protected string $cachePrefix;
    protected object $noSql;
    public function create(array $data){}
    public function read(int $id){}
    public function update(int $id, array $data){}
    public function delete(int $id){}

}
