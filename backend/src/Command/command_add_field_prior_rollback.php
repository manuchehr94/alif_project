<?php

include_once __DIR__ . "/../Migrations/202101270940_migration_add_field_prior_to_categories.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddFieldPriorToCategory($dbConnector);
$migration->rollback();

die("ОК");


