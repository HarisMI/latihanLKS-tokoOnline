<?php 
    session_start();
    if($_GET['id']){
        include "controller/koneksi.php";
        //tampilkan product
        $id = $_GET['id'];
        $sql_product = "select * from product where id=$id";
        $query = mysqli_query($koneksi, $sql_product);
        $data = mysqli_fetch_array($query);
        if(!$data){
            die("404 not found");
        }
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/deskripsi.css">
</head>
<body>
<nav class="nav">
  <a class="nav-link active" href="index.php">Home</a>
  <a class="nav-link" href="profil.php"><?php echo $_SESSION["nama_user"]?></a>
  <a  class="nav-link" href="controller/logout.php">Logout</a>
</nav>
    <div class="container mt-5">

        <div class="card mb-3 border-light" style="max-width: 1200px;">
            <div class="row no-gutters">
                <div class="col-md-4">
                <img src="asset/img/foto_product/<?php echo $data['gambar']?>" class="card-img" alt="...">
                </div>
                <div class="col-md-8">
                <div class="card-body">
                    <h1 class="card-title"><?php echo $data['product']?></h1>
                    <p class="card-text"><small class="text-muted"><?php echo $data['tanggal_publish']?></small></p>
                </div>
                </div>
            </div>
            </div>
        <h1>Deskripsi</h1>
        <p>
        <?php echo $data["deskripsi"]; ?>
        </p>
        </div>
</body>
</html>