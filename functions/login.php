<?php

include('connection.php');

$result = mysqli_query($link, "select * from user where email='$_POST[email]' and password='".md5($_POST['password'])."' and role='user'");
$data = mysqli_fetch_assoc($result);

if (!$result) {
    echo mysqli_error($link);
}else if(!isset($data)){
    header("Location: /ecommerce/login.php?message=wrong email or password");
}else{
    session_start();
    $_SESSION['user_id'] = $data['id'];
    $_SESSION['name'] = $data['name'];
    if($_POST['redirect']!=='' && $_POST['data']!==''){
        header("Location: /ecommerce/functions/$_POST[redirect].php?data=$_POST[data]");
    }else{
        header("Location: /ecommerce/");
    }
}