<?php


namespace sumollapi\Bootstrap;

use sumollapi\Helpers\FirstLetterCapital;

class Http
{
    private array $url;


    public function __construct(){

        $s = &$_SERVER;
        $ssl = (!empty($s['HTTPS']) && $s['HTTPS'] == 'on') ? true:false;
        $sp = strtolower($s['SERVER_PROTOCOL']);
        $protocol = substr($sp, 0, strpos($sp, '/')) . (($ssl) ? 's' : '');
        $port = $s['SERVER_PORT'];
        $port = ((!$ssl && $port=='80') || ($ssl && $port=='443')) ? '' : ':'.$port;
        $host = isset($s['HTTP_X_FORWARDED_HOST']) ? $s['HTTP_X_FORWARDED_HOST'] : (isset($s['HTTP_HOST']) ? $s['HTTP_HOST'] : null);
        $host = isset($host) ? $host : $s['SERVER_NAME'] . $port;
        $uri = $protocol . '://' . $host . $s['REQUEST_URI'];
        $segments = explode('?', $uri, 2);
        $url = $segments[0];
        $this->url =  explode("/", $url);

    }

    public function getRequestedUrl() : string {
        return FirstLetterCapital::make($this->url[3]);
    }

    public function getRequestedUrlWithId(){

        return isset($this->url[4]) ? $this->url[4] : null;

    }

}
