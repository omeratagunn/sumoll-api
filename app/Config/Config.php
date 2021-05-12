<?php
namespace sumollapi\Config;
use sumollapi\Helpers\ToJson;
use sumollapi\Providers\ConfigProvider;
use phpDocumentor\Reflection\Types\Mixed_;

Class Config implements ConfigInterface
{
    public array $config;

    public function __construct()
    {
        $this->config = [
            'DB_HOST' => '127.0.0.1',
            'DB_USER' => 'root',
            'DB_PASS' => '',
            'DB_NAME' => 'sumoll',

            'REDIS_SERVER' => '127.0.0.1',
            //game specific configuration//
            'GAME_DATE' => date("Y-m-d H:i:s"),
            'GAME_TIME' => date('H:i'),
            'ControllerNameSpace' => '\\sumollapi\\Controllers\\'
        ];
    }

    public function getAll() : array{
        return $this->config;
    }

    public function get(string $key){
        return $this->config[$key];
    }

    public function convertToJson(array $data){
        return ToJson::convertToJson($data);
    }
}
