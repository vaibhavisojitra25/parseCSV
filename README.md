# parseCSV

Parse CSV into Json File

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Running the Parser](#running-the-parser)
- [Running Tests](#running-tests)

## Prerequisites

List any prerequisites or dependencies that need to be installed before using the project. For example:

- PHP 7.4+
- Composer
- Laravel
- PHPUnit

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/vaibhavisojitra25/parseCSV.git


2. Change into the project directory:

   ```bash
   cd parseCSV

3. Install the project dependencies:

   ```bash
   composer update

## Running the Parser

1. To parse a CSV file into a JSON file, execute the following command in your terminal

   To convert a CSV file to JSON, use the provided Laravel Artisan command. For example, to convert products_comma_separated.csv to JSON with an output file named output_file.json, run:

   ```bash
   php artisan csv:parse products_comma_separated.csv --output=output_file.json


- Ensure that the products_comma_separated.csv file is located in the root folder of your Laravel project. The resulting JSON file will also be saved in the project\'s root folder.

- Now, you can use the parseCSV project to parse CSV files into JSON format. This can be particularly useful for data transformation and integration tasks in your Laravel project.

## Running Tests

1. Ensure PHPUnit is installed

   ```bash
   composer require --dev phpunit/phpunit

2. Run the unit and integration tests:

   ```bash
   vendor/bin/phpunit
