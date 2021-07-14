<?php

include('../connection.php');
include('../config.php');


$sql = "update `order` set status='selesai' where id=$_GET[id]";

$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
}

header("Location: $baseUrl/order.php?message=status updated");
