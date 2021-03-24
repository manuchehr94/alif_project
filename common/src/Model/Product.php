<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Product extends AbstractModel
{
    const NUMBER_PRODUCTS_PER_PAGE = 15;

    public $id;

    /**
     * @var string
     * @valid {"type": "string", "maxlength": 64}
     */
    public $title;

    /**
     * @var string
     * @valid {"regx": "((.jpg)|(.png))"}
     */
    public $picture;

    /**
     * @var string
     * @valid {"type": "string", "maxlength": 255}
     */
    public $preview;
    public $content;

    /**
     * @var int
     * @valid {"type": "int", "max": 30000, "min": 1}
     */
    public $price;

    /**
     * @var int
     * @valid {"type": "int"}
     */
    public $status;
    public $created;
    public $updated;

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
        parent::__construct();

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

            $query = "UPDATE products SET 
                                        title='" . $this->title . "', 
                                        preview='" . $this->preview . "', "
                                        . ((!empty($this->picture)) ? "picture='" . $this->picture . "'," : "") .
                                         "content='" . $this->content . "', 
                                         price='" . $this->price . "', 
                                         status='" . $this->status . "', 
                                         updated='" . $this->updated . "' 
                                         WHERE id=" . $this->id . " LIMIT 1";

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
                                "SELECT 
                                      products.* 
                                      FROM
                                      products
                                      LEFT JOIN category_product cp ON
                                      products.id = cp.product_id
                                      $where ORDER BY id DESC limit $offset, $limit");

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getAllForExport()
    {
        $result = mysqli_query($this->conn,"SELECT products.* FROM products ORDER BY id DESC ");

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
        $result = mysqli_query($this->conn, "SELECT * FROM products WHERE id = $id LIMIT 1");
        $oneProduct = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneProduct);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "DELETE FROM products WHERE id = $id LIMIT 1");
    }

}