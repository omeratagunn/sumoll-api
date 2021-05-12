<?php


namespace sumollapi\Response;


class Response
{

    public function __construct($message,int $code)
    {
        echo json_encode(array(
            'message' => $message
        ));
        http_response_code($code);

    }



}
