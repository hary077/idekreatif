<?php
//menghubungkan file konfigurasi database
include 'config.php';

//memulai sesi php
session_start();

//mendapatkan id pengguna dari sesi
$userId = $_SESSION ["user_id"];

//menangani from untuk menambahkan postingan baru
if (insset($_POST['simpan'])){
    //mendaptakan data dari from
    $postTitle = $_POST["post_title"];
    $content = $_POST["content"];
    $categoryId = $_POST["category_id"];

    //mmengatur direktor penyimpanan file gambar
    $imageDir = "assets/img/uploads/";
    $imageName =$_FILES["image"]["name"];
    $imagePath =$imageDir .basename($imageName);

    if (move_uploaded_file($_FILES["image"]["tmp_name"],$imagePath)) {
        $query = "INSERT INTO posts (post_title, content,created_at,category_id,user_id,image_path) VALUES
        ('$postTitle','$content',NOW(), $categoryId,$userId,'imagePath')";
        
        if($conn->query($query) === TRUE) {
            $_SESSION['notification'] = [
                'type' =>'primary',
                'message' => 'Error adding post:  ' .$conn->error
            ];
        }
    }eles{
        $_SESSION['notification'] = [
            'type' => 'danger',
            'message' => 'Failed to upload image.'
        ];
    }

    header('location: dashboard.php');
    exit();
}