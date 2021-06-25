<?php
include('../layout/head.php');
include('../../connection.php');
include('../../config.php');
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
                <form action="function/create.php" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label>Stock</label>
                    <input name="stock" type="number" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <input name="price" type="number" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control">
                      <option value="">Listrik</option>
                      <option value="">Fiber</option>
                      <option value="">Cabinet</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Detail</label>
                    <textarea name="detail" rows="5" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <label>Image</label>
                    <input name="image_url" type="file" class="form-control" accept="image/*">
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
</div>

<?php include('layout/foot.php') ?>