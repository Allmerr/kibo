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

$data = query("SELECT * FROM `users` WHERE username = '$username'")[0];

if(isset($_POST["submit"])){
    if(ubah($_POST) > 0){
        echo "<script>alert('data berhasil diubah');document.location.href='index.php'</script>";
    }else{
        echo "<script>alert('data gagal dihapus');document.location.href='index.php'</script>";
    }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Ganti Profile</title>
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
    <div class="container">
        <h1 class="text-center mt-4">Ubah profile mu.</h1>
        <!-- awal form -->
        <form action="" method="post" class="mt-4  border border-secondary round" enctype="multipart/form-data">

            <input type="hidden" value="<?= $data['id']?>" name="id">
            <input type="hidden" value="<?= $data['gambar']?>" name="gambarlama">

            <div class="form-input">
                <label for="nama">nama </label>
                <input class="form-control" type="text" id="nama" name="nama" value="<?= $data['nama']?>" required>
            </div>
            <div class="form-input">
                <label for="tentang">tentang </label>
                <input class="form-control" type="text" id="tentang" name="tentang" value="<?= $data['tentang']?>"
                    required>
            </div>
            <div class=" form-input">
                <label for="gambar">gambar </label>
                <input class="form-control" type="file" id="gambar" name="gambar"
                    placeholder="https://source.unsplash.com/400x400">
            </div>
            <p>*semua tidak wajib</p>
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