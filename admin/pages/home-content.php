<?php
require_once '../vendor/autoload.php';

$dashboard = new App\Classes\Dashboard();

$queryResult1 = $dashboard->getTotalCustomers();
$customersInfo = mysqli_fetch_assoc($queryResult1);

$queryResult2 = $dashboard->getTotalCategories();
$categoriesInfo = mysqli_fetch_assoc($queryResult2);

$queryResult3 = $dashboard->getTotalProducts();
$productsInfo = mysqli_fetch_assoc($queryResult3);

$queryResult4 = $dashboard->getTotalOrders();
$ordersInfo = mysqli_fetch_assoc($queryResult4);


?>


<div class="container-fluid py-4">
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12" style="padding: 30px 12px;">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Customers</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $customersInfo['numberOfCustomers']; ?>
                    </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12" style="padding: 30px 12px;">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Categories</p>
                    <h5 class="font-weight-bolder mb-0">
                     <?php echo $categoriesInfo['numberOfCategories']; ?>
                    </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12" style="padding: 30px 12px;">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Products</p>
                    <h5 class="font-weight-bolder mb-0">
                     <?php echo $productsInfo['numberOfProducts']; ?>
                    </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-12" style="padding: 30px 12px;">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Orders</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?php echo $ordersInfo['numberOfOrders']; ?>
                    </h5>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>