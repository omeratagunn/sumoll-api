<?php
namespace sumollapi\Config;
use sumollapi\Config\Constant\Constants;
use sumollapi\Helpers\ToJson;
use sumollapi\Providers\ConfigProvider;
use phpDocumentor\Reflection\Types\Mixed_;

Class Config implements ConfigInterface
{
    public array $config;

    public function __construct()
    {
        $this->errorHandler();
        $this->errorReporting(1);
        $this->setTimeZone('America/Los_Angeles');

        $this->config = [
            'DB_HOST' => '127.0.0.1',
            'DB_USER' => 'root',
            'DB_PASS' => '',
            'DB_NAME' => 'sumoll',
            'REDIS_SERVER' => '127.0.0.1',
            'ControllerNameSpace' => '\\sumollapi\\Controllers\\',
        ];
    }

    public function getAll() : array{
        return $this->config;
    }

    public function get(string $key){
        return $this->config[$key];
    }

    public function errorHandler(){
        set_error_handler(function ($errno, $errstr, $errfile, $errline){
            echo "<b>ERROR:</b> [$errno] $errstr. Error on line $errline in $errfile<br>";

            $fh = fopen(Constants::APP_PATH."/storage/logs/error.txt", "a");
            $fs = date('Y-m-d H:i:s', time())." ERROR: [$errno] $errstr Error on line $errline in $errfile\n";
            fwrite($fh, $fs);
            fclose($fh);

            return true;
        });
    }

    public function errorReporting(int $level){
        error_reporting($level);
    }

    public function setTimeZone(string $timezone_identifier){
        date_default_timezone_set($timezone_identifier);
    }

}
