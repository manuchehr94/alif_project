<?php

include_once __DIR__ . "/../Migrations/202102212030_migration_add_user_table.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddUserTable($dbConnector);
$migration->rollback();

die("ОК");


