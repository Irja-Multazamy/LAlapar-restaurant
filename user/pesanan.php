<?php
include "../koneksi.php";
error_reporting(0);
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
                    <h3 class="page-title text-dark"> Pesanan Anda </h3>
                </div>
                <div class="col-12 grid-margin stretch-card">
                    <div class="card bg-secondary">
                        <div class="card-body">
                            <table class="text-dark">
                                <tr>
                                    <td width="80"> Nama </td>
                                    <td width="20"> : </td>
                                    <td> 
                                        <?php
                                            echo $_SESSION['name'];
                                        ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="80" height="50"> Tanggal </td>
                                    <td width="20"> : </td>
                                    <td> 
                                        <?php
                                            echo $_SESSION['tanggal'];
                                        ?>
                                    </td>
                                </tr>
                            </table>
                            <div class"row col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered pt-2">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>No</th>
                                                <th>Menu</th>
                                                <th>Harga</th>
                                                <th>Jumlah</th>
                                                <th>Total</th>
                                                <th>Pilihan</th>
                                            </tr>
                                        </thead>

                                        <?php
                                        include "../koneksi.php";
                                        $id = $_SESSION['id'];
                                        $datapesanan = mysqli_query($koneksi, "SELECT * FROM pesanan WHERE id_pengunjung = '$id'");
                                        $no = 1;
                                            while ($tampil = mysqli_fetch_array($datapesanan)){
                                                $total = $tampil['total'];
                                                $subtotal+=$total;
                                                ?>
                                                <tr>
                                                    <td align='center'><?php echo $no++ ?></td>
                                                    <td><?php echo $tampil['menu']?></td>
                                                    <td><?php echo $tampil['harga']?></td>
                                                    <td><?php echo $tampil['jumlah']?></td>
                                                    <td><?php echo $tampil['total']?></td>
                                                    <td><a href="hapus_pesanan.php?id=<?php echo $tampil['id']  ?>" onclick="return confirm('Yakin akan menghapus menu ini dari pesanan?')" class="btn btn-danger">Hapus</a></td>
                                                </tr>
                                            <?php  
                                            }?>
                                            
                                                <tr>
                                                    <th colspan="4">Sub Total</th>
                                                    <th colspan="2">Rp. <?php echo number_format($subtotal) ?></th>
                                                </tr>
                                                
                                        </table>
                                    </div>
                                </div>
                                <form method="POST" action="" class="pt-2">
                                    <a href="dashboard_user.php" class="btn btn-dark">Tambah Pesanan</a>
                                    <button class="btn btn-success" name="konfirm">Konfirmasi</button>
                                </form>

                                <?php
                                if(isset($_POST['konfirm'])){
                                    echo    "<script>
                                            alert('Pesanan berhasil dikonfirmasi !');
                                            document.location='nota.php';
                                            </script>"; 
                                }
                                ?>
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