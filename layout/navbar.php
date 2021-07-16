<?php
include("../connection.php");

?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Ecommerce</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item">
        <a class="nav-link" href="<?= $baseUrl ?>"><em class="fas fa-home"></em> Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $baseUrl ?>/blog/"><em class="fas fa-blog"></em> Blog</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= $baseUrl ?>/contactus.php"><em class="fas fa-envelope"></em> Contact Us</a>
      </li>
    </ul>
    <form class="ml-3 d-inline w-50">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search something">
        <div class="input-group-append">
          <button class="btn btn-outline-primary" type="button"><em class="fas fa-search"></em></button>
        </div>
      </div>
    </form>
    <ul class="navbar-nav my-lg-auto ml-auto">
      <?php
      session_start();
      if (!isset($_SESSION['name'])) {
      ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl ?>/login.php">Login</a>
        </li>
      <?php } else {
        $result = mysqli_query($link, "select id from carts where user_id=$_SESSION[user_id] group by product_id ");
        $count = mysqli_num_rows($result);
      ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl ?>/order.php"> <em class="fas fa-list"></em> Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl ?>/cart.php"> <?php if ($count > 0) {
                                                                  echo "<span class='badge badge-danger navbar-badge'>$count</span>";
                                                                } ?><em class="fas fa-shopping-cart"></em> Cart</a>
        </li>
        <li class="nav-item">
          <span class="nav-link"><em class="fas fa-user"></em> <?= ucwords($_SESSION['name']) ?></span>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= $baseUrl ?>/functions/logout.php"><em class="fas fa-sign-out-alt"></em> Logout</a>
        </li>
      <?php } ?>
    </ul>
  </div>
</nav>