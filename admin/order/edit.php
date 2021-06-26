<?php
include('../layout/head.php');
include('../../connection.php');
include('../../config.php');

$result = mysqli_query($link, "select u.name buyer_name ,o.id, oi.quantity, oi.price , p.name, p.price product_price, o.status, o.total_price, o.total_qty from `order` o 
right join `order_item` oi on oi.order_id=o.id 
inner join `product` p on oi.product_id=p.id 
inner join `user` u on u.id=o.user_id
where o.id=$_GET[id]");
$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}
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
                        <h1 class="m-0">Order Edit</h1><br/>
                        <h5>Name: <strong><?=ucwords($data[0]['buyer_name'])?></strong></h3>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item"><a href="/ecommerce/admin/order/all_orders.php">Order</a></li>
                            <li class="breadcrumb-item active">Order Edit</li>
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
                                    <div class="col-md-7">
                                        <a class="btn btn-danger mb-2" href="/ecommerce/admin/order/all_orders.php"><em class="fas fa-arrow-left"></em> Back</a>
                                    </div>
                                    <div class="col-md-5">
                                        <form action="functions/update.php" method="POST" class="row">
                                            <div class="col-md-10">
                                                <div class="form-group row">
                                                    <label class="col-sm-7 col-form-label text-right">Status</label>
                                                    <input type="hidden" name="id" value="<?=$data[0]['id']?>">
                                                    <select class="col-sm-5 form-control"name="status">
                                                        <option value="">--</option>
                                                        <option value="pending payment" <?= $data[0]['status'] == 'pending payment' ? "selected" : ""?>>Pending Payment</option>
                                                        <option value="proses" <?= $data[0]['status'] == "proses" ? "selected" : ""?>>Proses</option>
                                                        <option value="dikirim" <?= $data[0]['status'] == "dikirim" ? "selected" : ""?>>Dikirim</option>
                                                        <option value="selesai" <?= $data[0]['status'] == "selesai" ? "selected" : ""?>>Selesai</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <th>Product Name</th>
                                        <th>Product Price</th>
                                        <th>Order Qty</th>
                                        <th>Order Price</th>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($data as $key => $value) {?>
                                        <tr>
                                            <td><?=$value['name']?></td>
                                            <td>Rp. <?=number_format($value['product_price'])?></td>
                                            <td><?=$value['quantity']?></td>
                                            <td>Rp. <?=number_format($value['price'])?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="2" class="text-right"><strong>Total</strong></td>
                                            <td><?=$data[0]['total_qty']?></td>
                                            <td>Rp. <?=number_format($data[0]['total_price'])?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div><!-- /.content -->
    </div><!-- /.content-wrapper -->
</div>

<?php include('layout/foot.php') ?>