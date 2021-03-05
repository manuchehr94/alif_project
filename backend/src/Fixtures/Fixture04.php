<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture04
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' =>'1111111',
            'address' => 'alif1',
        ],
        [
            'id' => 'null',
            'title' =>'22222',
            'address' => 'alif2',
        ],
        [
            'id' => 'null',
            'title' =>'3333333',
            'address' => 'alif3'
        ],
        [
            'id' => 'null',
            'title' =>'44444',
            'address' => 'alif4'
        ],
        [
            'id' => 'null',
            'title' =>'55555',
            'address' => 'alif5'
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
                "INSERT INTO shops VALUES (
                                                '" . $shop['id'] . "', 
                                                '" . $shop['title'] . "',
                                                '" . $shop['address'] . "'
                                                )
             ");
        }
    }
}