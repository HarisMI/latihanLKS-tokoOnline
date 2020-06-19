<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
            <div class="container">
            <h1>Sign Up</h1>
                <form action="controller/proses_signup.php" method="POST" enctype="multipart/form-data">
                    <p>Nama : <input type="text" name="nama" required></p>
                    <p>Password : <input type="password" name="password" required></p>
                    <p>Jenis Kelamin : 
                        <input type="radio" name="jk" value="laki-laki" required>Laki - Laki
                        <input type="radio" name="jk" value="perempuan">Perempuan
                    </p>
                    <p>Foto : <input type="file" name="gambar" id=""></p>
                    <p><input type="submit" name="daftar" value="Daftar"></p>
                </form>
            </div>
</body>
</html>