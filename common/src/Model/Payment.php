<?php

    include_once __DIR__ ."/../Service/DBConnector.php";
    include_once __DIR__ ."/AbstractModel.php";

class Payment extends AbstractModel
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

            $query = "UPDATE payment SET 
                                        title='" . $this->getTitle() . "', 
                                        code='" . $this->getCode() . "', 
                                        priority='" . $this->getPriority() . "'
                                         WHERE id=" . $this->getId() . " LIMIT 1";

        } else {
            $query = "INSERT INTO payment (`id`, `title`, `code`, `priority`) VALUES (
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
        return mysqli_query($this->conn, "DELETE FROM payment WHERE id = $id LIMIT 1");
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment WHERE id = $id LIMIT 1");
        $oneDelivery = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneDelivery);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM payment ORDER BY id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

}