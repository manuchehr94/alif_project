<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Basket extends AbstractModel
{
    public $id;
    public $userId;
    public $items  = [];

    public function __construct($userId = null)
    {
        parent::__construct();
        $this->userId = $userId;
    }

    public function save()
    {
        $query = "INSERT INTO basket (id, user_id) VALUES ( null, '" . $this->userId . "')";
        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }
    }

    public function getFromId()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM basket WHERE user_id = 
                                                            " . $this->userId . " LIMIT 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function deleteByUserId($userId)
    {
        return mysqli_query($this->conn, "DELETE FROM basket WHERE user_id = $userId LIMIT 1");
    }

}