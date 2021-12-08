<?php

namespace App\Classes;

use App\Classes\Database;

class Order
{
    public function getAllOrderInfo() {
        $sql = "SELECT o.*, c.first_name, c.last_name, p.payment_type, p.payment_status 
        FROM orders as o, customers as c, payments as p 
        WHERE o.customer_id = c.id AND o.id = p.order_id";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteOrderInfo($id){
        $sql = "DELETE FROM orders WHERE id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)){
            $sql = "DELETE FROM payments  WHERE order_id = '$id' ";
            
            if(mysqli_query(Database::dbConnection(), $sql)){
               
                $sql = "DELETE FROM order_details  WHERE order_id = '$id' ";
                mysqli_query(Database::dbConnection(), $sql);

            }else{
                die("Query Problem. ".mysqli_error(Database::dbConnection()));
            }

        }else{
            die("Query Problem. ".mysqli_error(Database::dbConnection()));

        }
    }

    public function getCustomerInfoByOrderId($id){
        $sql = "SELECT o.id, o.customer_id, c.* FROM 
        orders as o, customers as c 
        WHERE o.customer_id = c.id AND o.id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;
        
        }else{
            die("Query Problem. ".mysqli_error(Database::dbConnection()));

        }
    }

    public function getShippingInfoByOrderId($id){
        $sql = "SELECT o.id, o.shipping_id, s.* FROM 
        orders as o, shippings as s 
        WHERE o.shipping_id = s.id AND o.id = '$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else{
            die("Query Problem. ".mysqli_error(Database::dbConnection()));

        }
    }

    public function getAllOrderInfoByOrderId($id){
        $sql = "SELECT o.id, od.* 
        FROM orders as o, order_details as od 
        WHERE o.id = od.order_id AND o.id='$id' ";

        if(mysqli_query(Database::dbConnection(), $sql)){
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else{
            die("Query Problem. ".mysqli_error(Database::dbConnection()));

        }
    }









}
