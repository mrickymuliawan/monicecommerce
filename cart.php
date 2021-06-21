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
        <h2>Cart</h2>
        <table class="table table-striped table-bordered">

          <tr>
            <th>No</th>
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Total Price</th>
          </tr>

          <tr>
            <td>1</td>
            <td>Ups 123</td>
            <td>20</td>
            <td>Rp. 120.000</td>
          </tr>
          <tr>
            <td>1</td>
            <td>Ups 123</td>
            <td>20</td>
            <td>Rp. 120.000</td>
          </tr>
          <tr>
            <td colspan=3>Total</td>

            <td>Rp. 240.000</td>
          </tr>
        </table>
        <a href="/ecommerce/thankyou.php" class='btn btn-primary'>Checkout </a>
      </div>
    </div>

  </div>
</body>

</html>