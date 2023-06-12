<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM `role` WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('Berhasil hapus role !');
            document.location='role_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus role !');
            document.location='role_admin.php';
            </script>";
    }
}