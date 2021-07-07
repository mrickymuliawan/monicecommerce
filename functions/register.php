<?php
include('../connection.php');
$sql = "insert into user (name, email, password, role) values ('$_POST[name]','$_POST[email]','" . md5($_POST['password']) . "','$_POST[role]')";
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: $baseUrl/register.php?message=create account success");
