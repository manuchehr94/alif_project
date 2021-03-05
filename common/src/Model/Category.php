<?php

include_once __DIR__ . "/../Service/DBConnector.php";

class Category

{
    public $id;
    public $title;
    public $groupId;
    public $parentId;

    private $conn;

    public function __construct($id = null, $title = null, $groupId = null, $parentId = null)
    {
        $this->conn = DBConnector::getInstance()->connect();

        $this->id = $id;
        $this->title = $title;
        $this->groupId = $groupId;
        $this->parentId = $parentId;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "Update categories set 
                                        title='" . $this->title . "', 
                                        group_id='" . $this->groupId . "', 
                                         parent_id='" . $this->parentId . "'
                                         where id=" . $this->id . " limit 1";

        } else {
            $query = "INSERT INTO categories VALUES (
                                            null, 
                                            '" . $this->title . "', 
                                            '" . $this->groupId . "', 
                                            '" . $this->parentId . "'
            )";
        }

        mysqli_query($this->conn, $query);
    }

    public function all()
    {
        $result = mysqli_query($this->conn, "Select * from categories order by id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getWithGroupIds($groups = [])
    {
        $where = '';

        if(!empty($groups)) {
            $where = ' WHERE group_id NOT IN (' . implode(',', $groups)  . ')';
        }

        $result = mysqli_query($this->conn, "Select * from categories $where order by id ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getGroupsWithCategories($groups = [])
    {
        $where = '';

//        if(!empty($groups)) {
//            $where = ' WHERE group_id NOT IN (' . implode(',', $groups)  . ')';
//        }

        $result = mysqli_query($this->conn,
                                    "Select 
                                            categories.*,
                                            cg.id as group_id,
                                            cg.title as group_title
                                            from 
                                            categories 
                                            left join category_group cg
                                            on group_id = cg.id
                                            $where order by id ASC");

        $categories = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $groups = [];

        if(!(is_array($categories) && !empty($categories))) {
            $result = [];
        }

        foreach ($categories as $item) {
            $groups[$item['group_title']][] = $item;
        }

        return $groups;
    }

    public function getById($id)
    {
        $result = mysqli_query($this->conn, "Select * from categories where id = $id limit 1");
        $oneCategory = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneCategory);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "delete from categories where id = $id limit 1");
    }


}