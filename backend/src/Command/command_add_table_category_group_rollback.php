<?php

include_once __DIR__ . "/../Migrations/202103041250_migration_add_category_group.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddCategoryGroup($dbConnector);
$migration->rollback();

die("ОК");


