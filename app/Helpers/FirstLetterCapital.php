<?php


namespace sumollapi\Helpers;


trait FirstLetterCapital
{
    public static function make(string $string){
        return ucfirst($string);
    }
}
