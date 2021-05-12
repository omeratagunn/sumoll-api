<?php


namespace sumollapi\Repository;

abstract class Model
{
    protected string $table;
    protected string $cachePrefix;
    protected object $database;
    protected object $noSql;
    public function create(array $data){}
    public function read(int $id){}
    public function update(int $id, array $data){}
    public function delete(int $id){}

}
