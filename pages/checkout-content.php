<?php
require_once 'vendor/autoload.php';

$application = new App\Classes\Application();

if(isset($_POST['btn'])) {
    $application->saveCustomerInfo($_POST);
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
            <h4>You have to Login to complete your order. If you are not registered, then register now!</h4>
                    <div class="row">
                        <div class="col-lg-8 col-md-6">
                        <h4>Registration Form</h4>
                            
                            <form action="" method="POST">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="checkout__input"  style="width: 100%;">
                                        <p>Fist Name<span>*</span></p>
                                        <input type="text" name="first_name">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="checkout__input">
                                        <p>Last Name<span>*</span></p>
                                        <input type="text" name="last_name">
                                    </div>
                                </div>
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
                                        <p>Password<span>*</span></p>
                                        <input type="password" name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="checkout__input">
                                <p>Phone<span>*</span></p>
                                <input type="text" name="phone">
                            </div>
                            <div class="checkout__input">
                                <p>Address<span>*</span></p>
                                <input type="text" placeholder="Street Address" name="address" class="checkout__input__add">
                            </div>
                            <div class="checkout__input">
                                <p>Town/City<span>*</span></p>
                                <input type="text" name="city">
                            </div>
                            <button type="submit" name="btn" style="width: 100%;" class="site-btn">Sign Up</button>
                        </div>
                        </form>

                        <div class="col-lg-4 col-md-6">
                            <form action="" method="post">
                            <h4>Login Form</h4>
                            <div class="checkout__input">
                                <p>Email<span>*</span></p>
                                <input type="text" name="email">
                            </div>
                            <div class="checkout__input">
                                <p>Password<span>*</span></p>
                                <input type="password" name="password">
                            </div>
                            <button type="submit" name="btn" style="width: 100%;" class="site-btn">Sign In</button>
                        </div>
                        </form>
                    </div>
              
            </div>
        </div>
    </section>
    <!-- Checkout Section End -->