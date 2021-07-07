<?php

include('../../connection.php');
?>
<table border="1" class="table table-bordered table-striped mt-3 mydatatable">
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