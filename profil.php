<?php
    session_start();
    if(!$_SESSION["nama_user"]){
        header("Location:login.php");
    }
    include "controller/koneksi.php";
    $nama = $_SESSION["nama_user"];

    //tampilkan nama, dan jenis kelamin
    $sql = "select * from user where nama = '$nama'";
    $query = mysqli_query($koneksi, $sql);
    $data = mysqli_fetch_array($query);

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
    <link rel="stylesheet" href="asset/css/profil.css">
</head>
<body>
<nav class="nav">
  <a class="nav-link active" href="index.php">Home</a>
  <a class="nav-link" href="profil.php"><?php echo $_SESSION["nama_user"]?></a>
  <a  class="nav-link" href="controller/logout.php">Logout</a>
</nav>
<?php 
if(isset($_SESSION['sukses'])){
    echo $_SESSION['sukses'];
    unset($_SESSION['sukses']);
}?>

    <div class="card mb-3 mt-3 ml-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="asset/img/foto_profil/<?php echo $data['foto']?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php echo $data["nama"]?></h5>
                <p class="card-text"><?php echo $data["jenis_kelamin"] ?></p>
                <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
            </div>
            </div>
        </div>
    </div>
    <p><a href="tambah_product.php" class="btn btn-primary ml-3">Tambah Product</a></p>
    <p><a class="btn btn-success ml-3" href="edit_profil.php?nama=<?php echo $data['nama']?>">Edit</a></p>

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