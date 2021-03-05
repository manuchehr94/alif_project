<?php

include_once __DIR__ . "/AbstractController.php";
include_once __DIR__ . "/../../../common/src/Model/Permission.php";

class PermissionController extends AbstractController
{
    public function create()
    {
        include_once __DIR__ . "/../../Views/permission/form.php";
    }

    public function read()
    {
        $allPermissions = (new Permission())->all();
        include_once __DIR__ . "/../../Views/permission/List.php";
    }

    /**
     * @throws Exception
     */
    public function save()
    {
        if(!empty($_POST)) {

            $permissions = new Permission(htmlspecialchars($_POST['permission']));
            $permissions->save();
        }

        return $this->read();
    }

    /**
     * @throws Exception
     */
    public function delete()
    {
        $name = htmlspecialchars($_GET['permission']);
        (new Permission())->deleteByName($name);

        return $this->read();
    }

    public function update(){
        // TODO: Implement update() method.
    }

}