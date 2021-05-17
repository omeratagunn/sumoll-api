<?php


namespace sumollapi\Helpers;


trait IsThis
{
    public static function userName(string $username){
        return preg_match('/^[a-z\d\s_]{3,30}$/i', $username) ? true : false;
    }

}
