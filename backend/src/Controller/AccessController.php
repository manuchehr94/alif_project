<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Role.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";
include_once __DIR__ . "/../../../common/src/Model/Access.php";

class AccessController extends AbstractController
{
    public function create()
    {
    }

    public function read()
    {
    }

    public function save()
    {
        if(!empty($_POST)) {
            if((new Access())->clear()) {
                if((new Access())->createAll($_POST['access'] ?? [])) {
                    header("Location: /?model=access&action=update");
                    die();
                }
            }

        }

    }

    public function delete()
    {

    }

    public function update()
    {

        $accesses = [];

        foreach ((new Access())->all() as $item) {
            $accesses[$item['role']][$item['permission']] = true;
        }

        $roles = (new Role())->all();
        $permissions = (new Permission())->all();

        include_once __DIR__ . "/../../views/access/list.php";
    }

}