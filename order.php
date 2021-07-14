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
        <h2>My Order</h2>
        <p class="alert-warning text-center"><?= $_GET['message'] ?></p>
        <div id="accordion">
          <?php
          include("connection.php");
          $result = mysqli_query($link, "select * from `order` ");
          while ($row = mysqli_fetch_assoc($result)) {
            $result2 = mysqli_query($link, "select * from order_item join product on order_item.product_id = product.id  where order_id =$row[id] ");
            echo mysqli_error($link);
          ?>

            <div class="card">
              <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                  <button class="btn" data-toggle="collapse" data-target="<?= $row['id'] ?>" aria-expanded="true" aria-controls="collapseOne">
                    <?= date('d/m/Y H:i', strtotime($row['created_at'])) ?> - <?= $row['total_qty'] ?> items
                  </button>

                  <small>status: <?= $row['status'] ?></small>

                </h5>
              </div>
              <form action="functions/upload-bukti.php" method="POST" enctype="multipart/form-data">

                <?php while ($row2 = mysqli_fetch_assoc($result2)) { ?>

                  <div id="<?= $row['id'] ?>" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body">
                      <div class="row align-items-center justify-content-between">
                        <div class="col-4">
                          <img src="<?= $row2['image_url'] ?>" width="100%">

                        </div>

                        <div class="col-6">
                          <h3> <?= $row2['name'] ?></h3>
                          <b> Rp. <?= $row2['price'] ?></b>
                          <br>

                          <span>quantity: <?= $row2['quantity'] ?></span>
                        </div>
                        <div class='col-2'>
                          <h3>Total</h3>
                          <b> Rp. <?= $row['total_price'] ?></b>
                          <br>
                        </div>
                        <div class='col-12'>
                          <p>Bukti transfer</p>
                          <img src="<?= $row['image_url'] ?>" width="20%">
                          <br>
                          <input name="image_url" type="file" class="form-control" accept="image/*">
                          <input name="id" type="hidden" value="<?= $row['id'] ?>">
                          <br>
                          <button class='btn btn-primary'>Upload</button>
                          <a href='functions/confirm.php?id=<?= $row['id'] ?>' class='btn btn-success'>Konfirmasi Penerimaan</a>

                        </div>
                      </div>
                    </div>
                  </div>
                <?php } ?>
              </form>
            </div>

          <?php $i++;
          } ?>

        </div>


      </div>
    </div>

  </div>
</body>
<script src="<?= $baseUrl ?>/css/adminlte/plugins/jquery/jquery.min.js"></script>


</html>