<?php


require "functions/functions.php";


if(isset($_POST["submit"])){
    if(tambah($_POST) > 0){
        echo"<script>alert('berhasil')</script>";
    }else{
        echo"<script>alert('gagal')</script>";
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/request.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous" />
    <title>request message</title>
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
                        <?php if(isset($_SESSION['login'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link" href="change.php">Change password</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="logout.php">Logout</a>
                        </li>
                        <?php endif;?>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- akhir nav -->
        <!-- awal form -->
        <form action="" method="post" class="mt-4">
            <div class="form-input">
                <label for="pengirm" class="text-light">From </label>
                <input class="form-control text-light" type="text" id="pengirim" name="pengirim" placeholder="Kevin"
                    required>
            </div>
            <div class="form-input">
                <label for="penerima" class="text-light">To </label>
                <input class="form-control text-light" type="text" id="penerima" name="penerima" placeholder="kerin"
                    required>
            </div>
            <div class="form-input">
                <label for="pesan" class="text-light">message </label>
                <textarea class="form-control text-light" placeholder="i hate you!!" id="pesan" name="pesan"
                    required></textarea>
            </div>
            <div class="form-input mt-3">
                <button class="btn btn-dark border-light" type="submit" name="submit">Requset message</button>
            </div>
        </form>
        <!-- akhir form -->

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>