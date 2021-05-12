<?php


namespace sumollapi\Helpers;


trait Find
{

    public static function keyInArray(array $array, $keySearch){

            foreach ($array as $key => $item) {
                if ($key == $keySearch)
                    return true;

                if (is_array($item) && self::keyInArray($item, $keySearch))
                    return true;

            }
            return false;
    }

}
