<?php
include('connection.php');
date_default_timezone_set('Asia/Jakarta');
if(!empty($_POST['select'])){
    session_start();
    $totalQty = $totalPrice = 0;
    foreach ($_POST['data'] as $inputData) {
        $input = json_decode($inputData,true);
        $query = mysqli_query($link, "select stock, name from product where id=$input[productId]");
        $data = mysqli_fetch_assoc($query);
        if($input['qty']>$data['stock']){
            header("Location: /ecommerce/cart.php?message=$data[name] out of stock");
            return false;
        }
        $totalQty += $input['qty'];
        $totalPrice += $input['price'];
    }
    foreach ($_POST['select'] as $selects) {
        $data = json_decode($selects,true);
        foreach ($data as $cartId) {
            mysqli_query($link, "delete from carts where id=$cartId");
        }
    }
    mysqli_query($link, "insert into `order` (total_qty, total_price, user_id, status, created_at, updated_at) values ('$totalQty', '$totalPrice', '$_SESSION[user_id]', 'pending payment', '".date("Y-m-d H:i:s")."', '".date("Y-m-d H:i:s")."')");
    $orderId = mysqli_insert_id($link);
    foreach ($_POST['data'] as $inputData) {
        $input = json_decode($inputData,true);
        $finalStock = $data['stock']-$input['qty'];
        mysqli_query($link, "update product set stock=$finalStock where id=$input[productId]");
        mysqli_query($link, "insert into order_item (product_id, quantity, price, order_id) values ('$input[productId]', '$input[qty]', '$input[price]', '$orderId')");
    }
    header("Location: /ecommerce/thankyou.php?orderId=$orderId");
}else{
    header("Location: /ecommerce/cart.php?message=please select item, at least 1 item");
}
