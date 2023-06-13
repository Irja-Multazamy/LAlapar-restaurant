<?php
include "../koneksi.php";

if(isset($_GET['id'])){ 
    
    $hapus = mysqli_query($koneksi,"DELETE FROM pesanan WHERE id='$_GET[id]'");

    if($hapus){
        echo "<script>
            alert('Berhasil hapus menu dari pesanan !');
            document.location='pesanan.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba hapus menu dari pesanan !');
            document.location='pesanan.php';
            </script>";
    }
}