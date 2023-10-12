<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Exception;

class ParseCSV extends Command
{
    protected $signature = 'csv:parse {file} {--output=}';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $csvFile = $this->argument('file');
        $outputFile = $this->option('output');

        if (!file_exists($csvFile)) {
            $this->error('CSV file not found.');
            return 1;
        }

        $parsedData = $this->parseCSVFile($csvFile);

        $uniqueData = [];
        foreach ($parsedData as $row) {
            $key = serialize($row);
            if (array_key_exists($key, $uniqueData)) {
                $uniqueData[$key]['count']++;
            } else {
                $uniqueData[$key] = $row;
                $uniqueData[$key]['count'] = 1;
            }
        }

        $uniqueData = array_values($uniqueData);

        file_put_contents($outputFile, json_encode($uniqueData,JSON_PRETTY_PRINT));
        $this->info('Data saved to ' . $outputFile);
    }

    private function parseCSVFile($filename)
    {
        $csvData = array_map('str_getcsv', file($filename));
        $header = array_shift($csvData);
        $parsedData = [];

        foreach ($csvData as $row) {
            $parsedRow = array_combine($header, $row);
            $parsedData[] = $parsedRow;
        }

        return $parsedData;
    }
}
