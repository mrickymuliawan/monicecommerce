<?php
include('../layout/head.php');
include('../../connection.php');
include('../../config.php');

$result = mysqli_query($link, "select * from product where id=$_GET[id]");
$row = mysqli_fetch_assoc($result);
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
            <h1 class="m-0">Create Product</h1>
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
                <form action="function/edit.php?id=<?= $_GET['id'] ?>" method="POSt">
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" value="<?= $row['name'] ?>" type="text" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label>Stock</label>
                    <input name="stock" value="<?= $row['stock'] ?>" type="number" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input name="price" value="<?= $row['price'] ?>" type="number" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Detail</label>
                    <textarea name="detail" rows="5" class="form-control"><?= $row['detail'] ?></textarea>
                  </div>
                  <div class="form-group">
                    <label>Image 1</label>
                    <input name="image_url" type="file" class="form-control">
                    <img src="" alt="">
                  </div>
                  <div class="form-group">
                    <label>Image 2</label>
                    <input name="image_url_2" type="file" class="form-control">
                  </div>
                  <button type="submit" class="btn btn-primary">Submit</button>
                </form>

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

<?php include('layout/foot.php') ?>