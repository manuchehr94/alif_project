<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/HotDealDescription.php";

class HotDealDescriptionController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../Views/hotDealDescription/form.php";
    }

    public function read()
    {
        $allHotDealsDesc = (new HotDealDescription())->all();
        include_once __DIR__ . "/../../Views/hotDealDescription/List.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $hotDeal = new HotDealDescription(
                                intval($_POST['id']),
                                intval($_POST['description_id']),
                                htmlspecialchars($_POST['first_offer']),
                                htmlspecialchars($_POST['second_offer']),
                                htmlspecialchars($_POST['third_offer'])
            );

            $hotDeal->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new HotDealDescription())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneHotDealDescription = (new HotDealDescription())->getById($id);

        if(empty($oneHotDealDescription)) die("hotDealDescription is not found");

        include_once __DIR__ . "/../../Views/hotDealDescription/form.php";
    }
}