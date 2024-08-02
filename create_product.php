<?php
require 'connect_and_create_table.php';

$sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
$stmt = $pdo->prepare($sql);

$stmt->bindParam(':name', $name);
$stmt->bindParam(':price', $price);

$name = "Laptop";
$price = 15000.00;

$stmt->execute();

echo "Product ditambahkan !";
