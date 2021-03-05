<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture02
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' =>'1111111',
            'group_id' => '1',
            'parent_id' => '2'
        ],
        [
            'id' => 'null',
            'title' =>'22222',
            'group_id' => '3',
            'parent_id' => '4'
        ],
        [
            'id' => 'null',
            'title' =>'3333333',
            'group_id' => '5',
            'parent_id' => '6'
        ],
        [
            'id' => 'null',
            'title' =>'44444',
            'group_id' => '7',
            'parent_id' => '8'
        ],
        [
            'id' => 'null',
            'title' =>'55555',
            'group_id' => '9',
            'parent_id' => '10'
        ],
        [
            'id' => 'null',
            'title' =>'666666',
            'group_id' => '11',
            'parent_id' => '12'
        ],
        [
            'id' => 'null',
            'title' =>'77777',
            'group_id' => '13',
            'parent_id' => '14'
        ],
        [
            'id' => 'null',
            'title' =>'888888',
            'group_id' => '15',
            'parent_id' => '16'
        ],
        [
            'id' => 'null',
            'title' =>'99999',
            'group_id' => '17',
            'parent_id' => '18'
        ],
        [
            'id' => 'null',
            'title' =>'1010101010',
            'group_id' => '19',
            'parent_id' => '20'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $category) {

            mysqli_query($this->conn,
                "INSERT INTO categories VALUES (
                                                '" . $category['id'] . "', 
                                                '" . $category['title'] . "',
                                                '" . $category['group_id'] . "', 
                                                '" . $category['parent_id'] . "'
                                                )
             ");
        }
    }
}