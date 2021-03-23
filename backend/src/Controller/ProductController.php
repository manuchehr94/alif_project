<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";
include_once __DIR__ . "/../../../common/src/Service/FileUploader.php";
include_once __DIR__ . "/../../../common/src/Service/ValidationService.php";
include_once __DIR__ . "/../../../common/src/Service/MessageService.php";
include_once __DIR__ . "/../../../common/src/Service/ProductValidator.php";

class ProductController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/product/form.php";
    }

    public function read()
    {
        $allProducts = (new Product())->all();
        include_once __DIR__ . "/../../views/product/list.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $filename = FileUploader::upload('products');
            $now = date("Y-m-d H:i:s", time());

            $_POST['picture'] = $filename;

            if(!ProductValidator::validate()) {
                return (!empty($_POST['id'])) ? $this->update($_POST['id']) : $this->create();
            }

            $product = new Product(
                                intval($_POST['id']),
                                htmlspecialchars($_POST['title']),
                                htmlspecialchars($filename ?? ''),
                                htmlspecialchars($_POST['preview']),
                                htmlspecialchars($_POST['content']),
                                $_POST['price'],
                                $_POST['status'],
                                $now,
                                $now
            );

            $product->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Product())->deleteById($id);
        return $this->read();
    }

    public function update($id = null)
    {
        $id = (!empty($id)) ? $id : (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneProduct = (new Product())->getById($id);

        if(empty($oneProduct)) die("Product is not found");

        include_once __DIR__ . "/../../views/product/form.php";
    }
}