<?php
include "../koneksi.php";
$id = $_GET['id'];
$ambil = mysqli_query($koneksi, "SELECT * FROM user WHERE id='$id'");
$result2 = mysqli_fetch_array($ambil);
?>

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
          <h3 class="page-title text-dark"> Edit user </h3>
        </div>
        <div class="card mb-4 bg-secondary">
          <div class="card-body">
            
            <form action="" method="POST" enctype="multipart/form-data">
              <div class="mb-3">
                <label for="role" class="form-label text-dark">Role</label>
                <select class="form-control bg-secondary text-dark border-dark" name="role">
                    <option selected disabled>- Choose Category -</option>
                    <?php
                        include('../koneksi.php');
                        $query = mysqli_query($koneksi, "SELECT * FROM `role`");
                        while($result = mysqli_fetch_array($query)){
                    ?>
                        <option value="<?php echo $result['id'] ?>"> <?php echo $result['role'] ?> </option>
                    <?php } ?>
                </select>
              </div>

              <div class="mb-3">
                <label for="email" class="form-label text-dark">Email address</label>
                <input type="email" class="form-control bg-secondary text-dark" id="email" name="email" required value="<?php echo $result2['email'] ?>">
              </div>

              <div class="mb-3">
                <label for="name" class="form-label text-dark">Name</label>
                <input type="text" class="form-control bg-secondary text-dark" id="name" name="name" required value="<?php echo $result2['name'] ?>">
              </div>

              <div class="mb-3">
                <label for="password" class="form-label text-dark">Password</label>
                <input type="text" class="form-control bg-secondary text-dark" id="password" name="password" required value="<?php echo $result2['password'] ?>">
              </div>

              <input type="submit" class="btn btn-primary" name="submit"></input>
              <a href="user_admin.php" class="btn btn-dark">Cancel</a>
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

    $query2 = mysqli_query($koneksi, "UPDATE user set
    id_role = '$_POST[role]',
    email = '$_POST[email]',
    `name` = '$_POST[name]',
    `password` = '$_POST[password]' WHERE id = '$id'
    ");

    if($query2){
        echo "<script>
            alert('Edit User berhasil !');
            document.location='user_admin.php';
            </script>";
    }
    else {
        echo "<script>
            alert('Maaf, terjadi kesalahan saat mencoba edit User !');
            document.location='user_admin.php';
            </script>";
    }
  }
?>