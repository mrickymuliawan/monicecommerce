<?php
include("connection.php");
$id = json_decode(urldecode($_GET['select']));
foreach ($id as $v) {
  mysqli_query($link, "delete from carts where id=$v");
}
header("Location: $baseUrl/cart.php");
