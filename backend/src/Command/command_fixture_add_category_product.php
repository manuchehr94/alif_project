<?php

include_once __DIR__ . "/../Fixtures/FixtureCategoryProduct.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$fixture = new FixtureCategoryProduct($dbConnector);
$fixture->run();

die("ОК");


