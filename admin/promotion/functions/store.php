<?php
include('../../../connection.php');

$result = mysqli_query($link, "insert into vouchers (code, quotas, percent, description, start_date, expired_date) values ('$_POST[code]', '$_POST[quota]', '$_POST[percent]','$_POST[description]', '$_POST[start_date]', '$_POST[expire_date]')");
if(!$result){
    echo mysqli_error($link);
    return false;
}
header("Location: /ecommerce/admin/promotion/all_promotions.php");