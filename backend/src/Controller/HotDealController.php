<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/HotDeal.php";

class HotDealController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/hotDeal/form.php";
    }

    public function read()
    {
        $allHotDeals = (new HotDeal())->all();
        include_once __DIR__ . "/../../views/hotDeal/list.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $hotDeal = new HotDeal(
                                intval($_POST['id']),
                                intval($_POST['to_main_page']),
                                htmlspecialchars($_POST['title']),
                                intval($_POST['description_id']),
                                htmlspecialchars($_POST['content']),
                                intval($_POST['price']),
                                intval($_POST['sale'])
            );

            $hotDeal->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];

        (new HotDeal())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneHotDeal = (new HotDeal())->getById($id);

        if(empty($oneHotDeal)) die("hotDeal is not found");

        include_once __DIR__ . "/../../views/hotDeal/form.php";
    }
}