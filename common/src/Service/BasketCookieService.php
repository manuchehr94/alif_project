<?php

    include_once __DIR__ . "/../Model/Basket.php";
    include_once __DIR__ . "/../Model/BasketItem.php";
    include_once __DIR__ . "/../Service/BasketService.php";

class BasketCookieService extends BasketService
{
    const TIME_EXPIRED = 3600;
    /**
     * @param $userId
     */
    public static function getBasketByUserId($userId)
    {
    }


    public function getBasketProducts($basketId)
    {
        $data = $_COOKIE['basket'] ?? [];

        if(empty($data) && sizeof($data) == 0) {
            return $data;
        }

        return unserialize($data);
    }

    /**
     * @param $basketId
     * @param $productId
     * @param $quantity
     */
    public function updateBasketItem($basketId, $productId, $quantity)
    {
        $data = $this->getBasketProducts($basketId);

        foreach ($data as $key => $item) {

            if($item['product_id'] == $productId) {
                $data[$key]['quantity'] = $quantity;
            }
        }

        $this->save($data);
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

        $data = $this->getBasketProducts($basketId);
        $data[] = $item;

        $this->save($data);
    }

    public function save($data)
    {
        setcookie('basket', serialize($data), time() + self::TIME_EXPIRED);
    }

    public function clearBasket($basketId) {

    }

    public function getBasketIdByUserId($userId) {

    }

}