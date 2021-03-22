<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Role extends AbstractModel
{
    public $role;

    public function __construct($role = null)
    {
        parent::__construct();
        $this->role = $role;
    }

    public function save()
    {
        $query = "INSERT INTO `rbac_role` VALUES ('" . $this->role . "')";

        mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $roles = [];

        $result = mysqli_query($this->conn, "Select * from `rbac_role`");

        foreach (mysqli_fetch_all($result, MYSQLI_ASSOC) as $item) {
            $roles[] = $item['role'];
        }

        return $roles;

    }
}