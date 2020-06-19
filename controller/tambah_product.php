<?php 
if(!isset($_POST['tambah'])){
    header("Location:../index.php");
}
include "koneksi.php";
$nama = $_POST["nama"];
$desk = $_POST["deskripsi"];
$tanggal = date("Y-m-d");
//data foto 
$foto = $_FILES["gambar"]["name"];
$tmp = $_FILES["gambar"]["tmp_name"];
$path = "../asset/img/foto_product/".$foto;

    //jika foto berhasil dipindahkan
    if(move_uploaded_file($tmp,$path)){
        $sql = "insert into product value('','$nama',\"$desk\",'$foto','$tanggal')";
        $query = mysqli_query($koneksi,$sql);
        if($query){
            session_start();
            $_SESSION["sukses"] = "<div class=\"alert alert-success\" role=\"alert\">
            Berhasil Menambahkan Product
          </div>";
            //hapus foto lama
            header("Location:../profil.php");
        }else{
            die(mysqli_error($koneksi));
        }
    }