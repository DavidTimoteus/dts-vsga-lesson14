<?php
require 'connect_and_create_table.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $sql = "DELETE FROM products WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id);

    if ($stmt->execute()) {
        if ($stmt->rowCount() > 0) {
            echo "Data dengan ID " . $id . " berhasil dihapus!";
        } else {
            echo "Produk Tidak ada !";
        }
    } else {
        echo "Gagal menghapus data! " . $stmt->errorInfo()[2];
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>delete_product</title>
</head>

<body>
    <h1>Hapus Produk</h1>
    <form method="POST" action="delete_product.php">
        <label for="id">Id Produk:</label>
        <input type="number" id="id" name="id" required>
        <input type="submit" value="Hapus">
    </form>
</body>

</html>