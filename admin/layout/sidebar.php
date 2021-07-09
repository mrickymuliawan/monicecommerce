<?php include('config.php'); ?>

<nav class="main-header navbar navbar-expand navbar-white navbar-light">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><em class="fas fa-bars"></em></a>
    </li>
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <em class="fas fa-expand-arrows-alt"></em>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
        <em class="fas fa-th-large"></em>
      </a>
    </li>
  </ul>
</nav>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <span class="brand-text font-weight-light">Admin</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/report/all_reports.php" class="nav-link">
            <em class="nav-icon fas fa-chart-pie"></em>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/user/all_users.php" class="nav-link">
            <em class="nav-icon fas fa-user"></em>
            <p>
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/order/all_orders.php" class="nav-link">
            <em class="nav-icon fas fa-shopping-cart"></em>
            <p>
              Order
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/promotion/all_promotions.php" class="nav-link">
            <em class="nav-icon fas fa-bell"></em>
            <p>
              Promotion
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/product/all_product.php" class="nav-link">
            <em class="nav-icon fas fa-list"></em>
            <p>
              Product
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/feedback/all_feedback.php" class="nav-link">
            <em class="nav-icon fas fa-list"></em>
            <p>
              Feedback
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= $baseUrl ?>/admin/functions/logout.php" class="nav-link">
            <em class="nav-icon fas fa-sign-out-alt"></em>
            <p>
              LogOut
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>