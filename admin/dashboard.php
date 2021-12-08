<?php
 ob_start();
 session_start();
 
 if($_SESSION['id'] == null) {
   header('Location: index.php');
 }

 require_once '../vendor/autoload.php';

 $login = new App\Classes\Login();

 if(isset($_GET['logout'])) {
     $login->adminLogout();
 }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/backend/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/backend/img/favicon.png">
  <title>
    <?php
    if(isset($title)) {
      if($title == 'Add Category') {
        echo $title;

      }elseif($title == 'Manage Category') {
        echo $title;

      }elseif($title == 'Edit Category') {
        echo $title;

      }elseif($title == 'Add Product') {
        echo $title;

      }elseif($title == 'Edit Product') {
        echo $title;

      }elseif($title == 'Manage Product') {
        echo $title;

      }elseif($title == 'Manage Order') {
        echo $title;

      }elseif ($title == 'View Order') {
        echo $title;

      }

    }else {
      echo 'Dashboard';

    }
    ?>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/backend/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/backend/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/backend/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
  <link id="pagestyle" href="../assets/backend/css/soft-ui-dashboard.css?v=1.0.3" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-100">
  <!-- Sidebar -->
  <?php include 'includes/sidebar.php'; ?>
  <!-- End Sidebar -->
  <main class="main-content position-relative max-height-vh-100 h-100 mt-1 border-radius-lg ">
    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- End Header -->
    
    <!-- Content -->
    <?php
    if(isset($pages)) {
      if($pages == 'add-category') {
        include 'pages/add-category-content.php';

      }elseif($pages == 'manage-category') {
        include 'pages/manage-category-content.php';
        
      }elseif($pages == 'edit-category') {
        include 'pages/edit-category-content.php';

      }elseif($pages == 'add-product') {
        include 'pages/add-product-content.php';

      }elseif($pages == 'manage-product') {
        include 'pages/manage-product-content.php';

      }elseif($pages == 'edit-product') {
        include 'pages/edit-product-content.php';
        
      }elseif($pages == 'manage-order') {
        include 'pages/manage-order-content.php';

      }elseif($pages == 'view-order') {
        include 'pages/view-order-content.php';

      }

    }else {
      include 'pages/home-content.php';

    }
    ?>
    <!-- End Content -->
      
  </main>
  
  <!--   Core JS Files   -->
  <script src="../assets/backend/js/core/popper.min.js"></script>
  <script src="../assets/backend/js/core/bootstrap.min.js"></script>
  <script src="../assets/backend/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/backend/js/plugins/smooth-scrollbar.min.js"></script>
  <script src="../assets/backend/js/plugins/chartjs.min.js"></script>
 
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/backend/js/soft-ui-dashboard.min.js?v=1.0.3"></script>
</body>

</html>