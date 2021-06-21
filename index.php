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
    <div class="row">
      <div class="col-12 my-3">
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="https://www.indotara.co.id/inliners/Banner%20Parrent%20Product%20Arakawa%20UPS%202016.jpg" class="d-block w-100" alt="..." style="height:350px">
            </div>
            <div class="carousel-item">
              <img src="https://www.static-src.com/merchant/uploads/full/120/1604338647852.jpg" class="d-block w-100" style="height:350px">
            </div>
            <div class="carousel-item">
              <img src="https://www.asnsystems.com/wp-content/uploads/2017/11/standard-ups-banner-1200.jpg" class="d-block w-100" style="height:350px">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>

      <div class="col-md-2">

        <div class="list-group">
          <a href="#" class="list-group-item list-group-item-action active">
            Category
          </a>
          <a href="#" class="list-group-item list-group-item-action">Category A
          </a>
          <a href="#" class="list-group-item list-group-item-action">Category B
          </a>
          <a href="#" class="list-group-item list-group-item-action">Category C</a>
        </div>
      </div>
      <div class="col-10">
        <div class="row">

          <?php
          include("connection.php");
          $result = mysqli_query($link, "select * from product");

          while ($row = mysqli_fetch_assoc($result)) {
            echo "
              <div class='col-4 my-2'>
                <div class='card'>
                <img class='card-img-top' src='/ecommerce/images/dummy_img.jpeg' alt='Card image cap'>
                <div class='card-body'>
                  <h5 class='card-title'>$row[name]</h5>
                  <h5 class='card-title'>Rp. $row[price]</h5>
                  <p class='card-text'>$row[detail]</p>
                  <p><a href='detailProduct.php?id=$row[id]' class='btn btn-primary' role='button'>See detail</a> <a href='#' class='btn btn-light' role='button'>Add to cart</a></p>
                </div>
                <div class='card-footer'>
                  <small class='text-muted'>Last updated 3 mins ago</small>
                </div>
              </div>
              </div>
                ";
          }
          ?>

        </div>
      </div>
    </div>

  </div>
</body>

</html>