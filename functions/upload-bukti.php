<?php

include('../connection.php');
include('../config.php');


if ($_FILES['image_url']['size'] != 0) {
  $target_file = "../uploads/" . basename($_FILES["image_url"]["name"]);
  if (move_uploaded_file($_FILES["image_url"]["tmp_name"], $target_file)) {
    $fileUrl = $baseUrl . "/uploads/" . htmlspecialchars(basename($_FILES["image_url"]["name"]));
    $sql = "update `order` set image_url='$fileUrl' where id=$_POST[id]";
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
$result = mysqli_query($link, $sql);

if (!$result) {
  echo mysqli_error($link);
}

header("Location: $baseUrl/order.php?message=image uploaded");
