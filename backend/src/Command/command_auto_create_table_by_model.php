<?php

include_once __DIR__ . "/../../../common/src/Model/Rating.php";

$objReflection = new ReflectionClass("Rating");

print $objReflection->getName();