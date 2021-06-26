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
            <h1 class="m-0">Data Orders</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Order</li>
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
                <table class="table table-bordered table-striped mt-3 mydatatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT u.name, o.* FROM `order` o INNER JOIN `user` u ON u.id=o.user_id");

                    while ($row = mysqli_fetch_assoc($result)) {
                    $class = $row['status'] == 'pending payment' ? 'warning' : ($row['status'] == 'proses' ? 'info' : ($row['status'] == 'dikirim' ? 'primary' : 'success'));
                      ?>
                      <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['name']?></td>
                        <td><?=$row['total_qty']?></td>
                        <td>Rp. <?=number_format($row['total_price'])?></td>
                        <td class="text-center"><h5><span class="badge badge-<?=$class?>"><?=ucwords($row['status'])?></span></h5></td>
                        <td>
                          <a href="/ecommerce/admin/order/detail.php?id=<?=$row['id']?>" class="btn btn-info">Detail</a>
                          <a href='/ecommerce/admin/order/edit.php?id=<?=$row['id']?>' class='btn btn-warning'>Edit Status</a>
                        </td>
                      </tr>
                    <?php } ?>
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
</div>

<?php include('../layout/foot.php') ?>