<?php
require_once 'vendor/autoload.php';

$application = new App\Classes\Application();

if(isset($_POST['btn'])) {
    $application->saveOrderInfo($_POST);
}


?>

<div class="container">
    <div class="row" style="display: flex; flex-direction: column; align-items: center;">
        <div class="col-md-6">
            <form action="" method="post">
                <table class="table">                <tr>
                    <td>Cash On Delivery</td>
                    <td>
                        <input type="radio" name="payment_type" value="cash_on_delivery">
                    </td>
                </tr>
                <tr>
                    <td>bKash</td>
                    <td>
                        <input type="radio" name="payment_type" value="bkash">
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="submit" name="btn" value="Confirm Order">
                    </td>
                    <td></td>
                </tr>
                </table>

            </form>
        </div>
    </div>
</div>