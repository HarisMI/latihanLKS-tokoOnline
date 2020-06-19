<?php
session_start();
if(!$_SESSION["nama_user"]){
    header("Location:login.php");
}
if(!$_POST["nama"]){
    header("Location:index.php");
}
include "koneksi.php";
$nama = $_POST["nama"];
$password = $_POST["password"];
$jk = $_POST["jk"];
//data foto
$nama_foto = $_FILES["gambar"]["name"];
$tmp = $_FILES["gambar"]["tmp_name"];
$path = "../asset/img/foto_profil/".$nama_foto;

if($nama_foto !== ""){
    //ambil data foto lama dulu
    $sql = "select foto from user where nama ='$nama'";
    $query_foto = mysqli_query($koneksi,$sql);
    $data_foto = mysqli_fetch_array($query_foto);
    $nama_foto_lama = $data_foto["foto"];
    $path_foto_lama = "../asset/img/foto_profil/".$nama_foto_lama;

    //jika foto sekarang berhasil dipindahkan
    if(move_uploaded_file($tmp,$path)){
        $sql = "update user set password='$password',jenis_kelamin='$jk',foto='$nama_foto' where nama = '$nama' ";
        $query = mysqli_query($koneksi,$sql);
        if($query){
            $_SESSION["sukses"] = "<div class=\"alert alert-success\" role=\"alert\"> Berhasil Mengupdate Data</div>";
            //hapus foto lama
            unlink($path_foto_lama);
            header("Location:../profil.php");
        }else{
            die(mysqli_error($koneksi));
        }
    }

}else{
    $sql = "update user set password='$password',jenis_kelamin='$jk' where nama = '$nama' ";
        $query = mysqli_query($koneksi,$sql);
        if($query){
            $_SESSION["sukses"] = "Berhasil Mengupdate Data";
            header("Location:../profil.php");
        }else{
            die(mysqli_error($koneksi));
        }
}




