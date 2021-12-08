<?php
 require_once '../vendor/autoload.php';
 
 $product = new App\Classes\Product();

 $message = "";
 
//  if(isset($_GET['publication_status'])) {
//      $id = $_GET['id'];

//      if($_GET['publication_status'] == 'unpublish') {
//          $message = $product->unpublishProductInfo($id);
     
//         }elseif($_GET['publication_status'] == 'publish') {
//             $message = $product->publishProductInfo($id);
//         }
//  }

 if(isset($_GET['delete'])) {
     $id = $_GET['id'];
     $message = $product->deleteProductInfo($id);
 }

 $queryResult = $product->getAllProductInfo();


?>


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Product List</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Product Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Category Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Price
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Quantity
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Weight
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Description
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Image
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Publication Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while($productInfo = mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                          <td class="px-2 ps-4 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $i++; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $productInfo['product_name']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $productInfo['category_name']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $productInfo['product_price']."/-"; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $productInfo['product_quantity']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $productInfo['product_weight']."Kg"; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo substr($productInfo['product_description'], 0, 50)."..."; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <img src="<?php echo $productInfo['product_image']; ?>" height="50" alt="">
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php
                                if($productInfo['publication_status'] == 1) {
                                    echo "Published";

                                }else {
                                    echo "Unpublished";
                                }

                                ?>
                            </span>
                          </td>
                          
                          <td class="align-middle">
                            <a href="edit-product.php?id=<?php echo $productInfo['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Edit Product">
                              Edit
                            </a>|
                            <a href="?delete=true&id=<?php echo $productInfo['id']; ?>" onclick="return confirm('Delete category?');" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Delete Product">
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