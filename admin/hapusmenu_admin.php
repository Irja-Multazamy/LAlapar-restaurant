<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM menu WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('Berhasil hapus menu !');
            document.location='menu_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus menu !');
            document.location='menu_admin.php';
            </script>";
    }
}