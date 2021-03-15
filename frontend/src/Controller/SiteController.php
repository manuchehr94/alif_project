<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Model/HotDeal.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class SiteController
{
    public function index()
    {
        //$currentUser = UserService::getCurrentUser();
        //print_r($currentUser);
        $allProducts = (new Product())->all();
        $allHotDeals = (new HotDeal())->all();
        include_once __DIR__ . "/../../Views/site/index.php";
    }

    public function login()
    {
        include_once __DIR__ . "/../../Views/site/login.php";
    }
}