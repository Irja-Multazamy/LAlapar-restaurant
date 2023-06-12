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
            <div class="pt-3 pb-3 text-dark" align="center">
                <h2><b>Welcome to LAlapar Restaurant</b></h2>
                <p>Silahkan pesan menu yang sesuai dengan selera anda <br> Enjoy your meal</p>
            </div>
    
            <table class="mb-3">
                <form class="form-inline" action="" method="POST">
                    <div class="form-group">
                    <tr>
                        <td><input type="text" class="form-control bg-secondary" id="cari" name="cari" autocomplete="off" placeholder="search menu"></td>
                        <td align="right" width="100"><input class="btn btn-dark" type="submit" value="search"></td>
                    </tr>
                    </div>
                </form>
            </table>
    
            <div class="row">
                <?php 
        
                include('../koneksi.php');
                if(isset($_POST['cari'])){
                    $cari = $_POST['cari'];
                    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE `status` = 'active' and nm_menu LIKE '%".$cari."%'");
                }else{
                    $query = mysqli_query($koneksi, "SELECT * FROM menu WHERE `status` = 'active'");
                }
    
                $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                ?>
        
                <?php foreach($result as $result) : ?>
        
                <div class="col-6 col-lg-3 col-md-4 col-sm-6 grid-margin stretch-card">
                    <div class="card bg-light mb-3">
                        <img src="../img/<?php echo $result['img'] ?>" class="card-img-top w-100" height="150px" alt="...">
                        <div class="card-body">
                            <h5 class="card-title font-weight-bold text-dark"><?php echo $result['nm_menu'] ?></h5>
                            <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result['price']); ?></label>
                            <a href="pesan_menu.php?id=<?php echo $result['id']; ?>" class="btn btn-secondary w-100">Pesan</a>
                        </div>
                    </div>
                </div>
        
            <?php endforeach; ?>
        
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