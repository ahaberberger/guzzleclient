<?php
require_once 'vendor/autoload.php';

$app = new \MyApp\App();


// Create a single product

$product = $app->createProduct("First Product", 120);

// Create a price for our first product

$app->createPrice("First Price", 12, $product['uri']);

// Create a product with two prices

$product = $app->createProduct(
		"Second Product",
		150,
		array(
			array("name" => "New Price", "amount" => 10),
			array("name" => "Another new Price", "amount" => 11),
			)
		);

// Retrieve all products

$products = $app->getProductList();
