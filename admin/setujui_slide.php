<?php
include "../koneksi.php";
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM slide WHERE id='$id'");
$result2 = mysqli_fetch_array($ambil);

$insert = mysqli_query($koneksi, "UPDATE slide set
    `status` = 'active' WHERE id = '$id'
");

if($insert){
    echo "<script>
        alert('Slide disetujui !');
        document.location='slide_admin.php';
        </script>";
}
?>