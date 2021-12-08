<?php
 require_once '../vendor/autoload.php';
 
 $category = new App\Classes\Category();
 
 if(isset($_POST['btn'])) {
     $message = $category->saveCategoryInfo($_POST);
 }


?>

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-md-8 col-lg-6 col-xxl-5 col-xxl-4">
        <div class="card p-4">
          <div class="card-header p-0">
            <h4>Add Category</h4>
            <h6 style="text-align: center; color: green;"><?php if(isset($message)) { echo $message; } ?></h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <form role="form text-left" method="POST" action="">
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Category Name</b></p></label>
                <input type="text" class="form-control" name="category_name" required value="">
              </div>
              <div class="mb-2 mt-2">
                <label class="form-label m-0"><p><b>Category Description</b></p></label>
                <textarea class="form-control" name="category_description" required cols="" rows=""></textarea>
              </div>
              <div class="mb-2">
                <label class="form-label m-0"><p><b>Publication Status</b></p></label>
                <select class="form-select" value="" required aria-label="Default select example" name="publication_status">
                  <option value=""  selected>Select status...</option>
                  <option value="1">Publish</option>
                  <option value="0">Unpublish</option>
                </select>
              </div>
              <div class="text-center">
                <button type="submit" name="btn" class="btn bg-gradient-dark w-100 my-4 mb-2">Add Category</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
</div>
