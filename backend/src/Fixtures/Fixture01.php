<?php

include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";


class Fixture01
{
    private $conn;

    private $data = [
        [
            'id' => '1',
            'title' =>'klsdnv1111',
            'picture' => '01.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '100',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '2',
            'title' =>'klsdnv2222',
            'picture' => '02.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '3',
            'title' =>'klsdnv3333',
            'picture' => '03.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '32',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '4',
            'title' =>'klsdnv4444',
            'picture' => '04.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '22',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '5',
            'title' =>'klsdnv5555',
            'picture' => '05.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '32',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '6',
            'title' =>'klsdnv6666',
            'picture' => '06.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '320',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '7',
            'title' =>'klsdnv7777',
            'picture' => '07.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '32',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '8',
            'title' =>'klsdnv8888',
            'picture' => '08.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '9',
            'title' =>'klsdnv9999',
            'picture' => '09.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ],
        [
            'id' => '10',
            'title' =>'klsdnv101010',
            'picture' => '10.png',
            'preview' => 'kldmc',
            'content' => 'content',
            'price' => '322',
            'status' => '1',
            'created' => '2021-01-24 07:47:04',
            'updated' => '2021-01-25 12:54:34',
            'category' => '1'
        ]
    ];

    public function __construct(DBConnector $conn)
    {
        $this->conn = $conn->connect();
    }

    public function run()
    {
        foreach ($this->data as $product) {
            $result = mysqli_query($this->conn,
                "INSERT INTO products VALUES (
                                                '" . $product['id'] . "', 
                                                '" . $product['title'] . "',
                                                '" . $product['picture'] . "', 
                                                '" . $product['preview'] . "', 
                                                '" . $product['content'] . "', 
                                                '" . $product['price'] . "', 
                                                '" . $product['status'] . "', 
                                                '" . $product['created'] . "', 
                                                '" . $product['updated'] . "',
                                                '" . $product['category'] . "'
                                                )
             ");
        }

        if(!$result) {
            print 'error query';
        }
    }
}