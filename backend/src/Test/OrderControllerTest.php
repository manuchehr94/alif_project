<?php

    include_once __DIR__ . "/../../src/Test/AbstractTest.php";
    include_once __DIR__ . "/../../src/Fixtures/FixtureBasket.php";
    include_once __DIR__ . "/../../src/Fixtures/FixtureBasketItem.php";
    include_once __DIR__ . "/../../../frontend/src/Controller/OrderController.php";

class OrderControllerTest extends AbstractTest
{
    /**
     * @throws Exception
     */
    public function testCreate()
    {
        try {
            $this->dropTableByName('basket');
            $this->dropTableByName('basket_item');
            $this->dropTableByName('user');
            $this->dropTableByName('products');
            $this->dropTableByName('orders');
            $this->dropTableByName('order_item');
        } catch (Exception $e){

        }

        $this->createTableByName('basket');
        $this->createTableByName('basket_item');
        $this->createTableByName('user');
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

        $this->copyTableByName('user');
        $this->copyTableByName('products');

        (new FixtureBasket($this->conn))->run();
        (new FixtureBasketitem($this->conn))->run();

        $_POST = [
            'name' => 'Manu',
            'phone' => '1220212',
            'email' => 'manuch@m.ru',
            'delivery' => '2',
            'payment' => '2',
            'comment' => 'Comment'
        ];

        $orderController = new OrderController($this->conn->connect());
        $orderController->create();

        $orders = ((new Order())->setConn($this->conn->connect()))->all();

        if(count($orders) !== 1) {
            print "Error: Wrong Orders count" . PHP_EOL;
            die("Test was crashed");
        }

        $order = reset($orders);
        foreach (['email' => $_POST['email'], 'phone' => $_POST['phone']] as $key => $value) {
            if($order[$key] !== $value) {
                print "Error: wrong value" . $key . PHP_EOL;
                die("Test was crashed");
            }
        }

        $orderItems = (new OrderItem())->setConn($this->conn->connect())->getByOrderId($order['id']);

        if(sizeof($orderItems) !== 3) {
            print "Error: Wrong OrderItems count" . PHP_EOL;
            die("Test was crashed");
        }
        //доработать
        foreach ($orderItems as $orderItem) {
            if(!in_array($orderItem['product_id'], [1, 3, 3])) {
                print "Error: Wrong OrderItems Id = " . $orderItem['product_id'] . PHP_EOL;
                die("Test was crashed");
            }
        }


        $_POST = [];
        $this->dropTableByName('basket');
        $this->dropTableByName('basket_item');
        $this->dropTableByName('user');
        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}