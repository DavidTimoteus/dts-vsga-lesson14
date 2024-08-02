<?php
require 'connect_and_create_table.php';

$min_price = 0;
$products = [];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $min_price = $_POST['min_price'];

    $sql = "SELECT name, price FROM products WHERE price > :min_price";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':min_price', $min_price, PDO::PARAM_STR);
    $stmt->execute();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>filter_product</title>
</head>

<body>
    <h1>Filter Produk Berdasarkan Harga</h1>
    <form method="POST" action="filter_product.php">
        <label for="min_price">Harga Minimum:</label>
        <input type="number" id="min_price" name="min_price">
        <input type="submit" value="Filter">
    </form>

    <h2>Daftar Produk</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Harga</th>
        </tr>
        <?php if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                </tr>
        <?php
            }
        } else {
            echo '<tr><td colspan="2">0 result</td></tr>';
        }
        ?>
    </table>
</body>

</html>