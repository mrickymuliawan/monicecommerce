
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
          <form action="functions/process.php" method="post">
            <table class="table table-striped table-bordered">

              <tr>
                <th style="width:1%">Select</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
              </tr>

              <?php
                include("connection.php");
                $result = mysqli_query($link, "select json_arrayagg(carts.id) as cart_id,carts.*,product.name, product.price, count(carts.product_id) as qty, sum(product.price) as price from carts inner join product on carts.product_id=product.id where user_id=$_SESSION[user_id] group by carts.product_id");
                $total = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                  $total += $row['price'];
              ?>

              <tr>
                <td class="text-center"><input type="checkbox" checked name="select[]" value='<?=$row['cart_id']?>'></td>
                <td><?=$row['name']?></td>
                <td><?=$row['qty']?></td>
                <td>Rp. <?=number_format($row['price'])?></td>
              </tr>
              <?php } ?>
              <tr>
                <td colspan=3>Total</td>

                <td>Rp. <?=number_format($total)?></td>
              </tr>
            </table>
            <button type="submit" class="btn btn-primary">Checkout</button>
          </form>
      </div>
    </div>

  </div>
</body>

</html>