<?php


class ExportService
{
    public static function export()
    {
        $fileName = 'products_' . md5(time()) . '.csv';
        $path = __DIR__ . '';
    }
}