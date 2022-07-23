<?php

session_start();
require 'function/functions.php';
$username = $_SESSION['username'];
$blogs = query("SELECT * FROM `blog` WHERE pemilik = '$username'");


if(!isset($_SESSION['login'])){
    echo"<script>document.location.href='login.php'</script>";   
}
$login = true;

if(isset($_POST['submit'])){
    if(tambah() > 0){
        echo"<script>alert('berhasil membuat blog!');document.location.href='index.php'</script>";
    }else{
        echo"<script>alert('gagal membuat blog!');document.location.href='index.php'</script>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tambah Cerita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/tambah.css?v=<?php echo time(); ?>">
</head>

<body>
    <!-- awal nav -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container">
            <a class="navbar-brand" href="index.php">Kibo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link" href="lihatku.php">Lihat Ceritaku</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="tambah.php">Tambah Cerita</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register.php"><button>register</button></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="login.php"><button>login</button></a>
                    </li>
                    <?php if(($login)) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button>logout</button></a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir nav -->
    <div class="container">
        <!-- awal form -->
        <form action="" method="post" class="mt-4  border border-secondary round" enctype="multipart/form-data">
            <div class="form-input">
                <label for="judul">Judul </label>
                <input class="form-control" type="text" id="judul" name="judul" placeholder="Pengaruh Teman yang lucu ?"
                    required>
            </div>
            <div class="form-input">
                <label for="tema">Tema </label>
                <input class="form-control" type="text" id="tema" name="tema" placeholder="keluarga,pertemanan"
                    required>
            </div>
            <div class="form-input">
                <label for="pengarang">pengarang </label>
                <input class="form-control" type="text" id="pengarang" name="pengarang" placeholder="sir. kevin almer"
                    required>
            </div>
            <div class="form-input">
                <label for="isi">Isi </label>
                <textarea class="form-control" placeholder="mempunyai teman yang lucu..." id="isi" name="isi"
                    required></textarea>
            </div>
            <div class="form-input">
                <label for="gambar">gambar </label>
                <input class="form-control" type="file" id="gambar" name="gambar"
                    placeholder="https://source.unsplash.com/400x400" required>
            </div>
            <div class="form-input mt-3">
                <button class="btn btn-dark border-light" type="submit" name="submit">Tambah cerita</button>
            </div>
        </form>
        <!-- akhir form -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>