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
          <h3 class="page-title"> Hero Slides </h3>
        </div>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Tampilan slide landing page</h4>
                <a class="btn btn-primary mb-3" href="tambahslide_staff.php" role="button">Create New</a>
                <div class="table-responsive">
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Caption </th>
                        <th> Image </th>
                        <th> Status </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <?php
                      include('../koneksi.php');

                      $query = mysqli_query($koneksi, "SELECT * FROM slide");
                      $result = mysqli_fetch_all($query, MYSQLI_ASSOC);
                      $no = 1;

                      foreach($result as $result) : ?>

                    <tbody>
                      <tr>
                        <td> <?php echo $no++ ?> </td>
                        <td> <?php echo $result['caption'] ?> </td>
                        <td> <img src="../img/<?php echo $result['img'] ?>" style="height: 50px; width: 140px;"> </td>
                        <td> <a style="color: black; background: white; padding: 2px; border-radius: 4px; padding-left: 5px; padding-right: 5px;"><?php echo $result['status'] ?></a> </td>
                        <td> 
                        <a href="editslide_staff.php?id=<?php echo $result['id']  ?>" class="btn btn-warning m-1">Edit</a>
                        <a href="hapusslide_staff.php?id=<?php echo $result['id']  ?>" onclick="return confirm('Yakin akan menghapus slide ini?')" class="btn btn-danger m-1">Hapus</a>
                        </td>
                      <tr>
                    </tbody>

                    <?php endforeach; ?>

                  </table>
                </div>
              </div>
            </div>
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