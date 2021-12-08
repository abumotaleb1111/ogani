<?php
require_once 'vendor/autoload.php';

$application = new App\Classes\Application();

if(isset($_POST['btn'])) {
    $application->saveShippingInfo($_POST);
}


?>

  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/frontend/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Checkout</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Checkout</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Checkout Section Begin -->
    <section class="checkout spad">
        <div class="container">
        
            <div class="checkout__form">
            <h4 style="text-align: center;">Hello, <?php echo $_SESSION['customer_name']; ?>! You have to give us shipping info to complete your order.</h4>
                    <div class="row" style="display: flex; flex-direction: column; align-items: center;">
                        <div class="col-lg-8 col-md-6">
                        <h4>Shipping Form</h4>
                            
                            <form action="" method="POST">
                            <div class="checkout__input">
                                <p>Full Name<span>*</span></p>
                                <input type="text" name="fullname">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                            <p>Email<span>*</span></p>
                                            <input type="email" name="email">
                                        </div>
                                    </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Phone<span>*</span></p>
                                        <input type="text" name="phone">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <button type="submit" name="btn" style="width: 100%;" class="site-btn">Proceed to payment</button>
                        </div>
                        </form>

                    </div>
              
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->