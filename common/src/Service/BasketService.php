<?php

include_once __DIR__ . "/interfaces/BasketInterface.php";

abstract class BasketService implements BasketInterface
{
    abstract public static function getBasketByUserId($userId);

    abstract public function updateBasketItem($basketId, $productId, $quantity);

    abstract public function deleteBasketItem($productId, $basketId);

    abstract public function createBasketItem($basketId, $productId, $quantity);

    abstract public function getBasketProducts($basketId);

    abstract public function clearBasket($basketId);

    abstract public function getBasketIdByUserId($userId);
}