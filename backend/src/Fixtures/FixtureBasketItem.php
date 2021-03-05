<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureBasketItem
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'basket_id' => '1',
            'product_id' => '1',
            'quantity' => '4'
        ],
        [
            'id' => '2',
            'basket_id' => '1',
            'product_id' => '3',
            'quantity' => '3'
        ],
        [
            'id' => '3',
            'basket_id' => '1',
            'product_id' => '3',
            'quantity' => '1'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $shop) {

            $result = mysqli_query($this->conn,
                "INSERT INTO basket_item VALUES (
                                                    '" . $shop['id'] . "', 
                                                    '" . $shop['basket_id'] . "', 
                                                    '" . $shop['product_id'] . "', 
                                                    '" . $shop['quantity'] . "' 
                                                    
            )");
        }

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}