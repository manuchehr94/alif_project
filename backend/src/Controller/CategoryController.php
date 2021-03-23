<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Category.php";

class CategoryController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/category/form.php";
    }

    public function read()
    {
        $allCategories = (new Category())->all();
        include_once __DIR__ . "/../../views/category/List.php";
    }

    public function save()
    {
        if(!empty($_POST)) {

            $category = new Category(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                intval($_POST['group_id']),
                intval($_POST['parent_id'])
            );

            $category->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new Category())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneCategory = (new Category())->getById($id);

        if(empty($oneCategory)) die("Category is not found");

        include_once __DIR__ . "/../../views/category/form.php";
    }
}