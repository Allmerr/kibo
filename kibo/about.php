<?php


session_start();
require 'function/functions.php';
if(isset($_SESSION['username'])){
    $username = $_SESSION['username'];
    $blogs = query("SELECT * FROM `blog` WHERE pemilik = '$username'");
}

if(!isset($_SESSION['login'])){
    echo"<script>document.location.href='login.php'</script>";
}
$login = true;

// cerita kosong
$cerita_kosong = true;

if(!isset($_GET["user"])){
    echo"<script>document.location.href='index.php';</script>";
}

$user = $_GET["user"];
$data = query("SELECT * FROM `users` WHERE username = '$user'")[0];

$blogs = query("SELECT * FROM `blog` WHERE pemilik = '$user'");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>About</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/about.css?v=<?php echo time(); ?>">
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
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            settings
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="gantiPass.php">Ganti Password</a></li>
                            <li><a class="dropdown-item" href="gantiProf.php">Ganti Profile</a></li>
                        </ul>
                    </div>
                    <?php endif;?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- akhir nav -->
    <!-- awal profile -->
    <div class="container profile">
        <div class="row">
            <img src="img/<?= $data['gambar']?>" alt="" class="img-thumbnail my-4">
            <figure>
                <blockquote class="blockquote text-center">
                    <p><?= $data['tentang']?></p>
                </blockquote>
                <figcaption class="blockquote-footer text-center mt-n2">
                    <?= $data['nama']?>
                </figcaption>
            </figure>
        </div>
    </div>
    <!-- akhir profile -->
    <!-- awal cards -->
    <div class="container">
        <div class="row my-4 cards">
            <?php foreach($blogs as $blog) : ?>
            <div class="row flex-lg-row-reverse align-items-center g-5 py-5 card border-dark">
                <div class="col-10 col-sm-8 col-lg-6">
                    <img src="img/<?= $blog['gambar']?>" class="d-block mx-lg-auto img-fluid" alt="Bootstrap Themes"
                        width="700" height="500" loading="lazy">
                </div>
                <div class="col-lg-6">
                    <h1 class="display-6 fw-bold lh-1 mb-3"><?= $blog['judul']?></h1>
                    <p>made by <?= $blog['pengarang']?> in <?= $blog['tanggal']?></p>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-start">
                        <a href="lihat.php?b=<?= $blog['id']?>">
                            <button type="button" class="btn btn-outline-secondary btn-lg px-4">Lihat</button></a>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
    <!-- akhir cards -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>