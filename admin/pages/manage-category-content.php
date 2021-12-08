<?php
 require_once '../vendor/autoload.php';
 
 $category = new App\Classes\Category();

 $message = "";
 
 if(isset($_GET['publication_status'])) {
     $id = $_GET['id'];

     if($_GET['publication_status'] == 'unpublish') {
         $message = $category->unpublishCategoryInfo($id);
     
        }elseif($_GET['publication_status'] == 'publish') {
            $message = $category->publishCategoryInfo($id);
        }
 }


 if(isset($_GET['delete'])) {
     $id = $_GET['id'];
     $message = $category->deleteCategoryInfo($id);
 }


 $queryResult = $category->getAllCategoryInfo();


?>


<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card mb-4">
          <div class="card-header pb-0">
            <h6>Category List</h6>
          </div>
          <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
              <table class="table align-items-center mb-0">
                <thead>
                  <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Category Name
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Category Description
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">
                      Publication Status
                    </th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Actions</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php while($categoryInfo = mysqli_fetch_assoc($queryResult)) { ?>
                        <tr>
                          <td class="px-2 ps-4 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $i++; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $categoryInfo['category_name']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php echo $categoryInfo['category_description']; ?>
                            </span>
                          </td>
                          <td class="px-2 py-3">
                            <span class="text-secondary text-xs font-weight-bold">
                                <?php
                                if($categoryInfo['publication_status'] == 1) {
                                    echo "Published";

                                }else {
                                    echo "Unpublished";
                                }

                                ?>
                            </span>
                          </td>
                          
                          <td class="align-middle">
                            <a href="edit-category.php?id=<?php echo $categoryInfo['id']; ?>" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Edit Category">
                              Edit
                            </a>|
                            <a href="?delete=true&id=<?php echo $categoryInfo['id']; ?>" onclick="return confirm('Delete category?');" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip"
                              data-original-title="Delete Category">
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