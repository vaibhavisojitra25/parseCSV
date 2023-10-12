<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Services\CsvToJsonService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Storage;

class CsvToJsonServiceTest extends TestCase
{
    public function testCsvToJsonConversion()
    {
        // Arrange
        $csvPath = 'unit_test_product.csv';
        $jsonPath = 'unit_test_ouput.json';

        // Act
        $csvToJsonService = new CsvToJsonService();
        $csvToJsonService->convertCsvToJson($csvPath, $jsonPath);

        // Assert
        $this->assertFileExists($jsonPath);

        $csvData = file_get_contents($csvPath);
        $jsonData = file_get_contents($jsonPath);

        $csvArray = array_map('str_getcsv', preg_split('/\r\n|\r|\n/', $csvData));
        $jsonArray = json_decode($jsonData, true);

        $this->assertEquals($csvArray, $jsonArray);
    }
}
