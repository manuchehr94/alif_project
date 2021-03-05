<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class FixtureOrders
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'user_id' =>'1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@mail.ru',
            'status' => '1',
            'created' => '2021-02-22 12:32:02',
            'updated' => '2021-02-22 12:32:02'
        ],
        [
            'id' => '2',
            'user_id' =>'1',
            'total' => '0',
            'payment_id' => '1',
            'delivery_id' => '1',
            'comment' => '1',
            'name' => '1',
            'phone' => '1',
            'email' => '1@mail.ru',
            'status' => '1',
            'created' => '2021-02-22 12:32:02',
            'updated' => '2021-02-22 12:32:02'
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
                "INSERT INTO orders VALUES (
                                                '" . $shop['id'] . "', 
                                                '" . $shop['user_id'] . "',
                                                '" . $shop['total'] . "',
                                                '" . $shop['payment_id'] . "',
                                                '" . $shop['delivery_id'] . "',
                                                '" . $shop['comment'] . "',
                                                '" . $shop['name'] . "',
                                                '" . $shop['phone'] . "',
                                                '" . $shop['email'] . "',
                                                '" . $shop['status'] . "',
                                                '" . $shop['created'] . "',
                                                '" . $shop['updated'] . "'
                                                )
             ");
        }
    }
}