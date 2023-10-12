# Project Name

Parse CSV into Json File

## Table of Contents

- [Prerequisites](#prerequisites)
- [Installation](#installation)
- [Running the Parser](#running-the-parser)

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


2. Clone the repository:

   ```bash
   cd parseCSV

3. Install the project dependencies:

   ```bash
   composer update

## Running the Parser

1. To parse a CSV file into a JSON file, execute the following command in your terminal::

   ```bash
   php artisan csv:parse products_comma_separated.csv --output=output_file.json

   The products_comma_separated.csv should be located in the root folder of your Laravel project. The parser will generate an output file named output_file.json in the same root folder.

   Please note that the input CSV file and the output JSON file will be located in the root folder of your Laravel project.
