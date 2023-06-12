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
          <h3 class="page-title text-dark"> User Pages </h3>
        </div>
        <div class="row">
          <div class="col-lg-10 grid-margin stretch-card">
            <div class="card bg-secondary">
              <div class="card-body">
                <h4 class="card-title text-dark">User</h4>
                <a class="btn btn-primary mb-3" href="tambahuser.php" role="button">Create New</a>
                <div class="table-responsive">
                  <table class="table table-secondary">
                    <thead>
                      <tr>
                        <th> # </th>
                        <th> Email </th>
                        <th> Name </th>
                        <th> Role </th>
                        <th> Action </th>
                      </tr>
                    </thead>
                    <?php
                      include('../koneksi.php');
                      $query2 = mysqli_query($koneksi, "SELECT * FROM `role` inner join user on user.id_role = role.id");
                      $result2 = mysqli_fetch_all($query2, MYSQLI_ASSOC);
                      $no = 1;
  
                      foreach($result2 as $result2) : ?>
  
                    <tbody>
                      <tr>
                        <td> <?php echo $no++ ?> </td>
                        <td> <?php echo $result2['email'] ?> </td>
                        <td> <?php echo $result2['name'] ?> </td>
                        <td> <?php echo $result2['role'] ?> </td>
                        <td>
                            <a href="edituser.php?id=<?php echo $result2['id']  ?>" class="btn btn-warning m-1">Edit</a>
                            <a href="hapususer.php?id=<?php echo $result2['id']  ?>" onclick="return confirm('Yakin akan menghapus user ini?')" class="btn btn-danger m-1">Hapus</a>
                        </td>
                      </tr>
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