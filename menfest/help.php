<?php
session_start();

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

    <link rel="stylesheet" href="style/help.css?v=<?php echo time(); ?>">

    <title>Help</title>
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
        </div>
        <!-- awal acordation -->

        <div class="fag-container text-light mt-4">
            <div class="fag-el">
                <div class="fag-head">
                    <h3>Bagaimana Merequest pesan ?</h3>
                    <img src="img/arrow-down.svg" alt="">
                </div>
                <p>isi form yang ada di <a href="request">form</a> ini.</p>
            </div>
            <div class="fag-el">
                <div class="fag-head">
                    <h3>Kenapa request pesan ku tidak diterima ?</h3>
                    <img src="img/arrow-down.svg" alt="">
                </div>
                <p>Admin menolak meneruskan pesan, karena pesan tidak sesuai dengan pedoman komunitas.</p>
            </div>
            <div class="fag-el">
                <div class="fag-head">
                    <h3>Bagaimana menjadi admin ?</h3>
                    <img src="img/arrow-down.svg" alt="">
                </div>
                <p>admin dipilih dengan developer. contact <a href="https://kevinalmer.netlify.app/contact"
                        target="_blank">developer</a></p>
            </div>
        </div>
    </div>
    <!-- akhir acordation -->

    <!-- Optional JavaScript; choose one of the two! -->
    <script src="js/help.js"></script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    -->
</body>

</html>