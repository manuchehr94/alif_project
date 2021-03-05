<?php

    include_once __DIR__ . "/../Model/Basket.php";
    include_once __DIR__ . "/../Model/BasketItem.php";
    include_once __DIR__ . "/../Service/BasketService.php";

class BasketSessionService extends BasketService
{
    public static function getBasketByUserId($userId)
    {
    }

    public function updateBasketItem($basketId, $productId, $quantity)
    {
    }

    public function deleteBasketItem($productId, $basketId)
    {
    }

    public function createBasketItem($basketId, $productId, $quantity)
    {
        $item = [
            'product_id' => $productId,
            'basket_id' => $basketId,
            'quantity' => $quantity
        ];

        $session = $this->getBasketProducts($basketId);
        $session[] = $item;

        $_SESSION['basket'] = serialize($session);
    }

    public function getBasketProducts($basketId)
    {
        $session = $_SESSION['basket'] ?? [];

        if(empty($session) && sizeof($session) == 0) {
            return $session;
        }

        return unserialize($session);
    }

    public function clearBasket($basketId) {

    }

    public function getBasketIdByUserId($userId) {

    }
}