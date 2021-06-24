<?php
include('../../../connection.php');

$result = mysqli_query($link, "delete from user where id='$_GET[id]'");
if (!$result) {
    echo mysqli_error($link);
}else{
    header("Location: /ecommerce/admin/user/all_users.php");
}