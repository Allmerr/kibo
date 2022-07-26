<?php

session_start();
require 'function/functions.php';

if(isset($_SESSION['login'])){
    echo"<script>document.location.href='index.php'</script>";
}



$gagal = false;
if(isset($_POST['submit'])){
    if(login($_POST) > 0){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_POST['username'];
        echo"<script>alert('berhasil login!');document.location.href='tambah.php'</script>";
    }else{
        echo"<script>alert('gagal login!');</script>";
        $gagal = true;
    }
}




?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/login.css?v=<?php echo time(); ?>">
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
                    <?php if(isset($login)) : ?>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><button>logout</button></a>
                    </li>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir nav -->
    <!-- awal register -->
    <div class="container">
        <h1 class="text-center mt-4">Silahkan login</h1>
        <form action="" method="post" class="mt-5  border border-secondary round" enctype="multipart/form-data">
            <?php if($gagal) : ?>
            <p style="font-style:italic;color:red;">username / password salah</p>
            <?php endif; ?>
            <div class="form-input">
                <label for="username">username </label>
                <input class="form-control" type="text" id="username" name="username" placeholder="kevinalmer4"
                    required>
            </div>
            <div class="form-input">
                <label for="password">password </label>
                <input class="form-control" type="password" id="password" name="password" placeholder="******" required>
            </div>
            <div class="form-input mt-3">
                <button class="btn btn-dark border-light" type="submit" name="submit">Login</button>
            </div>
            <p>
                <a href="register.php">belum punya akun</a>
            </p>
        </form>
    </div>
    <!-- akhir register -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>