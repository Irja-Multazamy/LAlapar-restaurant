<!DOCTYPE html>
<html lang="en">
  <head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LAlapar Restaurant | Staff</title>

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

  <!-- plugins:css -->
  <link rel="stylesheet" href="asset/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="asset/vendors/css/vendor.bundle.base.css">

  <!-- bootstrap -->
  <link href="asset/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="asset/style.css">
</head>
<body>
  <div class="container-scroller">  
    <?php
    include('sidebar_staff.php');
    ?>
  
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title text-light"> Menu </h3>
        </div>
        <table>
          <form class="form-inline" action="" method="POST">
            <div class="form-group">
              <tr>
                  <td>
                  <input type="text" class="form-control" id="cari" name="cari" autocomplete="off" placeholder="search menu"></td>
                  <td align="right" width="100"><input class="btn btn-secondary" type="submit" value="search"></td>
                  <td align="right" width="130"><a href="tambahmenu_staff.php" class="btn btn-primary">Create New</a></td>
              </tr>
            </div>
          </form>
        </table>
        
        <div class="row pt-4">
          <?php 
            include('../koneksi.php');

            if(isset($_POST['cari'])){
                $cari = $_POST['cari'];
                $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE nm_menu LIKE '%".$cari."%' ORDER BY `status` ASC");
            }else{
                $query = mysqli_query($koneksi, "SELECT * FROM menu ORDER BY `status` ASC");
            }

            $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
            ?>

            <?php foreach($result as $result) : ?>

              
            <div class="col-6 col-lg-3 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card bg-dark">
                <img src="../img/<?php echo $result['img'] ?>" class="card-img-top w-100 h-50" alt="...">
                <div class="card-body">
                  <h5 class="card-title font-weight-bold text-light"><?php echo $result['nm_menu'] ?></h5>
                  <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result['price']); ?></label>
                  <a style="color: black; background: white; margin-left:2px; padding: 2px; border-radius: 4px; padding-left: 5px; padding-right: 5px;"><?php echo $result['status'] ?></a>
                </div>
                <table>
                  <tr>
                    <td align='center' width="75px"><a href="editmenu_staff.php?id=<?php echo $result['id']  ?>" class="btn btn-warning btn-sm btn-block">Edit</a></td>
                    <td align='center' width="75px"><a href="hapusmenu_staff.php?id=<?php echo $result['id']  ?>" onclick="return confirm('Yakin akan menghapus menu ini?')" class="btn btn-danger btn-sm btn-block">Hapus</a></td>
                  </tr>
                </table>
              </div>
            </div>

            <?php endforeach; ?>
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