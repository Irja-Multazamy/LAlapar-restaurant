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
          <h3 class="page-title"> Create new slide </h3>
        </div>
        <div class="card mb-4">
          <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="caption" class="form-label">Caption</label>
                <input type="text" class="form-control" id="caption" name="caption" required>
              </div>

              <div class="mb-3">
                <label for="image" class="form-label">Slider Image</label>
                <input class="form-control" type="file" name="image" id="image" accept=".jpg, .jpeg, .png., .webp">
              </div>

              <input type="submit" class="btn btn-primary" name="submit"></input>
              <a href="slide_staff.php" class="btn btn-secondary">Cancel</a>
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
    $caption = $_POST['caption'];
    $namaFile = $_FILES['image']['name'];
    $tmpFile = $_FILES['image']['tmp_name'];
    move_uploaded_file($tmpFile, '../img/' . $namaFile);

    $insert = mysqli_query($koneksi, "INSERT INTO slide VALUES ('', '$caption', '$namaFile', 'nonactive')");

    if($insert){
        echo "<script>
            alert('Slide berhasil ditambahkan, menunggu persetujuan !');
            document.location='slide_staff.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba tambah slide !');
            document.location='slide_staff.php';
            </script>";
    }
  }
?>