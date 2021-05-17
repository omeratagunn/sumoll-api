<?php


namespace sumollapi\Repository;

use sumollapi\Config\Config;
use sumollapi\Database\NoSql\NoSqlInterface;
use sumollapi\Database\NoSql\Redis;
use PDO;


class UserRepository extends Model
{
    protected string $table = 'users';
    protected string $cachePrefix = 'user';
    protected object $noSql;


    private function getNoSql(string $key){
        return $this->redis->get($key);
    }

    public function read(int $id)
    {

        $userDetails = $this->getNoSql($this->cachePrefix.$id);

        if ($userDetails){
            return $userDetails;
        }

        $this->database->query('SELECT * FROM `'.$this->table.'` WHERE `id`=:id LIMIT 1');
        $this->database->bind(':id', (int) $id, PDO::PARAM_INT);
        $userDetails =  $this->database->single();

        return $userDetails;
    }

}
