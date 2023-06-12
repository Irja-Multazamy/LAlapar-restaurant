<?php
include "../koneksi.php";
$id_menu = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM menu WHERE id='$id_menu'");
$result = mysqli_fetch_array($ambil);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAlapar Restaurant | User</title>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

  <!-- plugins:css -->
  <link rel="stylesheet" href="asset/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="asset/vendors/css/vendor.bundle.base.css">

  
  <link rel="stylesheet" href="asset/style.css">
</head>
<body>
  <div class="container-scroller">
    
    <?php
      include('sidebar_user.php');
    ?>
    
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="page-header">
                <h3 class="page-title text-dark"> Detail menu </h3>
            </div>
            <div class="card bg-light col-12">
                <div class="row">
                        <img src="../img/<?php echo $result['img'] ?>" class="card-img-top w-50" alt="...">
                    
                    <div class="card bg-light col-6">
                        <div class="card-body text-dark">
                            <h3><b><?php echo $result['nm_menu'] ?></b></h3>
                            <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result['price']); ?></label>
                            <form class="form-inline mt-2 mt-lg-3" action="" method="POST">
                                <div class="mb-3 w-100">
                                <input type="text" value="<?php echo $result['nm_menu'] ?>" name="nm_menu" hidden>
                                <input type="number" value="<?php echo $result['price'] ?>" name="price" hidden>
                                    <input type="number" class="form-control bg-secondary text-dark w-100 h-50" name="jumlah" placeholder="jumlah menu" required>
                                </div>
                                <div class="mb-3">
                                    <input type="submit" class="btn btn-primary" name="submit" value="Pesan"></input>
                                    <a href="dashboard_user.php" class="btn btn-secondary">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
      <!-- partial -->
  </div>
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <!-- inject:js -->
  <script src="js/misc.js"></script>
</body>
</html>

<?php
if(isset($_POST['submit'])){
    include "../koneksi.php";

    session_start();
    $idpengunjung = $_SESSION['id'];
    $menu = $_POST['nm_menu'];
    $price = $_POST['price'];
    $jumlah = $_POST['jumlah'];
    $total = $price*$jumlah;
    $tanggal = date('Y,m,d');
    $_SESSION['tanggal'] = $tanggal;

    $insert = mysqli_query($koneksi, "INSERT INTO pesanan VALUES ('', '$idpengunjung', '$menu', '$price', '$jumlah', '$total', '$tanggal')");
    if($insert){
        echo "<script>
            alert('Menu akan dimasukkan ke dalam pesanan anda !');
            document.location='pesanan.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba pesan menu !');
            document.location='pesanan.php';
            </script>";
    }
}
?>