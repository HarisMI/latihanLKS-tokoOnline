<?php
include "controller/koneksi.php";
session_start();
if(!$_SESSION['nama_user']){
    header('Location:login.php');
}
//tampilkan product
$sql_product = "select * from product";
$query = mysqli_query($koneksi, $sql_product);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/index.css">
</head>
<body>
<nav class="nav">
  <a class="nav-link active" href="index.php">Home</a>
  <a class="nav-link" href="profil.php"><?php echo $_SESSION["nama_user"]?></a>
  <a  class="nav-link" href="controller/logout.php">Logout</a>
</nav>
    <header>
        <div class="banner">
        </div>
    </header>
    <div class="container">
        <h1 class="text-center"><u>Product</u></h1>
        <div class="row row-cols-1 row-cols-md-3">
            <?php while($product = mysqli_fetch_array($query)){ ?>
            <a href="deskripsi.php?id=<?php echo $product['id'] ?>" style="text-decoration:none;color:black">
                <div class="col mb-4">
                    <div class="card">
                    <img src="asset/img/foto_product/<?php echo $product['gambar']?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $product['product'];?></h5>
                        <p class="card-text"><small class="text-muted"><?php echo $product['tanggal_publish'];?></small></p>
                    </div>
                    </div>
                </div>
            </a>
            <?php } ?>
        </div>
    </div>
</body>
</html>