<?php

include_once __DIR__ . '/../../../common/src/Service/DBConnector.php';
include_once __DIR__ . '/../../../common/src/Service/UserService.php';

class MigrationAddCategoryGroup
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();

    }

    public function commit()
    {
        $result = mysqli_query($this->conn,
                            "CREATE TABLE `category_group` (
                                        `id` int not null auto_increment,
                                        `title` varchar(64) not null,
                                        primary key (id)
                                    ) engine = InnoDB default char set utf8");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn,
            "INSERT INTO `category_group` (`title`) VALUES ('Men'), ('Women'), ('Children'), ('Hot Deals')");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn,
            "INSERT INTO `categories` (`title`, `group_id`, `parent_id`) 
                VALUES ('Рубашки', '1', '0'), ('Брюки', '1', '0'),  ( 'Джинсы', '1', '0'),  ('Обувь', '1', '0'),
                ('Пальто', '2', '0'), ('Юбки', '2', '0'),  ('Туфли', '2', '0'),  ('Лосины', '2', '0'),
                ('Платья', '3', '0'), ('Шапочки', '3', '0'),  ('Штанишки', '3', '0'),  ('Туфельки', '3', '0'),
                ('Half Jacket', '4', '0'), ('Skiny Trousers', '4', '0'),  ( 'Boot Leather', '4', '0')
                                                                                       
        ");


        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn,
            "Create table category_product (
                    product_id int not null,
                    category_id int not null
                ) engine = InnoDB");


        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `category_group`");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "TRUNCATE TABLE `categories`");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

        $result = mysqli_query($this->conn, "DROP TABLE `category_product`");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}