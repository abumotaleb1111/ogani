<?php
 require_once 'vendor/autoload.php';
 
 $application = new App\Classes\Application();

 $queryResult = $application->getAllCartProductInfoBySessionId();

 $totalRows = mysqli_num_rows($queryResult);
 
 $_SESSION['total_cart_products'] = $totalRows;

 if(isset($_POST['update-btn'])) {
     $message = $application->updateCartProductInfoById($_POST);
 }

 if(isset($_GET['delete'])) {
     $id = $_GET['id'];

     $message = $application->deleteCartProductInfoById($id);
 }

 



//  $id = $_GET['id'];
//  $queryResult1 = $application-> getProductInfoById($id);
//  $productDetailsInfo = mysqli_fetch_assoc($queryResult1);

//  $categoryId = $productDetailsInfo['category_id'];
//  $queryResult2 = $application->getRelatedProductInfo($categoryId);

//  if(isset($_POST['btn'])) {
//      $message = $application->saveCartProductInfo($_POST);
//  }


?>

  <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="assets/frontend/img/breadcrumb.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Shopping Cart</h2>
                        <div class="breadcrumb__option">
                            <a href="./index.php">Home</a>
                            <span>Shopping Cart</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
        <div class="container">
            <div class="row">

                <div class="col-lg-12">
                <h6 style="text-align: center; color: green;"><?php if(isset($message)) { echo $message; unset($message); } ?></h6>
                    <div class="shoping__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Products</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $sum = 0; while($cartProductInfo = mysqli_fetch_assoc($queryResult)) { ?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img src="admin/<?php echo $cartProductInfo['product_image']; ?>" height="60" alt="">
                                        <h5><?php echo $cartProductInfo['product_name']; ?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                    <?php echo $cartProductInfo['product_price']." TK"; ?>
                                    </td>
                                    <td class="shoping__cart__quantity">
                                        <form action="" method="POST">
                                            <div class="quantity">
                                                <!-- <div class="pro-qty"> -->
                                                <div>
                                                    <input style="width: 70px;" type="text" name="product_quantity" value="<?php echo $cartProductInfo['product_quantity']; ?>">
                                                </div>
                                                <input type="hidden" name="id" value="<?php echo $cartProductInfo['id']; ?>">
                                                <input type="submit" name="update-btn" value="Update" style="border: none; padding: 4px 11px;">
                                            </div>
                                        </form>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?php
                                        $totalPrice = $cartProductInfo['product_price']*$cartProductInfo['product_quantity'];
                                        echo $totalPrice." TK";
                                        ?>
                                    </td>
                                    <td class="shoping__cart__item__close">
                                    <a href="?delete=true&id=<?php echo $cartProductInfo['id']; ?>"><span class="icon_close"></span></a>
                                        
                                    </td>
                                </tr>
                                <?php 
                                $sum = $sum + $totalPrice;
                                // session_start();
                                $_SESSION['order_total'] = $sum;
                                 } ?>
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__btns">
                        <a href="shop.php" class="primary-btn cart-btn">CONTINUE SHOPPING</a>
                        <a href="#" class="primary-btn cart-btn cart-btn-right"><span class="icon_loading"></span>
                            Upadate Cart</a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__continue">
                        <!-- <div class="shoping__discount">
                            <h5>Discount Codes</h5>
                            <form action="#">
                                <input type="text" placeholder="Enter your coupon code">
                                <button type="submit" class="site-btn">APPLY COUPON</button>
                            </form>
                        </div> -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Cart Total</h5>
                        <ul>
                            <li>Subtotal <span><?php echo $sum." TK"; ?></span></li>
                            <li>Total <span><?php echo $sum." TK"; ?></span></li>
                        </ul>

                        <?php if(!empty($_SESSION['customer_id'])) { ?>
                            <a href="shipping.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <?php }else { ?>
                            <a href="checkout.php" class="primary-btn">PROCEED TO CHECKOUT</a>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shoping Cart Section End -->