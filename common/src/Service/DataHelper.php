<?php

class DataHelper
{
    public function saveArrayToCsvFile($array2x, $file)
    {
        $fp = fopen($file, 'w');
        foreach ($array2x as $fields) {
            fputcsv($fp, $fields);
        }
        fclose($fp);
    }
}