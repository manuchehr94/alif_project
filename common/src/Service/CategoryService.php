<?php

    include_once __DIR__ . "/../Model/Category.php";

class CategoryService
{
    const MEN_PRODUCTS_GROUP_ID = 1;

    public static function getAllProducts()
    {
        return (new Category())->getGroupsWithCategories([self::MEN_PRODUCTS_GROUP_ID]);
    }

    public static function getCategoriesForSidebar()
    {
        return (new Category())->getWithGroupIds([self::MEN_PRODUCTS_GROUP_ID]);
    }

}