<?php
include("connection.php");
$result = mysqli_query($link, "select * from product where id=$_GET[id]");
$row = mysqli_fetch_assoc($result);
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

  <div class="container-fluid">
    <div class="row no-gutters bg-transparent position-relative justify-content-center">
      <div class="col-md-5 mb-md-0 p-md-4">
        <img src="<?php echo $row['image_url']  ?>" class="w-75 justify-content-center" alt="...">
      </div>
      <div class="col-md-5 position-static p-4 pl-md-0 mt-2">
        <h4 class="mt-0"><?php echo $row['name'] ?></h4>
        <h5><strong>Rp. <?php echo number_format($row['price']) ?></strong></h5>
        <hr>
        <form action="<?= $baseUrl ?>/functions/cart.php" method="post">
          <div class="form-group">
            <label><strong>Qty</strong></label>
            <input type="hidden" name="productId" value="<?= $_GET['id'] ?>">
            <div class="row">
              <input min="1" max="<?= $row['stock'] ?>" value="1" name="qty" type="number" class="form-control col-sm-4 ml-3 text-center">
              <label class="col-sm-3 col-form-label">Stok <strong><?= $row['stock'] ?></strong></label>
            </div>
          </div>
          <div class="form-group">
            <label><strong>Description</strong></label>
            <input type="text" class="form-control" name="description">
          </div>
          <div class="cart mt-4 mb-4">
            <button type="submit" class="btn btn-secondary btn-block"><em class="fas fa-shopping-cart"></em> Add to Cart</button>
          </div>
        </form>
        <div class="card mt-4">
          <div class="card-header">
            <h5 class="mb-0">Detail</h5>
          </div>
          <div class="card-body">
            <?php
            echo $row['detail'];
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>