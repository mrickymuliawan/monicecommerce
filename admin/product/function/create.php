<?php

include('../../../connection.php');
include('../../../config.php');

print_r($_POST);
$result = mysqli_query($link, "insert into product (name, stock, detail, price) values ('$_POST[name]','$_POST[stock]','$_POST[detail]',$_POST[price])");

if (!$result) {
  echo mysqli_error($link);
}
echo "$baseUrlproduct/all_product.php";
header("Location: /ecommerce/admin/product/all_product.php");
