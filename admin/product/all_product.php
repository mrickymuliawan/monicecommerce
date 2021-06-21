<?php
include('../layout/head.php');
include('../connection.php');
?>

<div class="wrapper">

  <?php include('../layout/sidebar.php') ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Product</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Product</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <a class="btn btn-primary mb-2" href="/ecommerce/admin/product/create_product.php">Create</a>

                <table class="table table-bordered table-striped mt-3 mydatatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Stock</th>
                      <th>Price</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "select * from product");

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "
                      <tr>
                        <td>$row[id]</td>
                        <td>$row[name]</td>
                        <td>$row[stock]</td>
                        <td>$row[price]</td>
                        <td>
                          <a href='/ecommerce/admin/product/edit_product.php?id=$row[id]' class='btn btn-success'>Edit</a>
                          <a href='/ecommerce/admin/product/edit_product.php?id=$row[id]' class='btn btn-danger'>Delete</a>
                        </td>
                      </tr>
                       ";
                    }
                    ?>
                  </tbody>
                </table>
              </div>
            </div>

          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
    <div class="p-3">
      <h5>Title</h5>
      <p>Sidebar content</p>
    </div>
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>
</div>

<?php include('../layout/foot.php') ?>