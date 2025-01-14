<?php
require_once("../config.php");

// Mulai session
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $name = $_POST["name"];
    $password = $_POST["password"];

    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users (username, name, password) VALUES ('$username', '$name', '$hashedPassword')";

    if ($conn->query($sql) === TRUE) {
        // Simpan notifikasi ke dalam session
        $_SESSION['notification'] = [
            'message' => 'Registrasi Berhasil!',
            'type' => 'primary'
        ];
    } else {
        $_SESSION['notification'] = [
            'message' => 'Gagal Registrasi: ' . $conn->error, // Perbaikan: Gunakan $conn->error
            'type' => 'danger'
        ];
    }

    header('Location: login.php');
    exit();
}

$conn->close(); // Pindahkan $conn->close() ke luar blok if ($_SERVER["REQUEST_METHOD"] == "POST")
?>