<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class HotDeal
{
    public $id;
    public $toMainPage;
    public $title;
    public $descriptionId;
    public $content;
    public $price;
    public $sale;

    private $conn;

    public function __construct(
        $id = null,
        $toMainPage = null,
        $title = null,
        $descriptionId = null,
        $content = null,
        $price = null,
        $sale = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->toMainPage = $toMainPage;
        $this->title = $title;
        $this->descriptionId = $descriptionId;
        $this->content = $content;
        $this->price = $price;
        $this->sale= $sale;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update `hot_deals` set 
                                        to_main_page='" . $this->toMainPage . "', 
                                        title='" . $this->title . "', 
                                        description_id='" . $this->descriptionId . "', 
                                         content='" . $this->content . "', 
                                         price='" . $this->price . "', 
                                         sale='" . $this->sale . "'
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO `hot_deals` (`id`, `to_main_page`,`title`, `description_id`, `content`, `price`, `sale`) VALUES (
                                            null, 
                                            '" . $this->toMainPage . "', 
                                            '" . $this->title . "', 
                                            '" . $this->descriptionId . "', 
                                            '" . $this->content . "', 
                                            '" . $this->price . "', 
                                            '" . $this->sale . "'
            )";
        }

         mysqli_query($this->conn, $query);
    }

    public function allWithDescription()
    {

        $result = mysqli_query($this->conn,
                                "Select 
                                      hd.id,
                                      hd.to_main_page,
                                      hd.title,
                                      hd.content,
                                      hd.price,
                                      hd.sale,
                                      hdd.first_offer,
                                      hdd.second_offer,
                                      hdd.third_offer
                                      from 
                                      hot_deals as hd
                                      left join hot_deals_description as hdd on
                                      hd.description_id = hdd.description_id");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function all()
    {

        $result = mysqli_query($this->conn,
            "Select * from `hot_deals`");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from hot_deals where id = $id limit 1");
        $oneHotDeal = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($oneHotDeal);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from hot_deals where id = $id limit 1");
    }

}