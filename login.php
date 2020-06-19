<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="lib/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="asset/css/style.css">
</head>
<body>
    <!-- <center>
    <div class="container">
        <h1>Login</h1>
        <form action="controller/proses_login.php" method="POST" autocomplete = "off">
            <p><input type="text" name="nama"></p>
            <p><input type="password" name="password"></p>
            <p><input type="submit" name="login" value="Login">
                <a href="signup.php">Sign Up</a>
            </p>
        </form>
    </div>
    </center> -->

    <div class="containerr mt-5">
        <form action="controller/proses_login.php" method="POST" autocomplete = "off">
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title text-center">Login</h5>
                    <h6 class="card-subtitle mb-2 mt-4 text-muted"> 
                        <?php 
                        session_start();
                        if(isset($_SESSION["error"])){
                            echo $_SESSION["error"];
                            session_unset();
                        } ?>
                    </h6>
                    <div class="form-group card-text">
                        <label for="exampleInputEmail1">Nama</label>
                        <input type="text" name="nama" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group card-text">
                        <label for="exampleInputEmail1">Password</label>
                        <input type="password" name="password" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <input type="submit" name="login" value="Login">
                    <a href="signup.php" class="card-link">Sign Up</a>
                </div>
            </div>
        </form>
    </div>
</body>
</html>