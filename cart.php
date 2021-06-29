
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
        <p class="alert-warning text-center"><?=$_GET['message']?></p>
        <form action="functions/process.php" method="post">
          <table class="table table-striped table-bordered">

            <tr>
              <th style="width: 1%">Select</th>
              <th>Product Name</th>
              <th style="width: 5%">Quantity</th>
              <th>Total Price</th>
              <th style="width: 1%;">Delete</th>
            </tr>

            <?php
              include("connection.php");
              $result = mysqli_query($link, "select json_arrayagg(carts.id) as cart_id, carts.*, product.name, product.price as product_price, sum(carts.qty) as qty, sum(product.price) as price from carts inner join product on carts.product_id=product.id where user_id=$_SESSION[user_id] group by carts.product_id");
              $total = $qtyTotal = $i = 0;
              while ($row = mysqli_fetch_assoc($result)) {
                $total += $row['qty']*$row['price'];
                $qtyTotal += $row['qty'];
                $price = $row['qty']*$row['price'];
            ?>

            <tr>
              <td class="text-center"><input type="checkbox" data-index="<?=$i?>" checked name="select[]" value='<?=$row['cart_id']?>'></td>
              <td><?=$row['name']?></td>
              <td class="text-center"><?=$row['qty']?></td>
              <td>Rp. <?=number_format($price)?></td>
              <td class="text-center"><a href="/ecommerce/functions/delete_cart.php?select=<?=$row['cart_id']?>" class="btn btn-sm btn-danger"><em class="fas fa-trash"></em></a></td>
            </tr>
            <input type="hidden" name="data[]" id="data<?=$i?>" value='<?=json_encode(["productId"=>$row['product_id'],"qty"=>$row['qty'],"price"=>$price])?>'>
            <?php $i++; } ?>
            <tr>
              <td colspan="2">Total</td>
              <td class="text-center"><?= $qtyTotal ?></td>
              <td>Rp. <?=number_format($total)?></td>
            </tr>
          </table>
          <?php if($i!=0){?>
          <button type="submit" id="checkout" class="btn btn-primary">Checkout</button>
          <?php } ?>
        </form>
      </div>
    </div>

  </div>
</body>
<script src="http://php.local/ecommerce/css/adminlte/plugins/jquery/jquery.min.js"></script>
<script>
$('input[type="checkbox"]').on('change', function(){
  var index = $(this).attr("data-index")
  if(!$(this).prop("checked")){
    $("#data"+index).attr("disabled",true)
  }
})
</script>

</html>