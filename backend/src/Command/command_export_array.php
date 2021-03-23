<?php

include_once __DIR__ . "/../../../common/src/Service/DataHelper.php";

$array2x = [
    ["roses", 1000 , 125],
    ["tulips", 300 , 15],
    ["orchards", 140 , 35]
];

$fileName = 'homework_' . date('YmdHis', time()) . '.csv';
$path = 'C:/xampp/htdocs/php/';
$fullFileName =  $path . $fileName;

(new DataHelper())->saveArrayToCsvFile($array2x, $fullFileName);
die("ОК");


