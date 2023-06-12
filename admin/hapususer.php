<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM user WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('User berhasil dihapus !');
            document.location='user_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus user !');
            document.location='user_admin.php';
            </script>";
    }
}