<?php

class DataHelper
{
    public static function saveArrayToCsvFile($array2x, $file)
    {
        $fp = fopen($file, 'w');
        foreach ($array2x as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }

    public static function getArrayFromCsvFile($file)
    {
        return array_map('str_getcsv', file($file));
    }
}