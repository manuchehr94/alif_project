<?php

include_once __DIR__ . "/AbstractModel.php";

class Access extends AbstractModel
{
    public function __construct()
    {
       parent::__construct();
    }

    public function createAll(array $data = [])
    {
        if(empty($data)) {
            throw new Exception("Empty Access data");
        }

        $accessses = [];
        foreach($data as $role => $perms) {
            foreach($perms as $perm => $value) {
                if($value === 'on') {
                    $accessses[] = sprintf("('%s', '%s')", $role, $perm);
                }
            }
        }

        if(empty($accessses)) {
            throw new Exception("Empty data for Access Insert");
        }

        $query = "INSERT INTO `rbac_access` VALUES" . implode(',', $accessses);

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        return true;
    }

    public function clear()
    {
        $result = mysqli_query($this->conn, "TRUNCATE TABLE rbac_access");

        if(!$result) {
            throw new Exception(mysqli_error($this->conn));
        }

        return true;
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "SELECT * FROM rbac_access");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    /**
     * @param $name
     * @throws Exception
     */
    public function deleteByName($name)
    {
        $query = "DELETE FROM `rbac_permission` WHERE permission = '$name' LIMIT 1";

        $result = mysqli_query($this->conn, $query);

        if(!$result) {
            throw new Exception(mysqli_error($this->conn), 400);
        }
    }

}