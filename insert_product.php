<?php
require 'connect_and_create_table.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $price = $_POST['price'];

    $sql = "INSERT INTO products (name, price) VALUES (:name, :price)";
    $stmt = $pdo->prepare($sql);

    if ($stmt->execute(['name' => $name, 'price' => $price])) {
        echo "Produk ditambahkan!";
    } else {
        echo "Gagal !";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>insert_product</title>
</head>

<body>
    <form method="POST" action="insert_product.php">
        <label for="name">Nama Produk:</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="price">Harga Produk:</label>
        <input type="number" id="price" name="price" required step="0.01">
        <br>
        <input type="submit" value="Tambah">
    </form>
</body>

</html>