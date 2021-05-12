<?php


namespace sumollapi\Helpers;


trait IsThis
{
    public static function userName(string $username){
        if(preg_match('/^[a-z\d\s_]{4,30}$/i', $username)) {
            return true;
        } else {
            return false;
        }
    }

}
