<?php

include('../../connection.php');
?>
<table border="1" style="width: 50%; text-align:center;">
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