<?php

namespace App\Services;

class CsvToJsonService
{
    public function convertCsvToJson($csvPath, $jsonPath)
    {
        $csvData = array_map('str_getcsv', file($csvPath));
        $jsonData = json_encode($csvData, JSON_PRETTY_PRINT);
        file_put_contents($jsonPath, $jsonData);
    }
}
