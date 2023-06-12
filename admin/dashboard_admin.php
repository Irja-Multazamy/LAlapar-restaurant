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
    
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="page-header">
          <h3 class="page-title text-light"> Dashboard </h3>
        </div>
        <div class="row">
          <?php
            include('../koneksi.php');
            $query1 = mysqli_query($koneksi,"SELECT * FROM user");
            $result = mysqli_num_rows($query1);
  
            $query2 = mysqli_query($koneksi,"SELECT * FROM menu");
            $result2 = mysqli_num_rows($query2);
  
            $query3 = mysqli_query($koneksi,"SELECT * FROM pesanan");
            while ($resul3 = mysqli_fetch_array($query3)){
              $total[] = $resul3['total'];
              }
              $semua = array_sum($total);
  
            $query4 = mysqli_query($koneksi,"SELECT * FROM slide");
            $result4 = mysqli_num_rows($query4);
          ?>
  
          <div class="col-xl-3 col-md-6">
              <div class="card bg-primary text-white mb-4">
                  <div class="card-body">User</div>
                  <div class="card-footer d-flex align-items-center justify-content-between pl-4">
                      <a class="small text-white stretched-link text-decoration-none"><?php echo $result; ?></a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-warning text-white mb-4">
                  <div class="card-body">Menu</div>
                  <div class="card-footer d-flex align-items-center justify-content-between pl-4">
                      <a class="small text-white stretched-link text-decoration-none"><?php echo $result2; ?></a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-success text-white mb-4">
                  <div class="card-body">Pemasukan</div>
                  <div class="card-footer d-flex align-items-center justify-content-between pl-4">
                  <a class="small text-white stretched-link text-decoration-none" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($semua); ?></a>
                  </div>
              </div>
          </div>
          <div class="col-xl-3 col-md-6">
              <div class="card bg-danger text-white mb-4">
                  <div class="card-body">Slide</div>
                  <div class="card-footer d-flex align-items-center justify-content-between pl-4">
                      <a class="small text-white stretched-link text-decoration-none"><?php echo $result4; ?></a>
                  </div>
              </div>
          </div>
        </div>
      
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card corona-gradient-card">
              <div class="card-body py-0 px-0 px-sm-3">
                <div class="row align-items-center">
                  <div class="col-4 col-sm-3 col-xl-2">
                    <img src="../img/Group126@2x.png" class="gradient-corona-img img-fluid" alt="">
                  </div>
                  <div class="col-5 col-sm-7 col-xl-8 p-0">
                    <h4 class="mb-1 mb-sm-0">Lihat source code?</h4>
                    <p class="mb-0 font-weight-normal d-none d-sm-block">Silahkan cek Github, source code terlampir!</p>
                  </div>
                  <div class="col-3 col-sm-2 col-xl-2 pl-0 text-center">
                    <span>
                      <a href="https://github.com/Irja-Multazamy/LAlapar-restaurant" target="_blank" class="btn btn-outline-light btn-rounded get-started-btn">Go to Github</a>
                    </span>
                  </div>
                </div>
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