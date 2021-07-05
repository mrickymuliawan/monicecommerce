<?php

include('../../../connection.php');

$result = mysqli_query($link, "delete from product where id='$_GET[id]'");
if (!$result) {
  echo mysqli_error($link);
} else {
  header("Location: $baseUrl/admin/product/all_product.php");
}
