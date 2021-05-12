<?php


namespace sumollapi\Helpers;


trait StatusCodes
{
    public static int $success = 200;

    public static int $created = 201;

    public static int $accepted = 202;

    public static int $noContent = 204;

    public static int $badRequest = 400;

    public static int $unAuthorized = 401;

    public static int $paymentRequired = 402;

    public static int $forbidden = 403;

    public static int $methodNotAllowed = 405;

    public static int $requestTimeOut = 408;

    public static int $tooManyRequests = 429;

    public static int $internalServerError = 500;

    public static int $notImplemented = 501;

    public static int $badGateWay = 502;

    public static int $serviceUnavailable = 503;

    public static int $notFound = 404;


}
