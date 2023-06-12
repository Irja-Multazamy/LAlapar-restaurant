<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LAlapar Restaurant</title>

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- bootstrap -->
    <link href="asset/bootstrap.min.css" rel="stylesheet">

    <!-- css -->
    <link href="asset/style.css" rel="stylesheet">
</head>
<body>
    <!-- navbar -->
    <div class="bg-white p-0">
        <?php
            include('navbar.php');
        ?>
        <!-- slide-->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                include('koneksi.php');
                $i = 0;
                
                $sql = "SELECT * FROM slide WHERE `status` = 'active'";
                $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
                while($data = mysqli_fetch_array($query)){ ?>
        
                    <?php
                        $active = '';
                        if ($i == 0){
                            $active = 'active';
                        }
                    ?>
                    <li data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $active; ?>"></li>
                <?php $i++ ; }
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                include('koneksi.php');
            
                $sql = "SELECT * FROM slide WHERE `status` = 'active' ORDER BY id DESC";
                $query = mysqli_query($koneksi, $sql) or die (mysqli_error($koneksi));
            
                $i = 0;
                while($data = mysqli_fetch_array($query)){ ?>
            
                    <?php
                        $active = '';
                        if ($i == 0){
                            $active = 'active';
                        }
                    ?>
            
                    <div class="carousel-item <?php echo $active; ?>" data-bs-interval="3000">
                        <img src="img/<?php echo $data['img'] ?>" class="d-block w-100" alt="{{ $slider->image }}">
                        <div class="carousel-caption d-none d-md-block">
                            <p><?php echo $data['caption'] ?></p>
                        </div>
                    </div>
            
                <?php $i++; } ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <div class="content-wrapper">
            <div class="container">
                <div class="pt-4 pb-4" align="center">
                    <h2>Welcome to LAlapar Restaurant</h2>
                    <p>Silahkan lihat menu yang sesuai dengan selera anda <br> Enjoy your meal</p>
                </div>

                <table class="mb-3">
                    <form class="form-inline" action="" method="POST">
                        <div class="form-group">
                        <tr>
                            <td><input type="text" class="form-control" id="cari" name="cari" autocomplete="off" placeholder="search menu"></td>
                            <td align="right" width="100"><input class="btn btn-secondary" type="submit" value="search"></td>
                        </tr>
                        </div>
                    </form>
                </table>

                <div class="row">
                    <?php 
            
                    include('koneksi.php');
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
                            <img src="img/<?php echo $result['img'] ?>" class="card-img-top w-100" height="150px" alt="...">
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold text-dark"><?php echo $result['nm_menu'] ?></h5>
                                <label class="card-text text-success" style="margin-right: 10px;"><strong>Rp.</strong> <?php echo number_format($result['price']); ?></label>
                            </div>
                        </div>
                    </div>
            
                <?php endforeach; ?>
            
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>