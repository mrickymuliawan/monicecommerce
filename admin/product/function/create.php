<?php

include('../../../connection.php');
include('../../../config.php');

$sql = "insert into product (name, category_id, stock, detail, price) values ('$_POST[name]','$_POST[categoryId]','$_POST[stock]','$_POST[detail]',$_POST[price])";
if($_FILES['image_url']['size']!=0){
  $target_file = "../../../uploads/" . basename($_FILES["image_url"]["name"]);
  if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
    $fileUrl = $baseUrl ."/uploads/". htmlspecialchars( basename( $_FILES["image_url"]["name"]));
    $sql = "insert into product (name, category_id, stock, detail, price, image_url) values ('$_POST[name]','$_POST[categoryId]','$_POST[stock]','$_POST[detail]',$_POST[price], '$fileUrl')";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
}

header("Location: /ecommerce/admin/product/all_product.php");
