<?php

include('../../../connection.php');

$sql = "update user set name='$_POST[name]',email='$_POST[email]',role='$_POST[role]' where id=$_POST[id]";
if ($_POST['password'] != null) {
  $sql = "update user set name='$_POST[name]',email='$_POST[email]',password='" . md5($_POST['password']) . "',role='$_POST[role]' where id=$_POST[id]";
}
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: $baseUrl/admin/user/all_users.php");
