<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Permission extends AbstractModel
{
    public $permission;

    public function __construct($permission = null)
    {
       parent::__construct();

        $this->permission = $permission;
    }

    public function save()
    {
        $query = "INSERT INTO `rbac_permission` VALUES ('" . $this->permission . "')";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    /**
     * @param $name
     * @throws Exception
     */
    public function deleteByName($name)
    {
        $query = "DELETE FROM `rbac_permission` WHERE permission = '$name'";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

    public function all()
    {
        $permissions = [];

        $result = mysqli_query($this->conn, "SELECT * FROM `rbac_permission`");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $permissions[] = $item['permission'];
        }

        return $permissions;

    }
}