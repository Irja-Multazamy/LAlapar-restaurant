<?php
  session_start();
  $email = $_SESSION['email'];
?>

<div class="container-scroller bg-primary">
  <nav class="sidebar sidebar-offcanvas" id="sidebar">
    <div class="sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top">
      <!-- <a class="sidebar-brand brand-logo" style="color: #FEA116; font-family: nunito; text-decoration: none; font-weight: 900;" href="#">L A <span style="color: white;">l a p a r.</span></a> -->
      <a class="sidebar-brand brand-logo" href="#"><img src="../img/logo.png" alt="logo" /></a>
      <a class="sidebar-brand brand-logo-mini" style="color: #FEA116; font-family: nunito; text-decoration: none; font-weight: 900;" href="#">L A</span></a>
    </div>
    <ul class="nav">
      <li class="nav-item menu-items">
        <a class="nav-link" href="dashboard_user.php">
          <span class="menu-icon">
            <i class="mdi mdi-speedometer"></i>
          </span>
          <span class="menu-title">Dashboard</span>
        </a>
      </li>
  
      <li class="nav-item menu-items">
        <a class="nav-link" href="pesanan.php">
          <span class="menu-icon">
            <i class="mdi mdi-cart-arrow-down"></i>
          </span>
          <span class="menu-title">Pesanan</span>
        </a>
      </li>

      <li class="nav-item menu-items">
        <a class="nav-link" href="ulasan_user.php">
          <span class="menu-icon">
            <i class="mdi mdi-lead-pencil"></i>
          </span>
          <span class="menu-title">Ulasan</span>
        </a>
      </li>
  
      
    </ul>
  </nav>
  <!-- partial -->
  <div class="container-fluid page-body-wrapper">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar p-0 fixed-top d-flex flex-row">
      <div class="navbar-menu-wrapper flex-grow d-flex align-items-stretch justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="mdi mdi-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item dropdown">
            <a class="nav-link" id="profileDropdown" href="#" data-toggle="dropdown">
              <div class="navbar-profile">
                <span class="menu-icon">
                    <i class="mdi mdi-account"></i>
                </span>
                <p class="mb-0 d-none d-sm-block navbar-profile-name">User</p>
                <i class="mdi mdi-menu-down d-none d-sm-block"></i>
              </div>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="profileDropdown" style="min-width: 300px;">
                <div class="dropdown-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon">
                            <i class="mdi mdi-gmail text-success"></i>
                            <a href="#" class="text-light text-decoration-none position-fixed ml-2"><?php echo $email; ?></a>
                        </div>
                    </div>
                </div>
                <div class="dropdown-item">
                    <div class="preview-thumbnail">
                        <div class="preview-icon">
                            <i class="mdi mdi-logout text-danger"></i>
                            <a href="../logout.php" class="text-light text-decoration-none position-fixed ml-2 w-100">Logout</a>
                        </div>
                    </div>
                </div>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="mdi mdi-format-line-spacing"></span>
        </button>
      </div>
    </nav>
</div>
</div>