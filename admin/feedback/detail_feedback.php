<?php
include('../layout/head.php');
include('../../config.php');

$result = mysqli_query($link, "select * from feedback where id=$_GET[id]");
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
            <h1 class="m-0">Feedback</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">feedback</li>
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
                <form>
                  <div class="form-group">
                    <label>Name</label>
                    <input disabled name="name" value="<?= $row['name'] ?>" type="text" class="form-control" aria-describedby="emailHelp">
                  </div>
                  <div class="form-group">
                    <label>Email</label>
                    <input disabled name="email" value="<?= $row['email'] ?>" type="text" class="form-control">
                  </div>
                  <div class="form-group">
                    <label>Price</label>
                    <textarea disabled name="" id="" cols="30" rows="10" class="form-control"><?= $row['message'] ?></textarea>
                  </div>

                  <a href="<?= $baseUrl ?>/admin/feedback/all_feedback.php" class="btn btn-primary">Back to Home</a>
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