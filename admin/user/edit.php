<?php
include('../layout/head.php');
include('../../connection.php');
include('../../config.php');

$result = mysqli_query($link, "select * from user where id=$_GET[id]");
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
                        <h1 class="m-0">Edit User</h1>
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
                                <form action="functions/update.php" method="POST">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="hidden" name="id" value="<?=$row['id']?>">
                                        <input name="name" type="text" class="form-control" value="<?=$row['name']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="email" class="form-control" aria-describedby="emailHelp" value="<?=$row['email']?>">
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input name="password" type="password" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control">
                                            <option value=""></option>
                                            <option value="user">User</option>
                                            <option value="admin">Admin</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>

<?php include('layout/foot.php') ?>