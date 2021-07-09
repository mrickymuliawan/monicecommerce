<?php
include("connection.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ecommerce</title>
  <link rel="stylesheet" href="css/gaya.css">
  <script src="https://kit.fontawesome.com/746582efa4.js" crossorigin="anonymous"></script>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>

<body>
  <?php include('layout/navbar.php') ?>
  <div class="container">
    <div class="row py-4">
      <div class="col-4">
        <h1>Contact Us</h1>

        <hr>
        <p>sales@metaplasharmoni.com</p>
        <p>0832123123</p>
        <p>Perkantoran Kedoya Elok Plaza Blok DE no, 6 Jl. Panjang No.7, RT.19/RW.4, South Kedoya, Kebonjeruk, West Jakarta City, Jakarta</p>
      </div>
      <div class="col-8">
        <p class="alert-info text-center"><?= $_GET['message'] ?></p>

        <h3>Have some questions?</h3>
        <form method="POST" action="functions/feedback.php">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
            <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Name</label>
            <input type="text" name="name" class="form-control" id="exampleInputPassword1">
          </div>
          <div class="form-group ">
            <label>Message</label>
            <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>