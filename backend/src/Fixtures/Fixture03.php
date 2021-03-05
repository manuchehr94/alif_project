<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

class Fixture03
{
    private $conn;

    private $data = [
        [
            'id' => 'null',
            'title' =>'1111111',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'22222',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'3333333',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'44444',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'55555',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'666666',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'77777',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'888888',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'99999',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ],
        [
            'id' => 'null',
            'title' =>'1010101010',
            'content' => 'blablabla',
            'created' => '2021-01-24 07:47:04'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $news) {

            mysqli_query($this->conn,
                "INSERT INTO news VALUES (
                                                '" . $news['id'] . "', 
                                                '" . $news['title'] . "',
                                                '" . $news['content'] . "', 
                                                '" . $news['created'] . "'
                                                )
             ");
        }
    }
}