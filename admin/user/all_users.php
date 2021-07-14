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
            <h1 class="m-0">Data Users</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
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
                <a class="btn btn-success mb-2" href="<?= $baseUrl ?>/admin/user/create.php">Create</a>
                <a href="./print_users.php" class='btn btn-primary mb-2' target="_blank">Print</a>
                <table class="table table-bordered table-striped mt-3 mydatatable">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Role</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $result = mysqli_query($link, "select * from user");

                    while ($row = mysqli_fetch_assoc($result)) {
                    ?>
                      <tr>
                        <td><?= $row['id'] ?></td>
                        <td><?= $row['name'] ?></td>
                        <td><?= $row['email'] ?></td>
                        <td><?= $row['role'] ?></td>
                        <td>
                          <a href='<?= $baseUrl ?>/admin/user/edit.php?id=<?= $row['id'] ?>' class='btn btn-warning'>Edit</a>
                          <a href='<?= $baseUrl ?>/admin/user/functions/delete.php?id=<?= $row['id'] ?>' class='btn btn-danger' onclick="return confirm('User <?= $row['name']; ?> Akan Dihapus');">Delete</a>
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