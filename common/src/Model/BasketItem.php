<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class BasketItem extends AbstractModel
{
    public $basketId;
    public $productId;
    public $quantity;

    public function __construct($basketId = null, $productId = null, $quantity = null)
    {
        parent::__construct();
        $this->basketId = $basketId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    /**
     * @param false|mysqli $conn
     */
    public function setConn($testConn)
    {
        $this->conn = $testConn;

        return $this;
    }

    public function save()
    {
        $query = "INSERT INTO basket_item (id, basket_id, product_id, quantity) 
        VALUES ( 
            null, '" . $this->basketId . "', '" . $this->productId . "', '" . $this->quantity . "'
                    
        )";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function update()
    {

        if(empty($this->basketId) || empty($this->productId) || empty($this->quantity)) {
            throw new Exception('Empty basket item field');
        }

        $query = "UPDATE basket_item set quantity = " . $this->quantity . " 
                            WHERE basket_id = " . $this->basketId . " 
                            AND product_id = " . $this->productId . " 
                            LIMIT 1";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getByBasketId($basketId)
    {
        $result = mysqli_query($this->conn, "Select * from basket_item where basket_id = $basketId");
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    public function deleteProductByBasketId($productId, $basketId)
    {
        return mysqli_query($this->conn, "delete from basket_item where product_id = $productId and basket_id = $basketId limit 1");
    }

    public function clearByBasketId($basketId)
    {
        return mysqli_query($this->conn, "delete from basket_item where basket_id = $basketId");
    }

}