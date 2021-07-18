<?php
include('../connection.php');
date_default_timezone_set('Asia/Jakarta');
if (isset($_POST['code_btn'])) {
  $query = mysqli_query($link, "select * from vouchers where code='$_POST[voucher_code]'");
  $result = mysqli_fetch_assoc($query);
  $error = mysqli_error($link);
  if ($error) {
    echo $error;
  } else {
    if (!$result) {
      header("Location: $baseUrl/cart.php?info=Voucher not found&decorator=danger&accept=false");
    } else {
      $now = date("Y-m-d H:i:s");
      $start = date("Y-m-d H:i:s", strtotime($result['start_date']));
      $exp = date("Y-m-d H:i:s", strtotime($result['expired_date']));
      if ($result['quotas'] == 0) {
        header("Location: $baseUrl/cart.php?info=Voucher has reached limit&decorator=danger&accept=false");
      } elseif ($now < $start || $now > $exp) {
        header("Location: $baseUrl/cart.php?info=Voucher cannot be used&decorator=danger&accept=false");
      } else {
        header("Location: $baseUrl/cart.php?info=Voucher applied&decorator=info&vcode=$_POST[voucher_code]&accept=true");
      }
    }
  }
} elseif (!empty($_POST['select'])) {
  session_start();
  $totalQty = $totalPrice = 0;
  $voucherId = 0;
  foreach ($_POST['data'] as $inputData) {
    $input = json_decode($inputData, true);
    $productId = $input['productId'];
    if($productId!=0){
      $query = mysqli_query($link, "select stock, name from product where id=$productId");
      $data = mysqli_fetch_assoc($query);
      if ($input['qty'] > $data['stock']) {
        header("Location: $baseUrl/cart.php?message=$data[name] out of stock");
        return false;
      }
    }
    $totalQty += $input['qty'];
    $totalPrice += $input['price'];
  }
  foreach ($_POST['select'] as $selects) {
    $selectData = json_decode($selects,true)[0];
    if($selectData!=0){
      foreach ($selectData as $cartId) {
        mysqli_query($link, "delete from carts where id=$cartId");
      }
    }
  }
  if (isset($_POST['voucher_code'])) {
    if ($_POST['accept_voucher'] == 'true') {
      $query = mysqli_query($link, "select * from vouchers where code='$_POST[voucher_code]'");
      $result = mysqli_fetch_assoc($query);
      $totalPrice = $totalPrice - (($totalPrice * $result['percent']) / 100);
      $voucherId = $result['id'];
      mysqli_query($link, "update vouchers set quotas=" . ($result['quotas'] - 1) . " where code='$_POST[voucher_code]'");
    }
  }
  $result = mysqli_query($link, "insert into `order` (address, total_qty, total_price, user_id, status, voucher_id, created_at, updated_at) values ('$_POST[address]','$totalQty', '$totalPrice', '$_SESSION[user_id]', 'pending payment', $voucherId,'" . date("Y-m-d H:i:s") . "', '" . date("Y-m-d H:i:s") . "')");

  if (!$result) {
    echo mysqli_error($link);
    return false;
  }
  $orderId = mysqli_insert_id($link);
  foreach ($_POST['data'] as $inputData) {
    $input = json_decode($inputData, true);
    $finalStock = $data['stock'] - $input['qty'];
    mysqli_query($link, "update product set stock=$finalStock where id=$input[productId]");
    mysqli_query($link, "insert into order_item (product_id, quantity, price, order_id) values ('$input[productId]', '$input[qty]', '$input[price]', '$orderId')");
  }
  header("Location: $baseUrl/thankyou.php?orderId=$orderId");
} else {
  header("Location: $baseUrl/cart.php?message=please select item, at least 1 item");
}
