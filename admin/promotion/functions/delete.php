<?php
include('../../../connection.php');

$result = mysqli_query($link, "delete from vouchers where id='$_GET[id]'");
if (!$result) {
  echo mysqli_error($link);
} else {
  header("Location: $baseUrl/admin/promotion/all_promotions.php");
}
