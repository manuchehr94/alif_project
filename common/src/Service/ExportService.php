<?php

include_once __DIR__ . "/DBConnector.php";
include_once __DIR__ . "/../Model/Product.php";

class ExportService
{
    private $conn;

    public function __construct()
    {
        $this->conn = DBConnector::getInstance()->connect();
    }

    private function initExportFile()
    {
        $fileName = 'products_' . date('YmdHis', time()) . '.csv';
        $path = __DIR__ . '/../../../data/';

        return $path . $fileName;
    }

    private function getData()
    {
        $products = (new Product())->all([], 5000);

        $list = [];
        foreach ($products as $product) {
            $list[] = [
                $product['id'],
                $product['title'],
                $product['picture'],
                $product['preview'],
                $product['content'],
                $product['price'],
                $product['status'],
                $product['created'],
                $product['updated']
            ];
        }

        return $list;
    }

    public function export()
    {
        $fullFileName = $this->initExportFile();
        $list = $this->getData();

        $fp = fopen($fullFileName, 'w');
        foreach ($list as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }
}