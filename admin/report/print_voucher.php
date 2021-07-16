<?php

include('../../connection.php');
include('print_head.php');
?>
<h2 style="text-align: center;">Promotion Report</h2>

<table border="1" style="width: 100%; text-align:center;">
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