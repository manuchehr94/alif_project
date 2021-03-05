<?php


class ExceptionService
{
    public static function error(Exception $e, $side)
    {
        http_response_code($e->getCode());

        error_log($e->getMessage() . ", file = ProductController.php");
        $code = $e->getCode();
        $message = $e->getMessage();

        include_once __DIR__ . "/../../../$side/Views/Exception/400.php";
    }


}