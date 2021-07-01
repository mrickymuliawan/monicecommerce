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
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class='col-8 mt-5 border p-2'>
        <h2>Register</h2>
        <p class="alert-info text-center"><?=$_GET['message']?></p>
        <form method="POST" action='./functions/register.php'>
          <div class="form-group">
            <label>Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name">
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" placeholder="Password">
            <input type="hidden" name="role" value="user">
          </div>
          <div class="text-right"><a href="login.php">Login</a></div>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
    </div>

  </div>
</body>

</html>