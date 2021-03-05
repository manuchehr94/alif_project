<?php


class FileUploader
{
    public static function upload($folder)
    {
        if(!empty($_FILES['picture']['tmp_name'])) {
            $filename = md5(time() . rand(1000, 9999)) . $_FILES['picture']['name'];
            copy($_FILES['picture']['tmp_name'], __DIR__ . '/../../../uploads/' . $folder . "/" . $filename);

            return $filename;
        }

            return null;
    }



}