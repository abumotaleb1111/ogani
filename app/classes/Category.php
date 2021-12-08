<?php

namespace App\Classes;

use App\Classes\Database;

class Category
{
    public function saveCategoryInfo($data) {
        $sql = "INSERT INTO categories (category_name, category_description, publication_status) VALUES ('$data[category_name]','$data[category_description]', '$data[publication_status]')";
        
        if(mysqli_query(Database::dbConnection(), $sql)) {
            $message = "Category Info Saved Successfully.";
            return $message;

        }else {
            die("Query Problem".mysqli_error(Database::dhConnection()));
        }
    }


    public function getAllCategoryInfo() {
        $sql = "SELECT * FROM categories";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function getCategoryInfoById($id) {
        $sql = "SELECT * FROM categories WHERE id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    // public function publishCategoryInfo($id) {
    //     $sql = "UPDATE categories SET publication_status =1 WHERE id = '$id' ";

    //     if(mysqli_query(Database::dbConnection(), $sql)) {              
    //         $message = "Category Info Published Successfully.";
    //         return $message;

    //     }else {
    //         die("Query Problem".mysqli_error(Database::dbConnection()));
    //     }
    // }


    // public function unpublishCategoryInfo($id) {
    //     $sql = "UPDATE categories SET publication_status =0 WHERE id = '$id' ";

    //     if(mysqli_query(Database::dbConnection(), $sql)) {              
    //         $message = "Category Info Unpublished Successfully.";
    //         return $message;

    //     }else {
    //         die("Query Problem".mysqli_error(Database::dbConnection()));
    //     }
    // }


    public function updateCategoryInfo($data) {
        $sql = "UPDATE categories SET category_name = '$data[category_name]', category_description = '$data[category_description]', publication_status = '$data[publication_status]' WHERE id = '$data[id]' ";

        if(mysqli_query(Database::dbConnection(), $sql)) {     
            
            header('Location: manage-category.php');        

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function deleteCategoryInfo($id) {
        $sql = "DELETE FROM categories WHERE id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $message = "Category Info Delete Successfully.";
            return $message;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function getAllPublishCategoryInfo() {
        $sql = "SELECT * FROM categories WHERE publication_status = 1 ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
        
    }









}
