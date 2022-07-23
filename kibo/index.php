<?php
session_start();
require 'function/functions.php';

$blogs = query("SELECT * FROM `blog`");

if(isset($_SESSION['login'])){
    $login = true;
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Kibo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous" />
    <link rel="stylesheet" href="style/index.css?v=<?php echo time(); ?>">
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
    <div class="container">
        <!-- jumbotron -->
        <div class="row mt-4">
            <div class="p-4 p-md-5 mb-4 rounded text-bg-dark jumbotron">
                <div class="col-md-6 px-0">
                    <h1 class="display-4 heading">Kibo</h1>
                    <h1 class="display-6 fst-italic">Terhubung dengan cerita cerita.</h1>
                    <p class="lead my-3">Baca cerita yang mencerahakan Harimu?</p>
                    <p class="lead mb-0"><a href="lihat.php?b=1" class="text-white fw-bold">Continue reading...</a></p>
                </div>
            </div>
        </div>
        <!-- akhir jumbotron -->
        <!-- awal cards -->
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
        <!-- akhir cards -->
        <!-- awal footer -->
        <div class="container">
            <footer class="py-3 my-4">
                <ul class="nav justify-content-center border-bottom pb-3 mb-3">
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Help</a></li>
                    <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About us</a></li>
                </ul>
                <p class="text-center text-muted">&copy; 2022 kibo, Inc</p>
            </footer>
        </div>
        <!-- akhir footer -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous">
    </script>
</body>

</html>