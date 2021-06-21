<?php

include('../../../connection.php');
include('../../../config.php');

print_r($_POST);
$result = mysqli_query($link, "update product set name='$_POST[name]',stock='$_POST[stock]',detail='$_POST[detail]',price=$_POST[price] where id=$_GET[id]");

if (!$result) {
  echo mysqli_error($link);
}
echo "$baseUrlproduct/all_product.php";
header("Location: /ecommerce/admin/product/all_product.php");
