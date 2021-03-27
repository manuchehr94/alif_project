<?php

include_once __DIR__ . "/../../../common/src/Service/DataHelper.php";

$fileName = 'homework.csv';
$path = 'C:/xampp/htdocs/php/';
$fullFileName =  $path . $fileName;

(new DataHelper())::getArrayFromCsvFile($fullFileName);
die("ОК");


