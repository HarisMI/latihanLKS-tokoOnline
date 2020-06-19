<?php
session_start();
if(!$_SESSION['nama_user']){
    header('Location:login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <form action="controller/tambah_product.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputEmail1">Nama Product</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
        </div>

        <div class="form-group">
            <label for="exampleFormControlTextarea1">Deskripsi</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
        </div>

        <div class="form-group mt-3">
            <label for="exampleFormControlFile1">Foto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
        </div>

        <input type="submit" value="Tambah" name="tambah" class="btn btn-primary mt-4">
    </form>
</div>
</body>
</html>