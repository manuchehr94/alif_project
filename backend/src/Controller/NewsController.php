<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/News.php";

class NewsController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../views/news/form.php";
    }

    public function read()
    {
        $allNews = (new News())->all();
        include_once __DIR__ . "/../../views/news/List.php";
    }

    public function save()
    {
        $now = date("Y-m-d H:i:s", time());

        if(!empty($_POST)) {

            $news = new News(
                intval($_POST['id']),
                htmlspecialchars($_POST['title']),
                htmlspecialchars($_POST['content']),
                $now
            );

            $news->save();
        }

        return $this->read();
    }

    public function delete()
    {
        $id = (int)$_GET['id'];
        (new News())->deleteById($id);
        return $this->read();
    }

    public function update()
    {
        $id = (int)$_GET['id'];

        if(empty($id)) die("Undefined id");

        $oneNews = (new News())->getById($id);

        if(empty($oneNews)) die("News is not found");

        include_once __DIR__ . "/../../views/news/form.php";
    }

}