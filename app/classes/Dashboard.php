<?php

namespace App\Classes;

use App\Classes\Database;

class Dashboard
{
    public function getTotalCustomers() {
        $sql = "SELECT COUNT(id) AS numberOfCustomers FROM customers ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getTotalCategories() {
        $sql = "SELECT COUNT(id) AS numberOfCategories FROM categories ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getTotalProducts() {
        $sql = "SELECT COUNT(id) AS numberOfProducts FROM products ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getTotalOrders() {
        $sql = "SELECT COUNT(id) AS numberOfOrders FROM orders ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }





}
