<?php

include_once __DIR__ . "/../../../common/src/Service/ClassInfoHelper.php";
include_once __DIR__ . "/../../../common/src/Model/Product.php";

ClassInfoHelper::getMethods('Product');
ClassInfoHelper::getVariables('Product');
