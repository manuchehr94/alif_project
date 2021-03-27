<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class SiteController
{
    public function index()
    {
        header("Location: /?model=product&action=read");
        die();
    }

    public function login()
    {
        if($_GET['model'] === 'site' && $_GET['action'] === 'login') {
            $correctionOfFooter = "footer";
        }

        include_once __DIR__ . "/../../views/site/login.php";
    }
}