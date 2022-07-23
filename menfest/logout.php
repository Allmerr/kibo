<?php

session_start();

$_SESSION = [];

session_destroy();

echo"<script>alert('berhasil logout!');document.location.href='admin.php'</script>";


?>