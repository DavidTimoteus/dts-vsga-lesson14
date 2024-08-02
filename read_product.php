<?php
require 'connect_and_create_table.php';

$sql = "SELECT name, price FROM products";
$stmt = $pdo->prepare($sql);
$stmt->execute();
?>

<!DOCTYPE html>
<html>

<head>
    <title>read_product</title>
</head>

<body>
    <h1>Daftar Barang</h1>
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
            echo '<tr><td colspan="2">0 Results</td></tr>';
        }
        ?>
    </table>
</body>

</html>