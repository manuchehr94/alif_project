<?php

class ClassInfoHelper
{
    public static function getMethods($class)
    {
        return (new ReflectionClass($class))->getMethods();
    }

    public static function getVariables($class)
    {
        return (new ReflectionClass($class))->getProperties();
    }

}