<?php
include "../koneksi.php";
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id='$id'");
$result2 = mysqli_fetch_array($ambil);

$insert = mysqli_query($koneksi, "UPDATE menu set
    `status` = 'active' WHERE id = '$id'
");

if($insert){
    echo "<script>
        alert('Menu disetujui !');
        document.location='menu_admin.php';
        </script>";
}
?>