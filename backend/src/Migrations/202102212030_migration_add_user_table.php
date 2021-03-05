<?php

include_once __DIR__ . '/../../../common/src/Service/DBConnector.php';
include_once __DIR__ . '/../../../common/src/Service/UserService.php';

class MigrationAddUserTable
{
    private $conn;

    public function __construct(DBConnector $connector)
    {
        $this->conn = $connector->connect();

    }

    public function commit()
    {
        $result = mysqli_query($this->conn,
                            "CREATE TABLE `user` (
                                        `id` int not null auto_increment,
                                        `name` varchar(256) not null,
                                        `phone` varchar(256) not null UNIQUE,
                                        `email` varchar(256) not null UNIQUE,
                                        `password` varchar(128) not null,
                                        `roles` varchar(128) not null,
                                        primary key (id)
                                    ) engine = InnoDB default char set utf8");

        $result = mysqli_query($this->conn,
                        "INSERT INTO `user` (`name`, phone, email, password, roles) 
                                VALUES ('superadmin', '+992929395759', 'manuchehr.muhidinov@gmail.com',
                                        '" .  UserService::encodePassword('superadmin') ."', '[\"ROLE_SUPER_ADMIN\"]')
                                
                               ");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }

    }

    public function rollback()
    {
        $result = mysqli_query($this->conn, "DROP TABLE `user`");

        if(!$result) {
            print mysqli_error($this->conn) . PHP_EOL;
        }
    }
}