<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Model/HotDeal.php";
include_once __DIR__ . "/../../../common/src/Service/UserService.php";

class SiteController
{
    const NUMBER_PRODUCTS_FOR_HOME_PAGE = 4;

    public function index()
    {
        $limit = intval($_GET['limit'] ?? self::NUMBER_PRODUCTS_FOR_HOME_PAGE);
        $additionalLimit = self::NUMBER_PRODUCTS_FOR_HOME_PAGE;

        $moreContent = $limit + $additionalLimit;
        $offset = 0;
        $offset = $offset < 0 ? 0 : $offset;

        $allProducts = (new Product())->all([], $limit, $offset);
        $totalProducts = (new Product())->totalProducts();

        $allHotDeals = (new HotDeal())->allWithDescription();
        include_once __DIR__ . "/../../views/site/index.php";
    }

    public function login()
    {
        include_once __DIR__ . "/../../views/site/login.php";
    }
}