<?php


require"functions/functions.php";

if(!isset($_SESSION['login'])){
    echo"<script>document.location.href='login.php'</script>";
}

if(isset($_POST['submit'])){
    if(change() > 0){
        echo"<script>alert('ganti password berhasil');document.location.href='logout.php';</script>";
    }else{
        echo"<script>alert('ganti password gagal')</script>";
    }
}

?>


<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change password</title>
    <link rel="stylesheet" href="style/change.css?v=<?php echo time(); ?>">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>

<body class="bg-dark">

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
        <form action="" method="post" class="mt-4">
            <div class="form-input">
                <label for="oldPassword" class="text-light">old password</label>
                <input class="form-control text-light" type="password" id="oldPassword" name="oldPassword"
                    placeholder="kusuma" required>
            </div>
            <div class="form-input">
                <label for="newPassword" class="text-light">new password </label>
                <input class="form-control text-light" type="password" id="newPassword" name="newPassword"
                    placeholder="KusumaPos" required>
            </div>
            <div class="form-input mt-3">
                <button class="btn btn-dark border-light" type="submit" name="submit">Change</button>
            </div>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
</body>

</html>