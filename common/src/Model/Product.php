<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Product
{
    const NUMBER_PRODUCTS_PER_PAGE = 15;

    public $id;
    public $title;
    public $picture;
    public $preview;
    public $content;
    public $price;
    public $status;
    public $created;
    public $updated;

    private $conn;

    public function __construct(
        $id = null,
        $title = null,
        $picture = null,
        $preview = null,
        $content = null,
        $price = null,
        $status = null,
        $created = null,
        $updated = null
    )
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->picture = $picture;
        $this->preview = $preview;
        $this->content = $content;
        $this->price = $price;
        $this->status = $status;
        $this->created = $created;
        $this->updated = $updated;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update products set 
                                        title='" . $this->title . "', 
                                        preview='" . $this->preview . "', "
                                        . ((!empty($this->picture)) ? "picture='" . $this->picture . "'," : "") .
                                         "content='" . $this->content . "', 
                                         price='" . $this->price . "', 
                                         status='" . $this->status . "', 
                                         updated='" . $this->updated . "' 
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO products (id, title, picture, preview, content, price, status, created, updated) VALUES (
                                            null, 
                                            '" . $this->title . "', 
                                            '" . $this->picture . "', 
                                            '" . $this->preview . "', 
                                            '" . $this->content . "', 
                                            '" . $this->price . "', 
                                            '" . $this->status . "', 
                                            '" . $this->created . "', 
                                            '" . $this->updated . "'
            )";
        }

         mysqli_query($this->conn, $query);
    }

    public function all($categoryIds = [], $limit = self::NUMBER_PRODUCTS_PER_PAGE, $offset = 0)
    {
        $where = (!empty($categoryIds) && is_array($categoryIds)) ?
            ' WHERE cp.category_id IN (' . implode(',', $categoryIds) . ')' : '';

        $result = mysqli_query($this->conn,
                                "Select 
                                      products.* 
                                      from
                                      products
                                      left join category_product cp on
                                      products.id = cp.product_id
                                      $where order by id DESC limit $offset, $limit");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function totalProducts()
    {
        $query = "SELECT COUNT(*) FROM `products`";
        $count = mysqli_query($this->conn, $query);

        $result = mysqli_fetch_all($count, MYSQLI_ASSOC);
        $result2 = reset($result);
        $result2 = reset($result2);

        return $result2;
    }

    public function getLeftProducts($categoryIds = []) {

        $where = (!empty($categoryIds) && is_array($categoryIds)) ?
            ' WHERE category_id = (' . implode(',', $categoryIds) . ')' : '';

        $query = "SELECT COUNT(`category_id`) FROM category_product $where";
        $queryResult = mysqli_query($this->conn, $query);
        $queryFetch = mysqli_fetch_all($queryResult, MYSQLI_ASSOC);

        $result = reset($queryFetch);
        $result = reset($result);

        return $result;
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from products where id = $id limit 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from products where id = $id limit 1");
    }

}