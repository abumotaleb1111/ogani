<?php
 require_once '../vendor/autoload.php';

 $category = new App\Classes\Category();

 $id = $_GET['id'];
 $queryResult = $category-> getCategoryInfoById($id);
 $categoryInfo = mysqli_fetch_assoc($queryResult);

 if(isset($_POST['btn'])) {
     $message = $category->updateCategoryInfo($_POST);
 }


?>

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8 col-lg-6 col-xxl-5 col-xxl-4">
        <div class="card p-4">
          <div class="card-header p-0">
            <h4>Edit Category</h4>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form role="form text-left" method="POST" action="">
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Category Name</b></p></label>
                <input type="hidden" class="form-control" name="id" required value="<?php echo $categoryInfo['id']; ?>">
                <input type="text" class="form-control" name="category_name" required value="<?php echo $categoryInfo['category_name']; ?>">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Category Description</b></p></label>
<textarea class="form-control" name="category_description" required cols="" rows=""><?php echo $categoryInfo['category_description']; ?></textarea>
              </div>
              <div class="mb-2">
                <label class="form-label m-0"><p><b>Publication Status</b></p></label>
                <select class="form-select" value="" required aria-label="Default select example" name="publication_status">
                  <option >Select status...</option>
                  <option <?php echo ($categoryInfo["publication_status"] == 1) ? "Selected" : "" ?> value="1">Publish</option>
                  <option <?php echo ($categoryInfo["publication_status"] == 0) ? "Selected" : "" ?> value="0">Unpublish</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" name="btn" class="btn bg-gradient-dark w-100 my-4 mb-2">Update Category</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
