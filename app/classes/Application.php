<?php
namespace App\Classes;
// session_start();

use App\Classes\Database;

class Application
{   
    public function getTwelvePublishedProductInfo() {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 12 ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getAllPublishedProductInfo() {
        $sql = "SELECT * FROM products ORDER BY id DESC LIMIT 16 ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    
    public function getAllProductInfoByCategoryId($category_id) {
        $sql = "SELECT * FROM products WHERE category_id = $category_id ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getProductInfoById($id) {
        $sql = "SELECT p.*, c.category_name FROM products AS p, categories AS c 
        WHERE p.category_id = c.id AND p.id = '$id' ";


        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function getRelatedProductInfo($category_id) {
        $sql = "SELECT * FROM products WHERE category_id = '$category_id' ORDER BY id DESC LIMIT 4 ";

        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }


    public function saveCartProductInfo($data) {
        $productId = $data['id'];

        $sql = "SELECT * FROM products WHERE id = '$productId' ";

        $queryResult = mysqli_query(Database::dbConnection(), $sql);
        $productInfo = mysqli_fetch_assoc($queryResult);
        $productQuantity =  $productInfo['product_quantity'];
        $cartProductQuantity = $data['product_quantity'];

        if($cartProductQuantity > $productQuantity){
            return $message = "You have to order equal or less than "." ".$productQuantity;
    
        }else if($cartProductQuantity <=0 ){
            return $message =  "You have to order minimum one. ";
            
        }else{
            $sessionId = session_id();
            $sql = "INSERT INTO temp_cart (product_id, session_id, product_name, product_image, product_price, product_quantity) 
            VALUES ('$productId', '$sessionId', '$productInfo[product_name]','$productInfo[product_image]', '$productInfo[product_price]', 
            '$data[product_quantity]')";

            $queryResult = mysqli_query(Database::dbConnection(), $sql);
    
            header('Location: cart.php');
        }
    
    }

    public function getAllCartProductInfoBySessionId(){
        $sessionId = session_id();

        $sql = "SELECT * FROM temp_cart WHERE session_id ='$sessionId' ";
    
        if(mysqli_query(Database::dbConnection(), $sql)) {              
            $queryResult = mysqli_query(Database::dbConnection(), $sql);
            return $queryResult;

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    
    }

    public function updateCartProductInfoById($data){
        $sessionId = session_id();
        $sql = "UPDATE temp_cart SET product_quantity = '$data[product_quantity]' WHERE session_id = '$sessionId' AND id = '$data[id]'  ";
    
        if(mysqli_query(Database::dbConnection(), $sql)) {              
            return $message = "Cart Product Update Successfully!";

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function deleteCartProductInfoById($id){
        $sessionId = session_id();
        $sql = "DELETE FROM temp_cart  WHERE session_id='$sessionId' AND id='$id' ";
    
        if(mysqli_query(Database::dbConnection(), $sql)) {              
            return $message = "Cart Product Delete Successfully!";

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function saveCustomerInfo($data) {
        $password = md5($data['password']);
        $sql = "INSERT INTO customers(first_name, last_name, email, password, phone, address, city) 
        VALUES('$data[first_name]', '$data[last_name]', '$data[email]', '$data[password]', '$data[phone]', '$data[address]', '$data[city]')";

        if(mysqli_query(Database::dbConnection(), $sql)) {
            // $customer_id = mysqli_insert_id(Database::dbConnection());
            $last_id = mysqli_query(Database::dbConnection(), "SELECT id FROM customers ORDER BY id DESC LIMIT 0 , 1" );
            $customer_id = mysqli_fetch_assoc($last_id);

            $_SESSION['customer_id'] = $customer_id['id'];
            $_SESSION['customer_name'] = $data['first_name']." ".$data['last_name'];

            header('Location: shipping.php');

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }
    public function saveShippingInfo($data) {
        $sql = "INSERT INTO shippings(fullname, email, phone, address, city) 
        VALUES('$data[fullname]', '$data[email]', '$data[phone]', '$data[address]', '$data[city]')";

        if(mysqli_query(Database::dbConnection(), $sql)) {
            // $shipping_id = mysqli_insert_id(Database::dbConnection());
            $last_id = mysqli_query(Database::dbConnection(), "SELECT id FROM shippings ORDER BY id DESC LIMIT 0 , 1" );
            $shipping_id = mysqli_fetch_assoc($last_id);

            $_SESSION['shipping_id'] = $shipping_id['id'];

            header('Location: payment.php');

        }else {
            die("Query Problem".mysqli_error(Database::dbConnection()));
        }
    }

    public function saveOrderInfo($data) {
        $paymentType = $data['payment_type'];

        if($paymentType == 'cash_on_delivery') {
            $sql = "INSERT INTO orders(customer_id, shipping_id, order_total)
            VALUES('$_SESSION[customer_id]', '$_SESSION[shipping_id]', '$_SESSION[order_total]')";

            if(mysqli_query(Database::dbConnection(), $sql)) {
            //    $order_id = mysqli_insert_id(Database::dbConnection());
                $last_id = mysqli_query(Database::dbConnection(), "SELECT id FROM orders ORDER BY id DESC LIMIT 0 , 1" );
                $order_id = mysqli_fetch_assoc($last_id);

                $_SESSION['order_id'] = $order_id['id'];

               $sql = "INSERT INTO payments(order_id, payment_type) VALUES('$_SESSION[order_id]', '$paymentType')";

               if(mysqli_query(Database::dbConnection(), $sql)) {
                    $session_id = session_id();
                    $sql = "SELECT * FROM temp_cart WHERE session_id='$session_id' ";
                    $queryResult = mysqli_query(Database::dbConnection(), $sql);

                    while($row = mysqli_fetch_assoc($queryResult)){
                        $sql = "INSERT INTO order_details (order_id, product_id, product_name, product_price, product_quantity) VALUES ('$_SESSION[order_id]', '$row[product_id]', '$row[product_name]', '$row[product_price]', '$row[product_quantity]')";
                        mysqli_query(Database::dbConnection(), $sql);
                    }

                    $sql = "DELETE FROM temp_cart WHERE session_id= '$session_id' ";
                    mysqli_query(Database::dbConnection(), $sql);

                    unset($_SESSION['order_total']);
                    unset($_SESSION['total_cart_products']);

                    header('Location: customer-home.php');

    

               }else {
                    die("Query Problem".mysqli_error(Database::dbConnection()));
               }

            }else {
                die("Query Problem".mysqli_error(Database::dbConnection()));
            }

        }elseif($paymentType == 'bkash') {

        }
    }

    public function customerLogout() {
        unset($_SESSION['customer_id']);
        unset($_SESSION['customer_name']);
        unset($_SESSION['shipping_id']);
        unset($_SESSION['order_id']);
    }





    

    







}
