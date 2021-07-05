<?php
include("connection.php");
session_start();
if (empty($_SESSION)) {
  $data = json_encode($_REQUEST);
  header("Location: $baseUrl/login.php?message=please login first&redirect=cart&data=$data");
} else {
  $param = isset($_GET['data']) ? json_decode($_GET['data'], true) : $_GET;
  $request = empty($_POST) ? $param : $_POST;
  $result = mysqli_query($link, "insert into carts (user_id, product_id, qty, description) values ('$_SESSION[user_id]', '$request[productId]', '$request[qty]', '$request[description]')");
  if (!$result) {
    echo mysqli_error($link);
    return $false;
  }
  header("Location: $baseUrl/cart.php");
}
