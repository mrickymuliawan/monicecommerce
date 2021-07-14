<?php include('../../connection.php');?>

<table border="1" style="width: 50%; text-align:center;">
    <thead>
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
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
        </tr>
    <?php } ?>
    </tbody>
</table>