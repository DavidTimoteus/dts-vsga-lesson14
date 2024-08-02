<?php
require 'db_connect.php';

// Kode Lama
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute(["username" => $username, "email" => $email]);

echo "User berhasil ditambahkan";

// Kode Modifikasi
$username = $_POST['username'];
$email = $_POST['email'];

$sql = "INSERT INTO users (username, email) VALUES (:username, :email)";
$stmt = $pdo->prepare($sql);

$stmt->execute(["username" => $username, "email" => $email]);
$stmt->bindParam(':username', $name);
$stmt->bindParam(':email', $email);

$name = "Budi";
$email = "budi@gmail.com";

$stmt->execute();

echo "User berhasil ditambahkan";

/** Dari hasil modifikasi kode diatas dapat saya simpulkan bahwa dengan menggunakan
 *  prepare dan bindParam maka data yang di inputkan akan lebih aman dikarenakan query sql
 *  akan dipersiapakan sebagai parameter prepare lalu diikat oleh bindParam
 */
