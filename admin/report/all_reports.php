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
            <h1 class="m-0">Dasboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Home</li>
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
              <div class="row">
                <div class="col-md-9">
                  <h5>Data Voucher</h5>
                </div>
                <div class="col-md-3 text-right">
                  <a href="export_pdf.php" class="btn btn-success btn-md mb-3">Export PDF</a>
                </div>
              </div>
              <table class="table table-bordered table-striped mt-3 mydatatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Code</th>
                    <th>Description</th>
                    <th>Quota</th>
                    <th>Percent</th>
                    <th>Start Date</th>
                    <th>Expire Date</th>
                    <th>Voucher Used</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $result = mysqli_query($link, "SELECT vouchers.*, COUNT(`order`.voucher_id) as voucher_used FROM vouchers LEFT JOIN `order` ON vouchers.id=`order`.voucher_id GROUP BY vouchers.id");
                  while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                    <tr>
                      <th>No</th>
                      <th>Code</th>
                      <th>Description</th>
                      <th>Quota</th>
                      <th>Percent</th>
                      <th>Start Date</th>
                      <th>Expire Date</th>
                      <th>Voucher Used</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT vouchers.*, COUNT(`order`.voucher_id) as voucher_used FROM vouchers LEFT JOIN `order` ON vouchers.id=`order`.voucher_id GROUP BY vouchers.id");
                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['code'] ?></td>
                        <td><?= $row['description'] ?></td>
                        <td><?= $row['quotas'] ?></td>
                        <td><?= $row['percent'] ?>%</td>
                        <td><?= $row['start_date'] ?></td>
                        <td><?= $row['expired_date'] ?></td>
                        <td><?= $row['voucher_used'] ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <div class="row justify-content-between">
                  <h5>Data Product</h5>
                  <a href="./print_product.php" class='btn btn-primary'>Print</a>
                </div>
                <br>
                <table class="table table-bordered table-striped mt-3 mydatatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Stock</th>
                      <th>Price</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "select * from product");

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['stock'] ?></td>
                        <td>Rp. <?= number_format($row['price']) ?></td>
                      </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <div class="col-lg-12">
            <div class="card">
              <div class="card-body">
                <h5>Data Order</h5>
                <table class="table table-bordered table-striped mt-3 mydatatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Qty</th>
                      <th>Total</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT u.name, o.* FROM `order` o INNER JOIN `user` u ON u.id=o.user_id");

                    while ($row = mysqli_fetch_assoc($result)) {
                      $class = $row['status'] == 'pending payment' ? 'warning' : ($row['status'] == 'proses' ? 'info' : ($row['status'] == 'dikirim' ? 'primary' : 'success'));
                    ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['total_qty'] ?></td>
                        <td>Rp. <?= number_format($row['total_price']) ?></td>
                        <td class="text-center">
                          <h5><span class="badge badge-<?= $class ?>"><?= ucwords($row['status']) ?></span></h5>
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