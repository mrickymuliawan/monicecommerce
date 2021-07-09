<?php
include('../connection.php');
$sql = "insert into feedback (name, email, message) values ('$_POST[name]','$_POST[email]','$_POST[message]')";
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
  return false;
}
header("Location: $baseUrl/contactus.php?message=Message has been sent");
