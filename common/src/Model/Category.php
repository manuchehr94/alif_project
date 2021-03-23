<?php

include_once __DIR__ . "/../Service/DBConnector.php";
include_once __DIR__ . "/AbstractModel.php";

class Category extends AbstractModel

{
    public $id;
    public $title;
    public $groupId;
    public $parentId;

    public function __construct($id = null, $title = null, $groupId = null, $parentId = null)
    {
        parent::__construct();
        $this->id = $id;
        $this->title = $title;
        $this->groupId = $groupId;
        $this->parentId = $parentId;
    }

    public function save()
    {
        if($this->id > 0) {

            $query = "UPDATE categories SET 
                                        title='" . $this->title . "', 
                                        group_id='" . $this->groupId . "', 
                                         parent_id='" . $this->parentId . "'
                                         WHERE id=" . $this->id . " LIMIT 1";

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
        $result = mysqli_query($this->conn, "SELECT * FROM categories ORDER BY id DESC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getWithGroupIds($groups = [])
    {
        $where = '';

        if(!empty($groups)) {
            $where = ' WHERE group_id NOT IN (' . implode(',', $groups)  . ')';
        }

        $result = mysqli_query($this->conn, "SELECT * FROM categories $where ORDER BY id ASC");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public function getGroupsWithCategories($groups = [])
    {
        $where = '';

//        if(!empty($groups)) {
//            $where = ' WHERE group_id NOT IN (' . implode(',', $groups)  . ')';
//        }

        $result = mysqli_query($this->conn,
                                    "SELECT 
                                            categories.*,
                                            cg.id AS group_id,
                                            cg.title AS group_title
                                            FROM 
                                            categories 
                                            LEFT JOIN category_group cg
                                            ON group_id = cg.id
                                            $where ORDER BY id ASC");

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
        $result = mysqli_query($this->conn, "SELECT * FROM categories WHERE id = $id LIMIT 1");
        $oneCategory = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return reset($oneCategory);
    }

    public function deleteById($id)
    {
        return mysqli_query($this->conn, "DELETE FROM categories WHERE id = $id LIMIT 1");
    }


}