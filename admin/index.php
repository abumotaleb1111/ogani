<?php
  session_start();

  if(isset($_SESSION['id'])) {
    header('Location: dashboard.php');
  }

  require_once '../vendor/autoload.php';
  
  $login = new App\Classes\Login();

  $message = "";
  if(isset($_POST['btn'])) {
    $message = $login->adminLoginCheck($_POST);
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
    Admin Login
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
  <section class="min-vh-100 mb-8">
    <div class="page-header align-items-start min-vh-50 pt-5 pb-11 m-3 border-radius-lg" style="background-image: url('../assets/backend/img/curved-images/curved14.jpg');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5 text-center mx-auto">
            <h1 class="text-white mb-2 mt-5">Ogani</h1>
            <!-- <p class="text-lead text-white">Online grocery shopping and delivery in Bangladesh.</p> -->
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row mt-lg-n10 mt-md-n11 mt-n10">
        <div class="col-xl-4 col-lg-5 col-md-7 mx-auto">
          <div class="card z-index-0">
            <div class="card-header text-center pt-4">
              <h5>Admin Login</h5>
              <h6 style="color: red;"><?php echo $message; ?></h6>
            </div>
            
            <div class="card-body">

              <form role="form text-left" action="" method="POST">
                <div class="mb-3">
                  <input type="email" class="form-control" name="email" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                </div>
                <div class="mb-3">
                  <input type="password" class="form-control" name="password" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                </div>
                <div class="form-check form-check-info text-left">
                  <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault" checked>
                  <label class="form-check-label" for="flexCheckDefault">
                    Remember me
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2" name="btn">Sign in</button>
                </div>
              </form>

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!--   Core JS Files   -->
  <script src="../assets/backend/js/core/popper.min.js"></script>
  <script src="../assets/backend/js/core/bootstrap.min.js"></script>
  <script src="../assets/backend/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/backend/js/plugins/smooth-scrollbar.min.js"></script>
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