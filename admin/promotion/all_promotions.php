<?php
include('../layout/head.php');
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
            <h1 class="m-0">Data Promotions</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Promotions</li>
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
                <a class="btn btn-primary mb-2" href="/ecommerce/admin/promotion/create.php">Create</a>
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
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "SELECT * FROM vouchers");
                    while ($row = mysqli_fetch_assoc($result)) {
                      ?>
                      <tr>
                        <td><?=$row['id']?></td>
                        <td><?=$row['code']?></td>
                        <td><?=$row['description']?></td>
                        <td><?=$row['quotas']?></td>
                        <td><?=$row['percent']?>%</td>
                        <td><?=$row['start_date']?></td>
                        <td><?=$row['expired_date']?></td>
                        <td><?="0"?></td>
                        <td>
                          <a href='/ecommerce/admin/promotion/edit.php?id=<?=$row['id']?>' class='btn btn-warning'>Edit</a>
                          <a href="/ecommerce/admin/promotion/functions/delete.php?id=<?=$row['id']?>" class="btn btn-danger" onclick="return confirm('Data <?= $row['code']; ?> Akan Dihapus');">Delete</a>
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