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
        $result = mysqli_query($this->conn, "Select * from basket where user_id = 
                                                            " . $this->userId . " limit 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function deleteByUserId($userId)
    {
        return mysqli_query($this->conn, "delete from basket where user_id = $userId limit 1");
    }

}