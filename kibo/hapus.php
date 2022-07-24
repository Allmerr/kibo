<?php
session_start();
require 'function/functions.php';

if(!isset($_SESSION['login'])){
    echo"<script>document.location.href='index.php'</script>";
}

$blog_id = $_GET['idBlog'];

$blog = query("SELECT * FROM `blog` WHERE id = $blog_id")[0];

if(!$blog){
    echo"<script>alert('gagal!, blog tidak ditemukan!');document.location.href='lihatku.php'</script>";
    exit;
}

if($_SESSION['username'] !== $blog['pemilik']){
    echo"<script>alert('gagal!, tidak diizinkan!');document.location.href='lihatku.php'</script>";
    exit;
}

mysqli_query($conn, "DELETE FROM `blog` WHERE id = $blog_id");

echo"<script>alert('berhasil mengahapus blog!');document.location.href='lihatku.php'</script>";


?>