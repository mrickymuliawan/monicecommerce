<?php
include('config.php');
session_start();
unset($_SESSION);
session_unset();
session_destroy();
header("Location: $baseUrl/admin/login.php");
