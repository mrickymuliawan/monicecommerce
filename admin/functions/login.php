<?php

include('../../../connection.php');

$result = mysqli_query($link, "select * from user where email='$_POST[email]' and password='".md5($_POST['password'])."'");
$data = mysqli_fetch_row($result);

if (!$result) {
    echo mysqli_error($link);
}else if(!isset($data)){
    header("Location: /ecommerce/admin/login.php?message=wrong email or password");
}else{
    header("Location: /ecommerce/admin/product/all_product.php");
}