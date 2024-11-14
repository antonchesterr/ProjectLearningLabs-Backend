<?php
$host = 'localhost';
$user = 'root';
$password = '';
$database = 'todo_list';

// buat koneksi
$conn = new mysqli($host, $user, $password, $database);

// cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
