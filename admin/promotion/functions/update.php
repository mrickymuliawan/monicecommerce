<?php
include('../../../connection.php');

$result = mysqli_query($link, "update vouchers set code='$_POST[code]', quotas='$_POST[quota]', percent='$_POST[percent]',description='$_POST[description]', start_date='$_POST[start_date]', expired_date='$_POST[expire_date]' where id=$_POST[id]");

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: /ecommerce/admin/promotion/all_promotions.php");