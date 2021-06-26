<?php

include('../../../connection.php');

$sql = "update `order` set status='$_POST[status]' where id=$_POST[id]";  
echo $sql;
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: /ecommerce/admin/order/all_orders.php");