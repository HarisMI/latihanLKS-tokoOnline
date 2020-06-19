<?php
    session_start();
    if(!$_SESSION["nama_user"]){
        header("Location:login.php");
    }
    if($_SESSION["nama_user"] !== $_GET["nama"]){
        header("Location:index.php");
    }

    include "controller/koneksi.php";
    $nama = $_SESSION["nama_user"];
    //tampilkan nama, dan jenis kelamin
    $sql = "select * from user where nama = '$nama'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);
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
<nav class="nav">
  <a class="nav-link active" href="index.php">Home</a>
  <a class="nav-link" href="profil.php"><?php echo $_SESSION["nama_user"]?></a>
</nav>
<div class="container">
    <form action="controller/proses_edit_profil.php" method="POST" enctype="multipart/form-data">

        <div class="form-group">
            <label for="exampleInputEmail1">Nama</label>
            <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $data['nama']?>">
        </div>

        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1" value="<?php echo $data['password']?>" id="" >
        </div>

        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="exampleRadios1" value="laki-laki" <?php if($data['jenis_kelamin'] == "laki-laki"){
                echo "checked";
            }?>>
            <label class="form-check-label" for="exampleRadios1">
               Laki-Laki
            </label>
            </div>
            <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="jk" id="exampleRadios2" value="perempuan" <?php if($data['jenis_kelamin'] == "perempuan"){
                echo "checked";
            }?>>
            <label class="form-check-label" for="exampleRadios2">
                Perempuan
            </label>
        </div>

        <div class="form-group mt-3">
            <label for="exampleFormControlFile1">Foto</label>
            <input type="file" class="form-control-file" id="exampleFormControlFile1" name="gambar">
        </div>
        <br/>
        <input type="submit" value="Edit" name="edit" class="btn btn-primary mt-4">
    </form>
</div>
</body>
</html>