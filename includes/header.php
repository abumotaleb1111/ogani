<?php
require_once 'vendor/autoload.php';

$category = new App\Classes\Category();
$application = new App\Classes\Application();

$queryResult1 = $category->getAllPublishCategoryInfo();

if(isset($_GET['logout'])) {
    $application->customerLogout();
}


?>


<!-- Humberger Begin -->
<div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a href="#"><img src="assets/frontend/img/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
            <ul>
                <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                <li><a href="#"><i class="fa fa-shopping-bag"></i> <span><?php echo $_SESSION['total_cart_products']; ?></span></a></li>
            </ul>
            <div class="header__cart__price">item: <span><?php if(isset($_SESSION['order_total'])) { echo $_SESSION['order_total']." TK"; } ?></span></div>
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__language">
                <img src="assets/frontend/img/language.png" alt="">
                <div>English</div>
                <span class="arrow_carrot-down"></span>
                <ul>
                    <li><a href="#">Spanis</a></li>
                    <li><a href="#">English</a></li>
                </ul>
            </div>
            <div class="header__top__right__auth">
                <?php if(!empty($_SESSION['customer_id'])) { ?>
                    <a href="?logout=true"><i class="fa fa-user"></i> Log Out</a>
                <?php }else { ?>
                    <a href="#"><i class="fa fa-user"></i> Log In</a>
                <?php } ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li class="active"><a href="./index.php">Home</a></li>
                <li><a href="./shop.php">Shop</a></li>
                <li><a href="./shoping-cart.html">Shoping Cart</a></li>
                <li><a href="./checkout.html">Check Out</a></li>
                <!-- <li><a href="./contact.html">Contact</a></li> -->
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-linkedin"></i></a>
            <a href="#"><i class="fa fa-pinterest-p"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> hello@ogani.com</li>
                <li>Free Shipping for all Order of 999/-</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> hello@ogani.com</li>
                                <li>Free Shipping for all Order of 999/-</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                                <a href="#"><i class="fa fa-pinterest-p"></i></a>
                            </div>
                            <div class="header__top__right__language">
                                <img src="assets/frontend/img/language.png" alt="">
                                <div>English</div>
                                <span class="arrow_carrot-down"></span>
                                <ul>
                                    <li><a href="#">Spanis</a></li>
                                    <li><a href="#">English</a></li>
                                </ul>
                            </div>
                            <div class="header__top__right__auth">

                            <?php if(!empty($_SESSION['customer_id'])) { ?>
                                <a href="?logout=true"><i class="fa fa-user"></i> Log Out</a>
                            <?php }else { ?>
                                <a href="#"><i class="fa fa-user"></i> Log In</a>
                            <?php } ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="./index.php"><img src="assets/frontend/img/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li class="<?php if(empty($pages)) { echo "active"; } ?>"><a href="./index.php">Home</a></li>
                            <li><a href="./shop.php">Shop</a></li>
                            <li><a href="./cart.php">Shoping Cart</a></li>
                            <li><a href="./checkout.php">Check Out</a></li>
                            <!-- <li><a href="./contact.html">Contact</a></li> -->
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <ul>
                            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
                            <li><a href="cart.php"><i class="fa fa-shopping-bag"></i> <span><?php echo $_SESSION['total_cart_products']; ?></span></a></li>
                        </ul>
                        <div class="header__cart__price">item: <span><?php if(isset($_SESSION['order_total'])) { echo $_SESSION['order_total']." TK"; } else { echo "0 TK"; } ?></span></div>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>All departments</span>
                        </div>
                        <ul <?php
                                if(!empty($pages)) {
                                    echo 'style="display: none;" ';
                                }
                            ?> >
                            <?php while($categoryInfo = mysqli_fetch_assoc($queryResult1)) { ?>
                            <li><a href="category.php?id=<?php echo $categoryInfo['id']; ?>"><?php echo $categoryInfo['category_name']; ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="#">
                                <div class="hero__search__categories">
                                    All Categories
                                    <span class="arrow_carrot-down"></span>
                                </div>
                                <input type="text" placeholder="What do yo u need?">
                                <button type="submit" class="site-btn">SEARCH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+880 1717 123 068</h5>
                                <span>support 24/7 time</span>
                            </div>
                        </div>
                    </div>
                    <?php
                    if(empty($pages)) {
                        echo '<div class="hero__item set-bg" data-setbg="assets/frontend/img/hero/banner.jpg">
                        <div class="hero__text">
                            <span>FRUIT FRESH</span>
                            <h2>Vegetable <br />100% Organic</h2>
                            <p>Free Pickup and Delivery Available</p>
                            <a href="shop.php" class="primary-btn">SHOP NOW</a>
                        </div>
                        </div>';
                    }

                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->