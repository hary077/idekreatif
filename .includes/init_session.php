<?php
session_start();

$name = $_SESSION["name"];
$role = $_SESSION["role"];

// Ambil notifikasi jika ada, kemudian hapus dari sesi
$notification = $_SESSION['notification'] ?? null;
if ($notification) {
    // Kode untuk menampilkan notifikasi bisa ditambahkan di sini
    // Contoh: echo "<div class='alert alert-info'>$notification</div>";
}
unset($_SESSION['notification']);