<?php

include_once __DIR__ . "/../Fixtures/Fixture01.php";
include_once __DIR__ . "/../Fixtures/Fixture02.php";
include_once __DIR__ . "/../Fixtures/Fixture03.php";
include_once __DIR__ . "/../Fixtures/Fixture04.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$fixture = new Fixture01(DBConnector::getInstance());
$fixture->run();

$fixture2 = new Fixture02(DBConnector::getInstance());
$fixture2->run();

$fixture3 = new Fixture03(DBConnector::getInstance());
$fixture3->run();

$fixture4 = new Fixture04(DBConnector::getInstance());
$fixture4->run();

die("Ok");

