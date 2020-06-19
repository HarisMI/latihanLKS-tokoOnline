<?php
include "koneksi.php";
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $jk = $_POST["jk"];

    //data foto
    $nama_foto = $_FILES["gambar"]["name"];
    $tmp = $_FILES["gambar"]["tmp_name"];
    $path = "../asset/img/foto_profil/".$nama_foto;


if (move_uploaded_file($tmp,$path)) {
    $sql = "insert into user value('','$nama','$password','$jk','$nama_foto')";

    $tambah = mysqli_query($koneksi,$sql);

    if($tambah){
        session_start();
        $_SESSION['nama_user'] = $nama;
        header("Location:../index.php");
    }else{
        die(mysqli_error($koneksi));
    }
}



