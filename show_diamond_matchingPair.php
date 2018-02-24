<?php

  $conn = mysqli_connect("localhost","root","K!ller.21896#","dsm_new");

  if (isset($_POST['shape'])) {
    $shape_id = $_POST['shape'];

    $diamond  = "SELECT * FROM `diamonds` WHERE diamond_shape_id = '$shape_id' AND diamond_type = 'MatchingPair' AND diamond_lot_no LIKE 'M%' AND diamond_status NOT IN ('Invoiced','Deleted') ORDER BY diamond_id DESC";
    $sql = mysqli_query($conn, $diamond);
  }else {
    $diamond  = "SELECT * FROM `diamonds` WHERE diamond_shape_id = 17 AND diamond_type = 'MatchingPair' AND diamond_lot_no LIKE 'M%' AND diamond_status NOT IN ('Invoiced','Deleted') ORDER BY diamond_lot_no DESC";
    $sql = mysqli_query($conn, $diamond);
  }




while($array =  mysqli_fetch_assoc($sql)){
      $office_name_query = "SELECT `office_name` from offices WHERE `office_id` = '".$array['office_id']."'";
      $office_name = mysqli_query($conn, $office_name_query);
      $office_array = mysqli_fetch_assoc($office_name);
      $shape_name_query = "SELECT `attribute_name` as `shape` from attributes WHERE `attribute_id` = '".$array['diamond_shape_id']."'";
      $shape_name = mysqli_query($conn, $shape_name_query);
      $shape_array = mysqli_fetch_assoc($shape_name);
      $lab_name_query = "SELECT `attribute_name` as `lab` from attributes WHERE `attribute_id` = '".$array['diamond_lab_id']."'";
      $lab_name = mysqli_query($conn, $lab_name_query);
      $lab_array = mysqli_fetch_assoc($lab_name);
      $clr_name_query = "SELECT `attribute_name` as `clr` from attributes WHERE `attribute_id` = '".$array['diamond_clr_id']."'";
      $clr_name = mysqli_query($conn, $clr_name_query);
      $clr_array = mysqli_fetch_assoc($clr_name);
      $cla_name_query = "SELECT `attribute_name` as `cla` from attributes WHERE `attribute_id` = '".$array['diamond_cla_id']."'";
      $cla_name = mysqli_query($conn, $cla_name_query);
      $cla_array = mysqli_fetch_assoc($cla_name);
      $flr_name_query = "SELECT `attribute_name` as `flr` from attributes WHERE `attribute_id` = '".$array['diamond_flr_id']."'";
      $flr_name = mysqli_query($conn, $flr_name_query);
      $flr_array = mysqli_fetch_assoc($flr_name);
      $fcut_name_query = "SELECT `attribute_name` as `fcut` from attributes WHERE `attribute_id` = '".$array['diamond_fcut_id']."'";
      $fcut_name = mysqli_query($conn, $fcut_name_query);
      $fcut_array = mysqli_fetch_assoc($fcut_name);
      $pol_name_query = "SELECT `attribute_name` as `pol` from attributes WHERE `attribute_id` = '".$array['diamond_pol_id']."'";
      $pol_name = mysqli_query($conn, $pol_name_query);
      $pol_array = mysqli_fetch_assoc($pol_name);
      $sym_name_query = "SELECT `attribute_name` as `sym` from attributes WHERE `attribute_id` = '".$array['diamond_sym_id']."'";
      $sym_name = mysqli_query($conn, $sym_name_query);
      $sym_array = mysqli_fetch_assoc($sym_name);
      $diamond_company_name = "SELECT `company_name` from users WHERE `user_id` = '".$array['diamond_customer_id']."'";
      $company_name = mysqli_query($conn, $diamond_company_name);
      $company_array = mysqli_fetch_assoc($company_name);
if ($array['diamond_status'] == 'InTranist') {

   ?>

<tr style="background-color: #f9e79f ;">
<td><?php echo $array['diamond_lot_no'];?></td>
<td><?=$office_array['office_name']?></td>
<td><?=$shape_array['shape']?></td>
<td><?=$array['diamond_size']?></td>
<td><?=$clr_array['clr']?></td>
<td><?=$cla_array['cla']?></td>
<td><?=$array['diamond_meas1']?> X <?=$array['diamond_meas2']?> X <?=$array['diamond_meas3']?></td>
<td><?="$".round($array['diamond_price_perct'],2)?></td>
<td><?="$".round($array['diamond_price_total'],2)?></td>
<td><?="$".round($array['diamond_price_perct_revaluated'],2)?></td>
<td><?="$".round($array['diamond_price_total_revaluated'],2)?></td>
<td><?="$".round($array['diamond_price_perct_final'],2)?></td>
<td><?="$".round($array['diamond_price_total_final'],2)?></td>
<td><?="$".round($array['diamond_price_perct_sell'],2)?></td>
<td><?="$".round($array['diamond_price_sell'],2)?></td>
<td><?=$array['diamond_status']?></td>
<td><?=date('d/m/Y',strtotime($array['diamond_purchase_date'])) ?></td>
</tr>
<?php }
if ($array['diamond_status'] == 'Available') {

       ?>

    <tr style="background-color: #FDFEFE;">
      <td><?php echo $array['diamond_lot_no'];?></td>
      <td><?=$office_array['office_name']?></td>
      <td><?=$shape_array['shape']?></td>
      <td><?=$array['diamond_size']?></td>
      <td><?=$clr_array['clr']?></td>
      <td><?=$cla_array['cla']?></td>
      <td><?=$array['diamond_meas1']?> X <?=$array['diamond_meas2']?> X <?=$array['diamond_meas3']?></td>
      <td><?="$".round($array['diamond_price_perct'],2)?></td>
      <td><?="$".round($array['diamond_price_total'],2)?></td>
      <td><?="$".round($array['diamond_price_perct_revaluated'],2)?></td>
      <td><?="$".round($array['diamond_price_total_revaluated'],2)?></td>
      <td><?="$".round($array['diamond_price_perct_final'],2)?></td>
      <td><?="$".round($array['diamond_price_total_final'],2)?></td>
      <td><?="$".round($array['diamond_price_perct_sell'],2)?></td>
      <td><?="$".round($array['diamond_price_sell'],2)?></td>
      <td><?=$array['diamond_status']?></td>
      <td><?=date('d/m/Y',strtotime($array['diamond_purchase_date'])) ?></td>
  </tr>
<?php } ?>
<?php
if ($array['diamond_status'] == 'On Consignment') {

         ?>

      <tr style="background-color: #f1c4c0;">
        <td><?php echo $array['diamond_lot_no'];?></td>
        <td><?=$office_array['office_name']?></td>
        <td><?=$shape_array['shape']?></td>
        <td><?=$array['diamond_size']?></td>
        <td><?=$clr_array['clr']?></td>
        <td><?=$cla_array['cla']?></td>
        <td><?=$array['diamond_meas1']?> X <?=$array['diamond_meas2']?> X <?=$array['diamond_meas3']?></td>
        <td><?="$".round($array['diamond_price_perct'],2)?></td>
        <td><?="$".round($array['diamond_price_total'],2)?></td>
        <td><?="$".round($array['diamond_price_perct_revaluated'],2)?></td>
        <td><?="$".round($array['diamond_price_total_revaluated'],2)?></td>
        <td><?="$".round($array['diamond_price_perct_final'],2)?></td>
        <td><?="$".round($array['diamond_price_total_final'],2)?></td>
        <td><?="$".round($array['diamond_price_perct_sell'],2)?></td>
        <td><?="$".round($array['diamond_price_sell'],2)?></td>
        <td><?=$array['diamond_status']?></td>
        <td><?=date('d/m/Y',strtotime($array['diamond_purchase_date'])) ?></td>
        </tr>
      <?php } ?>
      <?php
      if ($array['diamond_status'] == 'In Transfer Process') {

                 ?>

              <tr style="background-color:#a9dfbf;">
                <td><?php echo $array['diamond_lot_no'];?></td>
                <td><?=$office_array['office_name']?></td>
                <td><?=$shape_array['shape']?></td>
                <td><?=$array['diamond_size']?></td>
                <td><?=$clr_array['clr']?></td>
                <td><?=$cla_array['cla']?></td>
                <td><?=$array['diamond_meas1']?> X <?=$array['diamond_meas2']?> X <?=$array['diamond_meas3']?></td>
                <td><?="$".round($array['diamond_price_perct'],2)?></td>
                <td><?="$".round($array['diamond_price_total'],2)?></td>
                <td><?="$".round($array['diamond_price_perct_revaluated'],2)?></td>
                <td><?="$".round($array['diamond_price_total_revaluated'],2)?></td>
                <td><?="$".round($array['diamond_price_perct_final'],2)?></td>
                <td><?="$".round($array['diamond_price_total_final'],2)?></td>
                <td><?="$".round($array['diamond_price_perct_sell'],2)?></td>
                <td><?="$".round($array['diamond_price_sell'],2)?></td>
                <td><?=$array['diamond_status']?></td>
                <td><?=date('d/m/Y',strtotime($array['diamond_purchase_date'])) ?></td>
            </tr>
          <?php } ?>
<?php } ?>
