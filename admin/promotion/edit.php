<?php
include('../layout/head.php');
$query = mysqli_query($link, "select * from vouchers where id=$_GET[id]");
$result = mysqli_fetch_assoc($query);
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
            <h1 class="m-0">Edit Voucher</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Promotion</li>
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
                <form action="functions/update.php" method="POST">
                  <div class="form-group">
                    <label>Code</label>
                    <input type="hidden" name="id" value="<?=$result['id']?>">
                    <input name="code" type="text" class="form-control" value="<?=$result['code']?>">
                  </div>
                  <div class="form-group">
                    <label>Description</label>
                    <input name="description" type="text" class="form-control" value="<?=$result['description']?>">
                  </div>
                  <div class="form-group">
                    <label>Quotas</label>
                    <input name="quota" type="number" class="form-control" value="<?=$result['quotas']?>">
                  </div>
                  <div class="form-group">
                    <label>Percent</label>
                    <input type="number" class="form-control" name="percent" value="<?=$result['percent']?>">
                  </div>
                  <div class="form-group">
                    <label>Start Date</label>
                    <input type="datetime-local" class="form-control" name="start_date" id="start" value="<?=date("Y-m-d", strtotime($result['start_date']))."T".date("H:i", strtotime($result['start_date']))?>">
                  </div>
                  <div class="form-group">
                    <label>Expire Date</label>
                    <input type="datetime-local" name="expire_date" class="form-control" value="<?=date("Y-m-d", strtotime($result['expired_date']))."T".date("H:i", strtotime($result['expired_date']))?>">
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