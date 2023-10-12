<?php

    class Product {
        public $product_id;
        public $product_name;
        public $price;

        public function validate() {
            if (empty($this->product_id) || empty($this->product_name) || empty($this->price)) {
                throw new Exception("Required fields are missing.");
            }
        }
    }

    function parseCSV($filename) {
        $products = [];

        if (($handle = fopen($filename, "r")) !== false) {
            $headers = fgetcsv($handle, 1000, ",");

            while (($data = fgetcsv($handle, 1000, ",")) !== false) {
                $product = new Product();
                foreach ($headers as $key => $header) {
                    // Map CSV columns to Product properties
                    $property = strtolower(str_replace(' ', '_', $header));
                    $product->{$property} = $data[$key];
                }

                // Validate the product
                $product->validate();

                $products[] = $product;
            }

            fclose($handle);
        }

        return $products;
    }

    try {
        $filename = "example.csv"; // Change to your CSV file name
        $parsedProducts = parseCSV($filename);

        // Process the parsed products as needed
        foreach ($parsedProducts as $product) {
            // Handle each product
            echo "Product ID: {$product->product_id}, Name: {$product->product_name}, Price: {$product->price}\n";
        }
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
    }

    $uniqueCombinations = [];

    foreach ($products as $product) {
        // Create a unique identifier for the combination
        $combination = $product->product_id . '-' . $product->product_name;

        // Check if the combination exists in the array
        if (array_key_exists($combination, $uniqueCombinations)) {
            // Increment the count for this combination
            $uniqueCombinations[$combination]++;
        } else {
            // Initialize the count for this combination
            $uniqueCombinations[$combination] = 1;
        }
    }
