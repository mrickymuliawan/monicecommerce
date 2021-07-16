<?php

include('../../../connection.php');

$result = mysqli_query($link, "update `order` set resi='$_POST[resi]' where id='$_POST[id]'");

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: $baseUrl/admin/order/all_orders.php");
