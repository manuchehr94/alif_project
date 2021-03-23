<?php

include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/ExceptionService.php";

class ProductController
{
    public function all()
    {
        $categories = (isset($_GET['category_id']) && !empty($_GET['category_id']))?
                        explode(',', $_GET['category_id']) : [];

        $limit = intval($_GET['limit'] ?? Product::NUMBER_PRODUCTS_PER_PAGE);
        $additionalLimit = intval(Product::NUMBER_PRODUCTS_PER_PAGE);

        $offset = 0;
        $offset = $offset < 0 ? 0 : $offset;

        $moreContent = $limit + $additionalLimit;

        $allProducts = (new Product())->all($categories, $limit, $offset);
        $totalProducts = (new Product())->totalProducts();
        $leftProducts = (new Product())->getLeftProducts($categories);

        include_once __DIR__ . "/../../views/product/List.php";
    }

    public function view()
    {
        try {
            $allProducts = (new Product())->all();

            if(!isset($_GET['id'])) {
                throw new Exception('Id doesn\'t exist', 400);
            }

            $id = (int)$_GET['id'];

            if(empty($id)) {
                throw new Exception('Id isn\'t defined', 400);
            }

            $oneProduct = (new Product())->getById($id);

            if(empty($oneProduct)) {
                throw new Exception('Product doesn\'t exist', 404);
            }

            include_once __DIR__ . "/../../views/product/view.php";

        } catch (Exception $e) {
            ExceptionService::error($e,'frontend');
        }

    }
}