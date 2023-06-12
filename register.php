<!DOCTYPE html>
<html>
<head>
    <title>LAlapar Restaurant | Register</title>
    <link rel="stylesheet" type="text/css" href="asset/login.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="asset/login.css">
</head>
<body>
    <a href="login.php" style="font-size: 40px; color: white;" ><i class="bi bi-arrow-left-short"></i></a>
    <div class="login-form">
        <h1>Form Registrasi</h1>
        <form action="" method="post">
            <p>Email</p>
            <input type="email" name="email" placeholder="name@example.com">
            <p>Name</p>
            <input type="text" name="name" placeholder="nama anda">
            <p>Password</p>
            <input type="password" name="password" placeholder="Masukkan password">
            <input type="submit" name="simpan" value="Simpan">
        </form>
    </div>
</body>
</html>

<?php
include "koneksi.php";

if(isset($_POST['simpan'])){
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = $_POST['password'];

    $insert = mysqli_query($koneksi, "INSERT INTO user VALUES ('', 3, '$email', '$name', '$password')");

    if($insert){
        echo    "<script>
                    alert('Registrasi berhasil !');
                    document.location='login.php';
                </script>";
    }
    else {
        echo    "<script>
                    alert('Registrasi gagal !');
                    document.location='login.php';
                </script>";
    }
}
?>