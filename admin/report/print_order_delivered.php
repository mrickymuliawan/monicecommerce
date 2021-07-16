<?php include('../../connection.php'); ?>
<?php include('print_head.php'); ?>

<h2 style="text-align: center;">Sales Delivered Report</h2>
<table style="width: 100%; text-align:center;" border="1">
  <thead>
    <tr>
      <th>No</th>
      <th>Buyer Name</th>
      <th>Product Name</th>
      <th>Qty</th>
      <th>Total</th>
      <th>Created At</th>
      <th>Status</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($link, "SELECT u.name, o.*, p.name as pname FROM `order` o INNER JOIN `user` u ON u.id=o.user_id INNER JOIN order_item oi on oi.order_id=o.id INNER JOIN product p on p.id=oi.product_id where `status`='selesai' ");

    while ($row = mysqli_fetch_assoc($result)) {
      $class = $row['status'] == 'pending payment' ? 'warning' : ($row['status'] == 'proses' ? 'info' : ($row['status'] == 'dikirim' ? 'primary' : 'success'));
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['pname'] ?></td>
        <td><?= $row['total_qty'] ?></td>
        <td>Rp. <?= number_format($row['total_price']) ?></td>
        <td><?= $row['created_at'] ?></td>
        <td class="text-center">
          <h5><span class="badge badge-<?= $class ?>"><?= ucwords($row['status']) ?></span></h5>
        </td>
      </tr>
    <?php } ?>
  </tbody>
</table>