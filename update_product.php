<?php
require 'connect_and_create_table.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $price_updated = $_POST['price_updated'];

    $sql = "UPDATE products SET price = :price_updated WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':price_updated', $price_updated);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        echo "Harga diperbarui!";
    } else {
        echo "Gagal Memperbarui !";
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>update_product</title>
</head>

<body>
    <h1>Edit Harga</h1>
    <form method="POST" action="update_product.php">
        <label for="id">Id Produk:</label>
        <input type="number" id="id" name="id" required>
        <br>
        <label for="price_updated">Harga Terbaru:</label>
        <input type="number" id="price_updated" name="price_updated" required step="0.01">
        <br>
        <input type="submit" value="Perbarui">
    </form>
</body>

</html>