<?php


namespace sumollapi\Bootstrap;


class Configuration
{
    private array $sessionConfig = [
        'session.gc_maxlifetime' => '1',
        'session.cookie_secure' => '1',
        'session.cookie_httponly' => '1',
        'session.use_only_cookies' => '1',
        'session.cookie_lifetime' => 950400,
        'display_errors' => 'on',
        'display_startup_errors' => 'on',
        'log_errors' => 'on'
    ];
    private string $controllerPath = '\\sumollapi\\Controllers\\';
    public array $config;
    public function __construct(){

        $this->setTimeZone('America/Los_Angeles');
        $this->errorReporting(-1);
        $this->sessionConfiguration();
        $this->startSession();
        new ErrorHandler();

    }

    public function getControllerPath(){
        return $this->controllerPath;
    }

    public function setTimeZone(string $timezone_identifier){
        date_default_timezone_set($timezone_identifier);
    }

    private function sessionConfiguration() : void{

        foreach ($this->sessionConfig as $key => $value){
            ini_set($key, $value);
        }
    }

    public function errorReporting(int $level){
        error_reporting($level);
    }

    private function startSession() : void{
        session_start();
    }

}
