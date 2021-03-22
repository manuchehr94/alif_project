<?php

    include_once __DIR__ ."/../Service/DBConnector.php";
    include_once __DIR__ ."/AbstractModel.php";

class Delivery extends AbstractModel
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $code;

    /**
     * @var int
     */
    private $priority;

    /**
     * @var false|mysqli
     */

    public function __construct($id = null, $title =null, $code = null, $priority = null)
    {
        parent::__construct();

        $this->setId($id);
        $this->setTitle($title);
        $this->setCode($code);
        $this->setPriority($priority);
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $code
     */
    public function setCode($code)
    {
        $this->code = $code;
    }

    /**
     * @return int
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param int $priority
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update delivery set 
                                        title='" . $this->getTitle() . "', 
                                        code='" . $this->getCode() . "', 
                                        priority='" . $this->getPriority() . "'
                                         where id=" . $this->getId() . " limit 1";

        } else {
            $query = "INSERT INTO delivery (`id`, `title`, `code`, `priority`) VALUES (
                                            null, 
                                            '" . $this->getTitle() . "', 
                                            '" . $this->getCode() . "', 
                                            '" . $this->getPriority() . "'
            )";
        }

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from delivery where id = $id limit 1");
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from delivery where id = $id limit 1");
        $oneDelivery = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneDelivery);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "Select * from delivery order by id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}