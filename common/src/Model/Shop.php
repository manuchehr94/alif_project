<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Shop extends AbstractModel
{
    public $id;
    public $title;
    public $address;

    public function __construct($id = null, $title = null, $address = null)
    {
       parent::__construct();

        $this->id = $id;
        $this->title = $title;
        $this->address = $address;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "UPDATE shops SET title='" . $this->title . "', 
                                          address='" . $this->address . "'
                                          where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO shops VALUES (
                                            null,
                                            '" . $this->title . "',
                                            '" . $this->address . "'
            )";
        }

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM shops ORDER BY id DESC");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);

    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM shops WHERE id = $id LIMIT 1");
        $oneShop = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneShop);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "DELETE FROM shops WHERE id = $id LIMIT 1");
    }


}