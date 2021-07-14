<?php include('../../connection.php');?>

<table style="width: 100%; text-align:center;" border="1">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $result = mysqli_query($link, "SELECT u.name, o.* FROM `order` o INNER JOIN `user` u ON u.id=o.user_id");

    while ($row = mysqli_fetch_assoc($result)) {
        $class = $row['status'] == 'pending payment' ? 'warning' : ($row['status'] == 'proses' ? 'info' : ($row['status'] == 'dikirim' ? 'primary' : 'success'));
    ?>
        <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['total_qty'] ?></td>
        <td>Rp. <?= number_format($row['total_price']) ?></td>
        <td class="text-center">
            <h5><span class="badge badge-<?= $class ?>"><?= ucwords($row['status']) ?></span></h5>
        </td>
        </tr>
    <?php } ?>
    </tbody>
</table>