<?php

session_start();

$conn = mysqli_connect("localhost","root","kusumapos","menfest");

function query($perintah){
    global $conn;

    $req = mysqli_query($conn,$perintah);

    $return = [];

    while ($res = mysqli_fetch_assoc($req)) {
        $return[] = $res;
    }

    return $return;

}

function tambah($data){
    global $conn;

    $pengirim = $data["pengirim"];
    $penerima = $data["penerima"];
    $pesan = $data["pesan"];
    $tanggal = date("j F y");

    mysqli_query($conn,"INSERT INTO `pesan` VALUES('','$pengirim', '$penerima', '$pesan', '$tanggal', 'tunggu')");

    return mysqli_affected_rows($conn);

}

function hapus($id){
    global $conn;

    mysqli_query($conn, "DELETE FROM `pesan` WHERE `pesan`.`id` = $id");

    return mysqli_affected_rows($conn);
}

function accept($id){
    global $conn;

    mysqli_query($conn, "UPDATE `pesan` SET `tampil` = 'true' WHERE `pesan`.`id` = $id");

    return mysqli_affected_rows($conn);
}

function login($data){
    global $conn;

    $username = $data["username"];
    $password = $data["password"];

    $valid = query("SELECT * FROM `admin` WHERE `username` = '$username'")[0];

    if(!$valid){
        return 0;
    }

    if(!password_verify($password,$valid['password'])){
        return 0;
    }

    return 1;

}

function change(){
//UPDATE `pesan` SET `pesan` = 'makan sate yu!a' WHERE `pesan`.`id` = 13

    global $conn;
    $username = $_SESSION['username'];
    $oldPassword = $_POST['oldPassword'];
    $newPassword = $_POST['newPassword'];

    $valid = query("SELECT * FROM `admin` WHERE `username` = '$username'")[0];

    if(!$valid){
        return 0;
    }

    if(!password_verify($oldPassword,$valid["password"])){
        return 0;
    }

    $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);

    mysqli_query($conn, "UPDATE `admin` SET `password` = '$newPassword' WHERE `admin`.`username` = '$username'");

    return mysqli_affected_rows($conn);

    
}

?>