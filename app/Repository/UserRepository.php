<?php


namespace sumollapi\Repository;

use sumollapi\Config\Config;
use sumollapi\Database\Database;
use sumollapi\Database\DatabaseInterface;
use sumollapi\Database\NoSql\NoSqlInterface;
use sumollapi\Database\NoSql\Redis;
use PDO;


class UserRepository extends Model
{
    protected string $table = 'users';
    protected string $cachePrefix = 'user';
    protected object $database;
    protected object $noSql;


    private function getNoSql(NoSqlInterface $nosql, string $key){
        return $nosql->get($key);
    }

    private function getDatabaseInstance(DatabaseInterface $database){
        return $database;
    }

    public function read(int $id)
    {

        $userDetails = $this->getNoSql(new Redis(new Config()),$this->cachePrefix.$id);

        if ($userDetails){
            return $userDetails;
        }

        $database = $this->getDatabaseInstance(new Database(new Config()));
        $database->query('SELECT * FROM `'.$this->table.'` WHERE `id`=:id LIMIT 1');
        $database->bind(':id', (int) $id, PDO::PARAM_INT);
        $userDetails = $database->single();

        return $userDetails;
    }

}
