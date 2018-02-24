<?php

$conn = mysqli_connect("localhost","root","K!ller.21896#","dsm_new");

if (isset($_POST['shape'])) {
  $shape_id = $_POST['shape'];

$diamond_black = mysqli_query($conn,"SELECT * FROM diamonds WHERE diamond_shape_id = '$shape_id' AND diamond_type ='Black' AND diamond_lot_no LIKE 'B%'");
}else {

$diamond_black = mysqli_query($conn,"SELECT * FROM diamonds WHERE diamond_shape_id = '2' AND diamond_type ='Black' AND diamond_lot_no LIKE 'B%'");
}

 while ($diamond = mysqli_fetch_assoc($diamond_black)) :
            $black_customer = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users where user_id = '".$diamond['diamond_customer_id']."'"));
            $black_shape = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM attributes where attribute_id = '".$diamond['diamond_shape_id']."'"));
            $black_office = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM offices where office_id = '".$diamond['office_id']."'"));
    ?>
<?php  if ($diamond['diamond_status'] == 'InTranist'){ ?>
  <tr style="background-color: #f9e79f ;">
<td><?=$diamond['diamond_lot_no']?></td>
<td><?=$black_shape['attribute_name']?></td>
<td><?=$black_office['office_name']?></td>
<td><?=$diamond['diamond_size']?></td>
<td><?=$diamond['diamond_desc']?></td>
<td><?=$diamond['diamond_meas1']?> X <?=$diamond['diamond_meas2']?> X <?=$diamond['diamond_meas3']?></td>
<td><?="$ ".round($diamond['diamond_price_perct'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_revaluated'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total_revaluated'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_final'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total_final'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_sell'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_sell'],2)?></td>
<td><?=$diamond['diamond_status']?></td>
<td><?=$black_customer['company_name']?></td>
<td><?=$diamond['diamond_status_front']?></td>
<td><?=date('d/m/Y',strtotime($diamond['diamond_purchase_date'])) ?></td>
<td><?=$diamond['diamond_party_name']?></td>
</tr>
<?php } if($diamond['diamond_status'] == 'Available'){ ?>
<tr style="background-color: #FDFEFE;">
<td><?=$diamond['diamond_lot_no']?></td>
<td><?=$black_shape['attribute_name']?></td>
<td><?=$black_office['office_name']?></td>
<td><?=$diamond['diamond_size']?></td>
<td><?=$diamond['diamond_desc']?></td>
<td><?=$diamond['diamond_meas1']?> X <?=$diamond['diamond_meas2']?> X <?=$diamond['diamond_meas3']?></td>
<td><?="$ ".round($diamond['diamond_price_perct'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_revaluated'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total_revaluated'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_final'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_total_final'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_perct_sell'],2)?></td>
<td><?="$ ".round($diamond['diamond_price_sell'],2)?></td>
<td><?=$diamond['diamond_status']?></td>
<td><?=$black_customer['company_name']?></td>
<td><?=$diamond['diamond_status_front']?></td>
<td><?=date('d/m/Y',strtotime($diamond['diamond_purchase_date'])) ?></td>
<td><?=$diamond['diamond_party_name']?></td>
</tr>
<?php } if($diamond['diamond_status'] == 'Reserve'){ ?>
  <tr style="background-color:#c4dbea;">
    <td><?=$diamond['diamond_lot_no']?></td>
    <td><?=$black_shape['attribute_name']?></td>
    <td><?=$black_office['office_name']?></td>
    <td><?=$diamond['diamond_size']?></td>
    <td><?=$diamond['diamond_desc']?></td>
    <td><?=$diamond['diamond_meas1']?> X <?=$diamond['diamond_meas2']?> X <?=$diamond['diamond_meas3']?></td>
    <td><?="$ ".round($diamond['diamond_price_perct'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_total'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_perct_revaluated'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_total_revaluated'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_perct_final'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_total_final'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_perct_sell'],2)?></td>
    <td><?="$ ".round($diamond['diamond_price_sell'],2)?></td>
    <td><?=$diamond['diamond_status']?></td>
    <td><?=$black_customer['company_name']?></td>
    <td><?=$diamond['diamond_status_front']?></td>
    <td><?=date('d/m/Y',strtotime($diamond['diamond_purchase_date'])) ?></td>
    <td><?=$diamond['diamond_party_name']?></td>
    </tr>
  <?php } if($diamond['diamond_status'] == 'In Transfer Process'){ ?>
      <tr style="background-color:#a9dfbf;">
        <td><?=$diamond['diamond_lot_no']?></td>
        <td><?=$black_shape['attribute_name']?></td>
        <td><?=$black_office['office_name']?></td>
        <td><?=$diamond['diamond_size']?></td>
        <td><?=$diamond['diamond_desc']?></td>
        <td><?=$diamond['diamond_meas1']?> X <?=$diamond['diamond_meas2']?> X <?=$diamond['diamond_meas3']?></td>
        <td><?="$ ".round($diamond['diamond_price_perct'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_total'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_perct_revaluated'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_total_revaluated'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_perct_final'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_total_final'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_perct_sell'],2)?></td>
        <td><?="$ ".round($diamond['diamond_price_sell'],2)?></td>
        <td><?=$diamond['diamond_status']?></td>
        <td><?=$black_customer['company_name']?></td>
        <td><?=$diamond['diamond_status_front']?></td>
        <td><?=date('d/m/Y',strtotime($diamond['diamond_purchase_date'])) ?></td>
        <td><?=$diamond['diamond_party_name']?></td>
        </tr>
      <?php } if($diamond['diamond_status'] == 'On Consignment') { ?>
        <tr style="background-color: #f1c4c0;">
          <td><?=$diamond['diamond_lot_no']?></td>
          <td><?=$black_shape['attribute_name']?></td>
          <td><?=$black_office['office_name']?></td>
          <td><?=$diamond['diamond_size']?></td>
          <td><?=$diamond['diamond_desc']?></td>
          <td><?=$diamond['diamond_meas1']?> X <?=$diamond['diamond_meas2']?> X <?=$diamond['diamond_meas3']?></td>
          <td><?="$ ".round($diamond['diamond_price_perct'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_total'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_perct_revaluated'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_total_revaluated'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_perct_final'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_total_final'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_perct_sell'],2)?></td>
          <td><?="$ ".round($diamond['diamond_price_sell'],2)?></td>
          <td><?=$diamond['diamond_status']?></td>
          <td><?=$black_customer['company_name']?></td>
          <td><?=$diamond['diamond_status_front']?></td>
          <td><?=date('d/m/Y',strtotime($diamond['diamond_purchase_date'])) ?></td>
          <td><?=$diamond['diamond_party_name']?></td>
          </tr>
<?php }  endwhile; ?>
