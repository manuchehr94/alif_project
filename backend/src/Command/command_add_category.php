<?php

include_once __DIR__ . "/../Migrations/202101272018_migration_add_field_category_to_product.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddFieldCategoryToProduct($dbConnector);
$migration->commit();

die("ОК");


