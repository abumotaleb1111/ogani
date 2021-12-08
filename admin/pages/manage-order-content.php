<?php
 require_once '../vendor/autoload.php';
 
 $order = new App\Classes\Order();

 $message = "";

 if(isset($_GET['delete'])) {
     $id = $_GET['id'];
     $message = $order->deleteOrderInfo($id);
 }

 $queryResult = $order->getAllOrderInfo();


?>


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Order List</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Order ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Customer Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Order Total
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Order Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Payment Type
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Payment Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while($orderInfo = mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                          <td class="px-2 ps-4 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $i++; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $orderInfo['first_name']." ".$orderInfo['last_name']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $orderInfo['order_total']." TK"; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $orderInfo['order_status']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $orderInfo['payment_type']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $orderInfo['payment_status']; ?>
                            </span>
                          </td>
                          
                          <td class="align-middle">
                            <a href="view-order.php?id=<?php echo $orderInfo['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="View Order">
                              View Order
                            </a>|
                            <a href="edit-product.php?id=<?php echo $productInfo['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Edit Product">
                              View Invoice
                            </a>|
                            <a href="edit-product.php?id=<?php echo $productInfo['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Edit Product">
                              Edit
                            </a>|
                            <a href="?delete=true&id=<?php echo $orderInfo['id']; ?>" onclick="return confirm('Delete Order?');" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Delete Order">
                              Delete
                            </a>
                          </td>
                        </tr>
                        <?php } ?>
                     
                </tbody>
              </table>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>