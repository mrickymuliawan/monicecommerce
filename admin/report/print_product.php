<?php

include('../../connection.php');
?>
<?php include('print_head.php'); ?>
<h2 style="text-align: center;">Product Report</h2>

<table border="1" style="width: 100%; text-align:center;">
  <thead>
    <tr>
      <th>No</th>
      <th>Category Name</th>
      <th>Name</th>
      <th>Stock</th>
      <th>Price</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $result = mysqli_query($link, "select p.*, c.name as cname from product p join categories c on p.category_id=c.id");

    while ($row = mysqli_fetch_assoc($result)) {
    ?>
      <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['cname'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['stock'] ?></td>
        <td>Rp. <?= number_format($row['price']) ?></td>
      </tr>
    <?php } ?>
  </tbody>
</table>