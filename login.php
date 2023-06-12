<!DOCTYPE html>
<html>
<head>
    <title>LAlapar Restaurant | Login</title>
    <link rel="stylesheet" type="text/css" href="asset/login.css">
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="asset/login.css">
</head>
<body>
    <a href="index.php" style="font-size: 40px; color: white;" ><i class="bi bi-arrow-left-short"></i></a>
    <div class="login-form">
        <h1>Form Login</h1>
        <form action="" method="post">
            <p>Email</p>
            <input type="email" name="email" placeholder="name@example.com">
            <p>Password</p>
            <input type="password" name="password" placeholder="Masukkan password">

            <p><a href="register.php" class="text-dark" style="text-decoration: none; color: white; font-size: 15px;">Belum Punya Akun ? Buat Akun Anda !</a></p>
            <input type="submit" name="login" value="Login">

        </form>
    </div>
</body>
</html>

<?php
   include "koneksi.php";
   error_reporting(0);

   if(isset($_POST['login'])) {
       $email = $_POST['email'];
       $pass = $_POST['password'];
   
       if(empty($_POST['email'])){
           echo "<div class='alert' style='background-color: red;'>Email Harus diisi !</div>";
       } else if(empty($_POST['password'])){
           echo "<div class='alert' style='background-color: red;'>Password Harus diisi !</div>";
       }
   
       // Query untuk memilih tabel
       $cek_data = mysqli_query($koneksi, "SELECT * FROM user WHERE email = '$email' AND `password` = '$pass'");
       $hasil = mysqli_fetch_array($cek_data);
       $role = $hasil['id_role'];
       $login_user = $hasil['email'];
       $pembeli = $hasil['name'];
       $row = mysqli_num_rows($cek_data);
   
       //cek pass benar
       if ($row > 0) {
           session_start();
           $_SESSION['email'] = $login_user;
           $_SESSION['name'] = $pembeli;
   
           if ($role == '1') {
               header('location: admin/dashboard_admin.php');
           }elseif ($role == '2') {
               header('location: staff/dashboard_staff.php');
           }elseif ($role == '3') {
            header('location: user/pengunjung.php');
        }
       }else{
           echo "<div class='alert' style='background-color: red;'>Email dan Password tidak sesuai !</div>";
       }
   }
?>