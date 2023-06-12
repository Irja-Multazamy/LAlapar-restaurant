<?php
    include('../koneksi.php');
    session_start();
    $pengunjung = $_SESSION['name'];

    include('../koneksi.php');
    $query = mysqli_query($koneksi, "INSERT INTO pengunjung VALUE('', '$pengunjung')");

    // mengambil id pengunjung untuk pesanan
    $query2 = mysqli_query($koneksi, "SELECT id FROM pengunjung");
    $id = mysqli_num_rows($query2);
    $_SESSION['id'] = $id;
    //

    if($query){
        header('location: dashboard_user.php');
    }
?>