<?php

require "functions/functions.php";


if(isset($_GET["delete"])){
    if(hapus($_GET["delete"]) > 0){
        echo"<script>alert('berhasil');document.location.href='admin.php';</script>";
    }else{
        echo"<script>alert('gagal');document.location.href='admin.php';</script>";
    }
}

if(isset($_GET["accept"])){
    if(accept($_GET["accept"]) > 0){
        echo"<script>alert('berhasil');document.location.href='admin.php';</script>";
    }else{
        echo"<script>alert('gagal');document.location.href='admin.php';</script>";
    }
}


?>