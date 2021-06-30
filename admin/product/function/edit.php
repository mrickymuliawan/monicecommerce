<?php

include('../../../connection.php');
include('../../../config.php');

$sql = "update product set name='$_POST[name]',stock='$_POST[stock]',detail='$_POST[detail]',price=$_POST[price], category_id=$_POST[categoryId] where id=$_GET[id]";
if($_FILES['image_url']['size']!=0){
  $target_file = "../../../uploads/" . basename($_FILES["image_url"]["name"]);
  if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
    $fileUrl = $baseUrl . "/uploads/". htmlspecialchars( basename( $_FILES["image_url"]["name"]));
    $sql = "update product set name='$_POST[name]', stock='$_POST[stock]', detail='$_POST[detail]', image_url='$fileUrl', price=$_POST[price] where id=$_GET[id]";
  } else {
    echo "Sorry, there was an error uploading your file.";
    return false;
  }
}
echo $sql."<br>";
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: /ecommerce/admin/product/all_product.php");