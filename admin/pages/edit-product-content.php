<?php
 require_once '../vendor/autoload.php';
 
 $category = new App\Classes\Category();
 $product = new App\Classes\Product();

 $queryResult1 = $category->getAllPublishCategoryInfo();



 if(isset($_POST['btn'])) {
    $message = $product->updateProductInfo($_POST);
 }

 $id = $_GET['id'];
 $queryResult2 = $product-> getProductInfoById($id);
 $productInfo = mysqli_fetch_assoc($queryResult2);





?>

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8 col-lg-6 col-xxl-5 col-xxl-4">
        <div class="card p-4">
          <div class="card-header p-0">
            <h4>Edit Product</h4>
            <h6 style="text-align: center; color: green;"><?php if(isset($message)) { echo $message; } ?></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form role="form text-left" name="editProductForm" method="POST" action="" enctype="multipart/form-data">
            <div class="mb-2 mt-0">
                <label class="form-label m-0"><p><b>Category Name</b></p></label>
                <select class="form-select" value="" required aria-label="Default select example" name="category_id">
                  <option>Select category...</option>
                  <?php while($categoryInfo = mysqli_fetch_assoc($queryResult1)) { ?>
                  <option value="<?php echo $categoryInfo['id']; ?>"><?php echo $categoryInfo['category_name']; ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Name</b></p></label>
                <input type="hidden" class="form-control" name="product_id" required value="<?php echo $productInfo['id']; ?>">
                <input type="text" class="form-control" name="product_name" required value="<?php echo $productInfo['product_name']; ?>">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Price</b></p></label>
                <input type="number" class="form-control" name="product_price" required value="<?php echo $productInfo['product_price']; ?>">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Quantity</b></p></label>
                <input type="text" class="form-control" name="product_quantity" required value="<?php echo $productInfo['product_quantity']; ?>">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Weight</b></p></label>
                <input type="text" class="form-control" name="product_weight" required value="<?php echo $productInfo['product_weight']; ?>">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Description</b></p></label>
                <textarea class="form-control" name="product_description" required cols="" rows=""><?php echo $productInfo['product_description']; ?></textarea>
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Product Image</b></p></label>
                <img src="<?php echo $productInfo['product_image']; ?>" height="70" alt="">
                <input type="file" class="form-control" name="product_image">
              </div>
              <div class="mb-2">
                <label class="form-label m-0"><p><b>Publication Status</b></p></label>
                <select class="form-select" value="" required aria-label="Default select example" name="publication_status">
                  <option>Select status...</option>
                  <option <?php echo ($productInfo["publication_status"] == 1) ? "Selected" : "" ?> value="1">Publish</option>
                  <option <?php echo ($productInfo["publication_status"] == 0) ? "Selected" : "" ?> value="0">Unpublish</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" name="btn" class="btn bg-gradient-dark w-100 my-4 mb-2">Update Product</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>

<script type="text/javascript">
  document.forms['editProductForm'].elements['category_id'].value='<?php echo $productInfo['category_id']; ?>'
</script>
