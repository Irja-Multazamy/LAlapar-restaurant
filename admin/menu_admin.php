<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAlapar Restaurant | Admin</title>

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
      include('sidebar_admin.php');
    ?>
  
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title text-dark"> Menu </h3>
        </div>

        <div class="card bg-light border-dark col-12">
            <div class="page-header pt-2">
                <h3 class="page-title text-success"> Disetujui </h3>
            </div>
            <div class="row">
                <?php 

                include('../koneksi.php');
                $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE status = 'active'");

                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                ?>

                <?php foreach($result as $result) : ?>

                <div class="col-6 col-lg-3 col-md-4 col-sm-6 grid-margin stretch-card">
                    <div class="card bg-secondary">
                        <a class="position-absolute text-decoration-none" style="color: white; background: green; padding: 2px; border-radius: 4px; padding-left: 5px; padding-right: 5px;"><?php echo $result['status'] ?></a>
                        <img src="../img/<?php echo $result['img'] ?>" class="card-img-top w-100 h-50" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark"><?php echo $result['nm_menu'] ?></h5>
                            <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result['price']); ?></label>
                        <table>
                            <tr>
                                <td align='center' width="75px"><a href="hapusmenu_admin.php?id=<?php echo $result['id']  ?>" onclick="return confirm('Yakin akan menghapus menu ini?')" class="btn btn-danger btn-sm btn-block">Hapus</a></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>

            <?php endforeach; ?>

            </div>
        </div>

        <div class="card bg-light border-dark col-12">
            <div class="page-header pt-2">
                <h3 class="page-title text-warning"> Menunggu persetujuan </h3>
            </div>
            <div class="row">
                <?php 

                include('../koneksi.php');
                $query2 = mysqli_query($koneksi, "SELECT * FROM menu WHERE status = 'nonactive'");

                $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                ?>

                <?php foreach($result2 as $result2) : ?>

                <div class="col-6 col-lg-3 col-md-4 col-sm-6 grid-margin stretch-card">
                    <div class="card bg-secondary">
                        <a class="position-absolute text-decoration-none" style="color: white; background: black; padding: 2px; border-radius: 4px; padding-left: 5px; padding-right: 5px;"><?php echo $result2['status'] ?></a>
                        <img src="../img/<?php echo $result2['img'] ?>" class="card-img-top w-100 h-50" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark"><?php echo $result2['nm_menu'] ?></h5>
                            <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result2['price']); ?></label>
                        <table>
                            <tr>
                                <td align='center' width="75px"><a href="setujui_menu.php?id=<?php echo $result2['id']  ?>" class="btn btn-warning btn-sm btn-block">Setujui</a></td>
                                <td align='center' width="75px"><a href="hapusmenu_admin.php?id=<?php echo $result2['id']  ?>" onclick="return confirm('Yakin akan menghapus menu ini?')" class="btn btn-danger btn-sm btn-block">Hapus</a></td>
                            </tr>
                        </table>
                    </div>
                    </div>
                </div>

            <?php endforeach; ?>

            </div>
        </div>

      </div>
    </div>
  </div>
  <!-- plugins:js -->
  <script src="js/vendor.bundle.base.js"></script>
  <script src="js/off-canvas.js"></script>
  <!-- inject:js -->
  <script src="js/misc.js"></script>
</body>
</html>