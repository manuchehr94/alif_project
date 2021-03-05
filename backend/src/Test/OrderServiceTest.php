<?php

    include_once __DIR__ . "/../../../common/src/Model/Order.php";
    include_once __DIR__ . "/../../../common/src/Service/OrderService.php";
    include_once __DIR__ . "/../../src/Test/AbstractTest.php";
    include_once __DIR__ . "/../../src/Fixtures/Fixture01.php";
    include_once __DIR__ . "/../../src/Fixtures/FixtureOrderItem.php";
    include_once __DIR__ . "/../../src/Fixtures/FixtureOrders.php";

class OrderServiceTest extends AbstractTest
{
    public function testCalcTotal()
    {
        $this->createTableByName('products');
        $this->createTableByName('orders');
        $this->createTableByName('order_item');

    //    $this->copyTableByName('products');
    //    $this->copyTableByName('orders');
    //    $this->copyTableByName('order_item');

        $productFixture = new Fixture01($this->conn);
        $productFixture->run();

        $orderFixture = new FixtureOrders($this->conn);
        $orderFixture->run();

        $orderItemFixture = new FixtureOrderItem($this->conn);
        $orderItemFixture->run();

        $orderService = new OrderService();

        $orderObject = new Order();
        $orderObject->setConn($this->conn->connect());

        $quantityAndProducts = $orderObject->getProductsAndQuantityByOrderId(1);

        if(!method_exists($orderService, 'calcTotal')) {
            print "Error: calcTotal() doesn't exist" . PHP_EOL;
            die("Test was crashed");
        }

        $total = $orderService->calcTotal($quantityAndProducts);

        if(420 !== $total) {
            print "Error: calcTotal() isn't correct" . PHP_EOL;
            die("Test was crashed");
        }

        $this->dropTableByName('products');
        $this->dropTableByName('orders');
        $this->dropTableByName('order_item');
    }
}