<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class HotDealDescription extends AbstractModel
{
    public $id;
    public $descriptionId;
    public $firstOffer;
    public $secondOffer;
    public $thirdOffer;

    public function __construct(
        $id = null,
        $descriptionId = null,
        $firstOffer = null,
        $secondOffer = null,
        $thirdOffer = null
    )
    {
        parent::__construct();

        $this->id = $id;
        $this->descriptionId = $descriptionId;
        $this->firstOffer = $firstOffer;
        $this->secondOffer = $secondOffer;
        $this->thirdOffer = $thirdOffer;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update `hot_deals_description` set 
                                        description_id='" . $this->descriptionId . "', 
                                        first_offer='" . $this->firstOffer . "', 
                                        second_offer='" . $this->secondOffer . "', 
                                         third_offer='" . $this->thirdOffer . "'
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO `hot_deals_description` (`id`, `description_id`,`first_offer`, `second_offer`, `third_offer`) VALUES (
                                            null, 
                                            '" . $this->descriptionId . "', 
                                            '" . $this->firstOffer . "', 
                                            '" . $this->secondOffer . "', 
                                            '" . $this->thirdOffer . "'
            )";
        }

         mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "Select * from hot_deals_description");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }


    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from hot_deals_description where id = $id limit 1");
        $oneHotDeal = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return reset($oneHotDeal);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from hot_deals_description where id = $id limit 1");
    }

}