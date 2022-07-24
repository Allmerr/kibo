<?php

session_start();
require 'function/functions.php';

$id = $_GET['b'];
$blog = query("SELECT * FROM `blog` WHERE id = $id")[0];

if(isset($_SESSION['login'])){
    $login = true;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title><?= $blog['judul']?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/lihat.css?v=<?php echo time(); ?>">
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
                        <a class="nav-link" href="lihatku.php">Tambah Cerita</a>
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
    <div class="container">
        <!-- awal blog -->
        <div class="row border border-secondary rounded p-2 text-center my-4 blog">
            <h2 class="mt-2"><?= $blog['judul']?></h2>
            <img src="img/<?= $blog['gambar']?>" class="gambar-blog py-4">
            <div class="text-blog">
                <p class="text-left"><?= $blog['cerita']?></p>
            </div>
            <p><?= $blog['pengarang']?> - <?= $blog['tanggal']?></p>
            <p>Tentang : <?= $blog['tema']?></p>
            <a href="about.php?user=<?= $blog['pemilik']?>">penulis</a>
        </div>
        <!-- akhir blog -->
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>