<?php
 require_once '../vendor/autoload.php';
 
 $order = new App\Classes\Order();

 if(isset($_GET['id'])){
   $id = $_GET['id'];

   $customerQueryResult = $order->getCustomerInfoByOrderId($id);
   $customerInfo = mysqli_fetch_assoc($customerQueryResult);

   $shippingQueryResult = $order->getShippingInfoByOrderId($id);
   $shippingInfo = mysqli_fetch_assoc($shippingQueryResult);

   $productQueryResult = $order->getAllOrderInfoByOrderId($id);

  }


?>


<div class="container-fluid py-4">
<div class="row">
        <div class="col-md-7 mt-4">
          <div class="card">
            <div class="card-header pb-0 px-3">
              <h6 class="mb-0">Order Information</h6>
            </div>
            <div class="card-body pt-4 p-3">
              <ul class="list-group">
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Customer Information</h6>
                    <span class="mb-2 text-xs">Full Name: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $customerInfo['first_name']." ".$customerInfo['last_name']; ?></span></span>
                    <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customerInfo['phone']; ?></span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customerInfo['email']; ?></span></span>
                    <span class="mb-2 text-xs">Address: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customerInfo['address']; ?></span></span>
                    <span class="mb-2 text-xs">City: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $customerInfo['city']; ?></span></span>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Shipping Information</h6>
                    <span class="mb-2 text-xs">Full Name: <span class="text-dark font-weight-bold ms-sm-2"><?php echo $shippingInfo['fullname']; ?></span></span>
                    <span class="mb-2 text-xs">Phone Number: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $shippingInfo['phone']; ?></span></span>
                    <span class="mb-2 text-xs">Email Address: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $shippingInfo['email']; ?></span></span>
                    <span class="mb-2 text-xs">Address: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $shippingInfo['address']; ?></span></span>
                    <span class="mb-2 text-xs">City: <span class="text-dark ms-sm-2 font-weight-bold"><?php echo $shippingInfo['city']; ?></span></span>
                  </div>
                </li>
                <li class="list-group-item border-0 d-flex p-4 mb-2 mt-3 bg-gray-100 border-radius-lg">
                  <div class="d-flex flex-column">
                    <h6 class="mb-3 text-sm">Product Information</h6>
                    <table style="width: 100%;" class="table table-border">
                      <tr>
                        <th>
                          <span class="mb-2 text-xs">ID</span>
                        </th>
                        <th>
                          <span class="mb-2 text-xs">Product Name</span>
                        </th>
                        <th>
                          <span class="mb-2 text-xs">Product Price</span>
                        </th>
                        <th>
                          <span class="mb-2 text-xs">Product Quantity</span>
                        </th>
                        <th>
                          <span class="mb-2 text-xs">Total Price</span>
                        </th>
                      </tr>

                      <?php $i = 1; ?>
                      <?php $sum = 0; while($productInfo = mysqli_fetch_assoc($productQueryResult)) { ?>
                      <tr>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $i++; ?></span></span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $productInfo['product_name']; ?></span></span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $productInfo['product_price']; ?></span></span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $productInfo['product_quantity']; ?></span></span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-">
                            <?php 
                              $totalPrice = $productInfo['product_price']*$productInfo['product_quantity'];
                              echo $totalPrice;
                            ?>
                          </span></span>
                        </td>
                      </tr>
                      <?php $sum = $sum + $totalPrice; } ?>

                    </table>
                    <table class="table table-border">
                      <tr>
                        <td>
                          <span class="mb-2 text-xs">Sub Total</span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $sum." TK"; ?></span></span>
                        </td>
                      </tr>
                      <tr>
                        <td>
                           <span class="mb-2 text-xs">Grand Total</span>
                        </td>
                        <td>
                          <span class="mb- text-xs"><span class="text-dark font-weight-bold ms-sm-"><?php echo $sum." TK"; ?></span></span>
                        </td>
                      </tr>
                    </table>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>