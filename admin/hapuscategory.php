<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM category WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('Berhasil hapus kategori !');
            document.location='category_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus kategori !');
            document.location='category_admin.php';
            </script>";
    }
}