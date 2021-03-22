<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class OrderItem extends AbstractModel
{
    public $orderId;
    public $productId;
    public $quantity;

    public function __construct(
        $orderId = null,
        $productId = null,
        $quantity = null
    )
    {
        parent::__construct();
        $this->orderId = $orderId;
        $this->productId = $productId;
        $this->quantity = $quantity;
    }

    public function setConn($conn)
    {
        $this->conn = $conn;

        return $this;
    }

    public function save()
    {
        $query = "INSERT INTO order_item (id, order_id, product_id, quantity) VALUES ( 
                                                                null, 
                                                                '" . $this->orderId . "', 
                                                                '" . $this->productId . "', 
                                                                '" . $this->quantity . "'   
                                                                )";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function update()
    {

        if(empty($this->orderId) || empty($this->productId) || empty($this->quantity)) {
            throw new Exception('Empty order item field');
        }

        $query = "UPDATE order_item set quantity = " . $this->quantity . " 
                            WHERE basket_id = " . $this->orderId . " 
                            AND product_id = " . $this->productId . " 
                            LIMIT 1";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getByOrderId($orderId)
    {
        $result = mysqli_query($this->conn, "Select * from order_item where order_id = $orderId");
        $all = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $all;
    }

    public function deleteProductByOrderId($productId, $orderId)
    {
        return mysqli_query($this->conn, "delete from order_item where product_id = $productId and order_id = $orderId limit 1");
    }

    public function clearByOrderId($orderId)
    {
        return mysqli_query($this->conn, "delete from order_item where order_id = $orderId");
    }

}