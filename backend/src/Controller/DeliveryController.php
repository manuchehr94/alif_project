<?php

    include_once __DIR__ . "/AbstractController.php";
    include_once __DIR__ . "/../../../common/src/Model/Delivery.php";

class DeliveryController extends AbstractController
{
    public function read()
    {
        $all = (new Delivery())->all();
        include_once __DIR__ . "/../../views/delivery/List.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/delivery/form.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $deliveries = new Delivery(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['code']),
                intval($_POST['priority'])
            );

            $deliveries->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Delivery())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneDelivery = (new Delivery())->getById($id);

        if(empty($oneDelivery)) die("Delivery is not found");

        include_once __DIR__ . "/../../views/delivery/form.php";
    }

}