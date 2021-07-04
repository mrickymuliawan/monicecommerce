<?php
include("./dompdf/autoload.inc.php");
include('connection.php');

use Dompdf\Dompdf;

$pdf = new Dompdf();

$voucher = $product = $order = ""; 

$result = mysqli_query($link, "SELECT vouchers.*, COUNT(`order`.voucher_id) as voucher_used FROM vouchers LEFT JOIN `order` ON vouchers.id=`order`.voucher_id GROUP BY vouchers.id");
while ($row = mysqli_fetch_assoc($result)) {
    $voucher .= "<tr>
        <td>".$row['id']."</td>
        <td>".$row['code']."</td>
        <td>".$row['description']."</td>
        <td>".$row['quotas']."</td>
        <td>".$row['percent']."%</td>
        <td>".$row['start_date']."</td>
        <td>".$row['expired_date']."</td>
        <td>".$row['voucher_used']."</td>
    </tr>";
}

$result = mysqli_query($link, "select * from product");
while ($row = mysqli_fetch_assoc($result)) {
    $product .= "<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[stock]</td>
    <td>Rp. ".number_format($row['price'])."</td>
</tr>";
}

$result = mysqli_query($link, "SELECT u.name, o.* FROM `order` o INNER JOIN `user` u ON u.id=o.user_id");
while ($row = mysqli_fetch_assoc($result)) {
    $order .= "<tr>
    <td>$row[id]</td>
    <td>$row[name]</td>
    <td>$row[total_qty]</td>
    <td>Rp. ".number_format($row['total_price'])."</td>
    <td>".ucwords($row['status'])."</td>
</tr>";
}

$value = 
"
<h4>Data Voucher</h4>
<table border='1'>
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
        ".$voucher."
    </tbody>
</table><br/>
<h4>Data Product</h4>
<table border='1'>
    <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Stock</th>
        <th>Price</th>
        </tr>
    </thead>
    <tbody>
        ".$product."
    </tbody>
</table><br/>
<h4>Data Order</h4>
<table border='1'>
    <thead>
        <tr>
        <th>No</th>
        <th>Name</th>
        <th>Qty</th>
        <th>Total</th>
        <th>Status</th>
        </tr>
    </thead>
        ".$order."
    <tbody>
</table>
";

$pdf->loadHtml($value);
$pdf->render();
$pdf->stream();