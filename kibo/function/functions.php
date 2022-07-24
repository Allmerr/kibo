<?php 

// koneksi database
$conn = mysqli_connect('localhost','root','kusumapos','kibo');


// fungsi untuk mencari element dalam database
function query($perintah){
    global $conn;

    $req = mysqli_query($conn,$perintah);

    $res = [];
    
    while($row = mysqli_fetch_assoc($req)){
        $res[] = $row;
    }
    
    return $res;
}

function tambah(){
    global $conn;

    $judul = htmlspecialchars($_POST['judul']);
    $tema = htmlspecialchars($_POST['tema']);
    $pengarang = htmlspecialchars($_POST['pengarang']);
    $isi = htmlspecialchars($_POST['isi']);
    $judul = htmlspecialchars($_POST['judul']);
    $tanggal = date('j F y');
    $gambar = upload();
    $pemilik = $_SESSION['username'];

    if(!$gambar){
        return 0;
    }

    // `id`, `judul`, `pengarang`, `tanggal`, `cerita`, `tema`, `gambar`, `disukai`
    mysqli_query($conn,"INSERT INTO `blog` VALUES('','$judul','$pengarang', '$tanggal', '$isi', '$tema', '$gambar', '0', '$pemilik')");

    return mysqli_affected_rows($conn);

}

function upload(){

    $name = $_FILES["gambar"]["name"];
    $tmp_name = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
    $size = $_FILES["gambar"]["size"];

    if($error !== 0){
        echo "<script>alert('gambar tidak dimasukan')</script>";
        return false;
    }

    $ekstensiValid = ["jpg","jpeg","png"];
    $ekstensiUser = explode(".", $name);
    $ekstensiUser = strtolower(end($ekstensiUser));
    if(!in_array($ekstensiUser,$ekstensiValid)){
        echo "<script>alert('bukan gambar')</script>";
        return false;
    }

    if($size > 10000000){
        echo "<script>alert('size gambar terlalu besar')</script>";
        return false;
    }
    
    $unik = uniqid();
    move_uploaded_file($tmp_name, "img/$unik.$ekstensiUser");
    

    return "$unik.$ekstensiUser";
}

function register($data){
    global $conn;
    $username = strtolower(stripslashes($data["username"]));
    $pwd = $data["password"];
    $pwd2 = $data["password2"];
    $nama = $data["nama"];
    $tentang = $data["tentang"];
    $gambar = upload();

    if(!$gambar){
        return false;
    }

    if(query("SELECT * FROM `users` WHERE `users`.`username` = '$username'")){
        echo"<script>alert('username sudah digunakan!')</script>";
        return false;
    };

    if($pwd !== $pwd2){
        echo"<script>alert('konfirmasi password gagal')</script>";
        return false;
    }

    $pwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_query($conn, "INSERT INTO `users` VALUES('','$username','$pwd', '$nama', '$tentang', '$gambar')");

    return mysqli_affected_rows($conn);
}

function login($data){
    global $conn;
    $username = strtolower($data["username"]);
    $pwd = $data["password"];

    $res = query("SELECT * FROM `users` WHERE `users`.`username` = '$username'");
    
    if($res){
        if(password_verify($pwd, $res[0]["password"])){
            echo"<script>alert('berhasil login!');document.location.href='index.php';</script>";
            return 1;
        }
    }
    return 0;

}

function change(){
    
        global $conn;
        $username = $_SESSION['username'];
        $oldPassword = $_POST['oldPassword'];
        $newPassword = $_POST['newPassword'];
    
        $valid = query("SELECT * FROM `users` WHERE `username` = '$username'")[0];
    
        if(!$valid){
            return 0;
        }
    
        if(!password_verify($oldPassword,$valid["password"])){
            return 0;
        }
    
        $newPassword = password_hash($newPassword,PASSWORD_DEFAULT);
    
        mysqli_query($conn, "UPDATE `users` SET `password` = '$newPassword' WHERE `users`.`username` = '$username'");
    
        return mysqli_affected_rows($conn);
    
        
    }
    
function ubah($data){
    global $conn;
    
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $tentang = htmlspecialchars($data["tentang"]); 
        $gambar = $data["gambarlama"];
    
    
        if($_FILES["gambar"]["error"] === 0){
            $gambar = upload();
        }
    
        mysqli_query($conn, "UPDATE `users` SET  `nama` = '$nama', `tentang` = '$tentang', `gambar` = '$gambar' WHERE `users`.`id` = $id");
    
        return mysqli_affected_rows($conn);
    }

?>