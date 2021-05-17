<?php


namespace sumollapi\Session;
use sumollapi\Helpers\IsThis;

class Session implements SessionInterface
{

    public function logged()
    {

            if (!$this->httpAgent())
                return false;


            if(isset($_SESSION['user_id']) && isset($_SESSION['user_name']) && isset($_SESSION['user_key']) && isset($_COOKIE['user_id']) && isset($_COOKIE['user_key'])){

                $session_id = addslashes(floor($_SESSION['user_id']*1));
                $session_name = addslashes($_SESSION['user_name']);
                $session_key = addslashes($_SESSION['user_key']);

                if(!empty($session_key) && is_numeric($session_id) && IsThis::userName($session_name) && $_COOKIE['user_key']==sha1($session_key)){
                    session_regenerate_id();
                    $_SESSION['user_id'] = $session_id;
                    $_SESSION['user_name'] = $session_name;
                    $_SESSION['user_key'] = $session_key;
                    $_SESSION['HTTP_USER_AGENT'] = md5($_SERVER['HTTP_USER_AGENT']);

                    return true;
                }
                    return false;
            }
            return false;

    }

    private function httpAgent(){
        if(isset($_SESSION['HTTP_USER_AGENT'])){
            if($_SESSION['HTTP_USER_AGENT']!=md5($_SERVER['HTTP_USER_AGENT'])){
                return false;
            }
            return true;
        }

    }


}
