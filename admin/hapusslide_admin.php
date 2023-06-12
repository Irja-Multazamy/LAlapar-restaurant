<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM slide WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('Berhasil hapus slide !');
            document.location='slide_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus slide !');
            document.location='slide_admin.php';
            </script>";
    }
}