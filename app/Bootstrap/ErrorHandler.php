<?php


namespace sumollapi\Bootstrap;


class ErrorHandler
{
    public function __construct(){
        $this->setErrorHandler();
    }

    public function setErrorHandler(){

        return set_error_handler(static function ($errno, $errstr, $errfile, $errline){

            $fh = fopen(APP_PATH.'/storage/logs/error.txt', "a");
            $fs = date('Y-m-d H:i:s', time())." ERROR: [$errno] $errstr Error on line $errline in $errfile\n";
            fwrite($fh, $fs);
            fclose($fh);

            return true;
        });

    }

}
