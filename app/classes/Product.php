<?php

namespace App\Classes;

use App\Classes\Database;

class Product
{
    public function saveProductInfo($data) {
        $productDescription  = mysqli_real_escape_string(Database::dbConnection(), $data['product_description']);

        $directory = '../assets/backend/product-images/';
        $imageUrl = $directory.$_FILES['product_image']['name'];
        $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
        $fileSize = $_FILES['product_image']['size'];
        $check = getimagesize($_FILES['product_image']['tmp_name']);

        if($check) {
            if(file_exists($imageUrl)) {
                return $message = "This image already exist. Please select another one.";
            }else {
                if($fileSize > 10000000) {
                    return $message = "Image's size is too large. Please select within 10 MB";
                }else {
                    if($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png' ) {
                        return $message = "Image type is not supported. Supported(jpg, jpeg, png)";
                    }else {
                        move_uploaded_file($_FILES['product_image']['tmp_name'], $imageUrl);
                        $sql = "INSERT INTO products (category_id, product_name, product_price, product_quantity, product_weight, product_description, product_image, publication_status) 
                        VALUES ('$data[category_id]', '$data[product_name]', '$data[product_price]', '$data[product_quantity]', '$data[product_weight]', '$productDescription', '$imageUrl', '$data[publication_status]') ";
                            if(mysqli_query(Database::dbConnection(), $sql)) {
                                return $message = "Saved Product Info Successfully.";

                            }else {
                                die("Query Problem");
                            }
                    }
                }
            }

        }else {
            return $message = "Please choose an image file!";
        }
  
       
    }


    public function getAllProductInfo() {
        $sql = "SELECT p.*, c.category_name FROM products as p, categories as c WHERE p.category_id = c.id ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function getProductInfoById($id) {
        $sql = "SELECT * FROM products WHERE id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    // public function publishProjectInfo($id) {
    //     $sql = "UPDATE projects SET publication_status =1 WHERE id = '$id' ";

    //     if(mysqli_query(Database::dbConnection(), $sql)) {              
    //         $message = "Project Info Published Successfully.";
    //         return $message;

    //     }else {
    //         die("Query Problem".mysqli_error(Database::dbConnection()));
    //     }
    // }


    // public function unpublishProjectInfo($id) {
    //     $sql = "UPDATE projects SET publication_status =0 WHERE id = '$id' ";

    //     if(mysqli_query(Database::dbConnection(), $sql)) {              
    //         $message = "Project Info Unpublished Successfully.";
    //         return $message;

    //     }else {
    //         die("Query Problem".mysqli_error(Database::dbConnection()));
    //     }
    // }


    public function updateProductInfo($data) {
        $productImage = $_FILES['product_image']['name'];

        if($productImage) {
            
            $directory = '../assets/backend/product-images/';
            $imageUrl = $directory.$_FILES['product_image']['name'];
            $fileType = pathinfo($imageUrl, PATHINFO_EXTENSION);
            $fileSize = $_FILES['product_image']['size'];
            $check = getimagesize($_FILES['product_image']['tmp_name']);

            if($check) {
                if(file_exists($imageUrl)) {
                    return $message = "Already exist. Please select another one.";
                }else {
                    if($fileSize1 > 10000000) {
                        return $message = "Image's size is too large. Please select within 10 MB";
                    }else {
                        if($fileType != 'jpg' && $fileType != 'jpeg' && $fileType != 'png' ) {
                            return $message = "Image type is not supported. Supported(jpg, jpeg, png)";
                        }else {
                            move_uploaded_file($_FILES['product_image']['tmp_name'], $imageUrl);
                            $sql = "UPDATE products SET category_id = '$data[category_id]', product_name = '$data[product_name]', product_price = '$data[product_price]',
                            product_quantity = '$data[product_quantity]', product_weight = '$data[product_weight]', product_description = '$data[product_description]', 
                            product_image = '$imageUrl', publication_status = '$data[publication_status]' WHERE id = '$data[product_id]'  ";

                            if(mysqli_query(Database::dbConnection(), $sql)) {              
                                header('Location: manage-product.php');

                            }else {
                                die("Query Problem".mysqli_error(Database::dbConnection()));
                            }
                        }
                    }
                }

            }else {
                return $message = "Please choose an image file in short image!";
            }

        }else {
            $sql = "UPDATE products SET category_id = '$data[category_id]', product_name = '$data[product_name]', product_price = '$data[product_price]',
            product_quantity = '$data[product_quantity]', product_weight = '$data[product_weight]', product_description = '$data[product_description]', 
            publication_status = '$data[publication_status]' WHERE id = '$data[product_id]'  ";
            
            if(mysqli_query(Database::dbConnection(), $sql)) {              
                header('Location: manage-product.php');

            }else {
                die("Query Problem".mysqli_error(Database::dbConnection()));
            }
        }

    }

    // project_short_image = '$data[project_short_image]', project_full_image = '$data[project_full_image]'
    public function deleteProductInfo($id) {
        $sql = "DELETE FROM products WHERE id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $message = "Product Info Delete Successfully.";
            return $message;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }









}
