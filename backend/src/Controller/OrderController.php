<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Order.php";
include_once __DIR__ . "/../../../common/src/Model/OrderItem.php";
include_once __DIR__ . "/../../../common/src/Service/OrderService.php";

class OrderController extends AbstractController
{
    public function create()
    {
        $oneNews = [];
        include_once __DIR__ . "/../../Views/orders/form.php";
    }

    public function read()
    {
        $allNews = (new Order())->all();
        include_once __DIR__ . "/../../Views/orders/List.php";
    }

    public function save()
    {
      //TODO
    }

    /**
     * @throws Exception
     */
    public function update()
    {
        if(!empty($_POST)) {
            $id = (int)$_POST['id'];
            $delivery = (int)$_POST['delivery'];
            $payment = (int)$_POST['payment'];
            $name = htmlspecialchars($_POST['name']);
            $phone = htmlspecialchars($_POST['phone']);
            $email = htmlspecialchars($_POST['email']);
            $status = htmlspecialchars($_POST['status']);
            $updated = date("Y-m-d H:i:s", time());
            $total = 0;

            if($id > 0) {
                (new Order(
                            $id,
                            null,
                            $payment,
                            $delivery,
                            $total,
                            "",
                            $name,
                            $phone,
                            $email,
                            $status,
                            $updated
                            )
                )->update();
            }

            header("Location: /?model=order&action=read");
        }

        $oneNews = (new Order())->getById($_GET['id']);

        include_once __DIR__ . "/../../Views/orders/form.php";
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

}