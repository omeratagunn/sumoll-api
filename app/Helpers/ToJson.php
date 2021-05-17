<?php


namespace sumollapi\Helpers;


trait ToJson
{
    public static function convertToJson( $value){
        return json_encode($value, true);
    }

    public static function decodeFromJson(string $value){
        return json_decode($value,true);
    }

}
