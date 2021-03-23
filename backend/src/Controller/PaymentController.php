<?php

    include_once __DIR__ . "/AbstractController.php";
    include_once __DIR__ . "/../../../common/src/Model/Payment.php";

class PaymentController extends AbstractController
{
    public function read()
    {
        $all = (new Payment())->all();
        include_once __DIR__ . "/../../views/payment/List.php";
    }

    public function create()
    {
        include_once __DIR__ . "/../../views/payment/form.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $payments = new Payment(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['code']),
                intval($_POST['priority'])
            );

            $payments->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Payment())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $onePayment = (new Payment())->getById($id);

        if(empty($onePayment)) die("Payment is not found");

        include_once __DIR__ . "/../../views/payment/form.php";
    }

}