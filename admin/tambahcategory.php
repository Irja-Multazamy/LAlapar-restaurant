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
          <h3 class="page-title text-dark"> Create new category </h3>
        </div>
        <div class="card mb-4 bg-secondary">
          <div class="card-body">
            
            <form action="" method="POST">
              <div class="mb-3">
                <label for="category" class="form-label text-dark">category</label>
                <input type="text" class="form-control bg-secondary text-dark" id="category" name="category" required>
              </div>

              <input type="submit" class="btn btn-primary" name="submit"></input>
              <a href="category_admin.php" class="btn btn-dark">Cancel</a>
            </form>
  
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

<?php
include("../koneksi.php");

if(isset($_POST['submit'])){
    $category = $_POST['category'];

    $insert = mysqli_query($koneksi, "INSERT INTO category VALUES ('', '$category')");

    if($insert){
        echo "<script>
            alert('Category berhasil ditambahkan !');
            document.location='category_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba tambah kategori !');
            document.location='category_admin.php';
            </script>";
    }
  }
?>