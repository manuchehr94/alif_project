<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrderItem
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'order_id' =>'1',
            'product_id' => '1',
            'quantity' => '3'
        ],
        [
            'id' => '2',
            'order_id' =>'2',
            'product_id' => '1',
            'quantity' => '3'
        ],
        [
            'id' => '3',
            'order_id' => '2',
            'product_id' => '2',
            'quantity' => '0'
        ],
        [
            'id' => '4',
            'order_id' =>'1',
            'product_id' => '3',
            'quantity' => '1'
        ],
        [
            'id' => '5',
            'order_id' =>'1',
            'product_id' => '4',
            'quantity' => '4'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $shop) {

            mysqli_query($this->conn,
                "INSERT INTO order_item VALUES (
                                                '" . $shop['id'] . "', 
                                                '" . $shop['order_id'] . "',
                                                '" . $shop['product_id'] . "',
                                                '" . $shop['quantity'] . "'
                                                )
             ");
        }
    }
}