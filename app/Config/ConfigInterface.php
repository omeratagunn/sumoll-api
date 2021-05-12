<?php


namespace sumollapi\Config;


interface ConfigInterface
{
    public function getAll();
    public function get(string $key);
    public function convertToJson(array $data);

}
