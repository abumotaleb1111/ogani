<?php
ob_start();
session_start();

?>


<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ogani | Online Grocery Shopping and Delivery in Bangladesh</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="assets/frontend/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="assets/frontend/css/style.css" type="text/css">
</head>

<body>
    <!-- Page Preloder -->
    <!-- <div id="preloder">
        <div class="loader"></div>
    </div> -->

    <!-- Header -->
    <?php include 'includes/header.php'; ?>
    <!-- Header -->

    

    <!-- Content -->
    <?php
    if(isset($pages)) {
        if($pages == 'shop') {
            include 'pages/shop-content.php';

        }elseif($pages == 'category') {
            include 'pages/category-content.php';

        }elseif($pages == 'product-details') {
            include 'pages/product-details-content.php';

        }elseif($pages == 'cart') {
            include 'pages/cart-content.php';

        }elseif($pages == 'checkout') {
            include 'pages/checkout-content.php';

        }elseif($pages == 'shipping') {
            include 'pages/shipping-content.php';

        }elseif($pages == 'payment') {
            include 'pages/payment-content.php';
            
        }elseif ($pages == 'customer-home') {
            include 'pages/customer-home-content.php';
            
        }

    }else {
        include 'pages/home_content.php';
    }
    ?>
    <!-- Content -->

    

    <!-- Footer  -->
    <?php include 'includes/footer.php'; ?>
    <!-- Footer  -->

    <!-- Js Plugins -->
    <script src="assets/frontend/js/jquery-3.3.1.min.js"></script>
    <script src="assets/frontend/js/bootstrap.min.js"></script>
    <script src="assets/frontend/js/jquery.nice-select.min.js"></script>
    <script src="assets/frontend/js/jquery-ui.min.js"></script>
    <script src="assets/frontend/js/jquery.slicknav.js"></script>
    <script src="assets/frontend/js/mixitup.min.js"></script>
    <script src="assets/frontend/js/owl.carousel.min.js"></script>
    <script src="assets/frontend/js/main.js"></script>

</body>

</html>