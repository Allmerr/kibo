<?php

require "functions/functions.php";

if(isset($_POST["submit"])){
    if(login($_POST) > 0){
        $_SESSION['login'] = true;
        $_SESSION['username'] = $_POST["username"];
        echo"<script>alert('berhasil login!');document.location.href='admin.php'</script>";
    }else{
        $gagal_login = true;
    }
}



?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="style/login.css?v=<?php echo time(); ?>">

    <title>Login</title>
</head>

<body class="bg-dark">
    <div class="container">
        <div class="container">
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
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
        <div class="container-form">
            <form action="" method="post" class="mt-4">
                <?php if(isset($gagal_login)) : ?>
                <p style="font-style:italic;color:red;">Password atau username salah!</p>
                <?php endif;?>
                <div class="form-input">
                    <label for="username" class="text-light">Username </label>
                    <input class="form-control text-light" type="text" id="username" name="username" placeholder="Kevin"
                        required>
                </div>
                <div class="form-input">
                    <label for="password" class="text-light">Password </label>
                    <input class="form-control text-light" type="password" id="password" name="password"
                        placeholder="******" required>
                </div>
                <div class="form-input mt-3">
                    <button class="btn btn-dark border-light" type="submit" name="submit">Login</button>
                </div>
            </form>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        -->
</body>

</html>