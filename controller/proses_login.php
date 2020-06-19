<?php

if(isset($_POST["nama"])){
    session_start();
    include "koneksi.php";
    $nama = $_POST["nama"];
    $password = $_POST["password"];


    $sql = "select * from user where nama = '$nama'";
    $data = mysqli_query($koneksi, $sql);
    $datas = mysqli_fetch_array($data);

    if($data){
        if($datas['nama'] == $nama AND $datas['password'] == $password){
            $_SESSION['nama_user'] = $nama;
            header("Location:../index.php");
        }else{
            $_SESSION["error"] = "<div class='alert alert-danger' role='alert'>
            Username atau Password Salah
          </div>";
            header("Location:../login.php");
        }
    }else{
            die(mysqli_error($koneksi));
        }
}

// include "koneksi.php";
//  $nama = $_POST["nama"];
//  $password = $_POST["password"];


//  $sql = "select * from user where nama = '$nama'";
//  $data = mysqli_query($koneksi, $sql);
//  $datas = mysqli_fetch_array($data);

//  if($data){
//     if($datas['username'] == $username AND $datas['password'] == $password){
//         echo "anda berhasil Login";
//         $error = "Username atau Password salah";
//     }else{
//         header("Location:../login.php");
//     }
//  }else{
//     die(mysqli_error($koneksi));
//  }