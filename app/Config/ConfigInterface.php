<?php


namespace sumollapi\Config;


interface ConfigInterface
{
    public function getAll();
    public function get(string $key);
    public function errorHandler();
    public function errorReporting(int $level);
    public function setTimeZone(string $timezone_identifier);


}
