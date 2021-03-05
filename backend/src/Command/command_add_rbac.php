<?php

include_once __DIR__ . "/../Migrations/202102231644_migration_add_rbac.php";
include_once __DIR__ . "/../../../common/src/Service/DBConnector.php";

$dbConnector = DBConnector::getInstance();

$migration = new MigrationAddRbac($dbConnector);
$migration->commit();

die("ОК");


