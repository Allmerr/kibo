<?php

require "functions/functions.php";


if(!isset($_SESSION['login'])){
    echo"<script>document.location.href='login.php'</script>";
}


$all_pesan = query("SELECT * FROM `pesan`");

$kosong = true;


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/admin.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <title>admin</title>
</head>

<body class="bg-dark">
    <div class="container">
        <!-- awal nav -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm-top">
            <div class="container">
                <a class="navbar-brand logo-nav" href="index.php">Kampak Menfest</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="request.php">Request</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="admin.php">Admin</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="help.php">Help</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="change.php">Change password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir nav -->
        <!-- awal form -->
        <?php foreach($all_pesan as $pesan) :?>
        <?php if($pesan["tampil"] === "tunggu") : ?>
        <?php $kosong = false;?>
        <div class="card bg-dark border-light mt-4">
            <div class="card-body text-light">
                <p class="text-card"><span>From </span><span>: <?= $pesan["pengirim"]?></span></p>
                <p class="text-card"><span>To </span><span>: <?= $pesan["penerima"]?></span></p>
                <p class="text-card"><span>Message </span><span>: <?= $pesan["pesan"]?></span></p>
                <p class="date-card text-secondary"><?= $pesan["tanggal"]?></p>
                <button class="btn btn-dark border-danger"><a
                        href="adminFun.php?delete=<?= $pesan["id"]?>">Decline</a></button>
                <button class="btn btn-dark border-success"><a
                        href="adminFun.php?accept=<?= $pesan["id"]?>">Accept</a></button>
            </div>
        </div>
        <?php endif;?>
        <?php endforeach;?>
        <?php if($kosong) : ?>
        <div class="alert alert-dark mt-4" role="alert">
            Request Kosong!
        </div>
        <?php endif;?>
        <!-- akhir form -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>