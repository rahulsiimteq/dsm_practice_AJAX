<?php
$conn = mysqli_connect("localhost","root","K!ller.21896#","dsm_new");
  $shape = "SELECT distinct(`attribute_name`),`attribute_id`,attribute_label FROM `attributes` where `attribute_type` = 'Shape'";
  $sql2 = mysqli_query($conn, $shape);
  $status_table = "SELECT distinct(diamond_status) AS status,count(diamond_status) AS count,CEIL(sum(diamond_size)) AS carat FROM `diamonds` WHERE diamond_type = 'Certified' AND diamond_lot_no LIKE 'C%' AND diamond_status NOT IN ('Invoiced','Deleted') group by diamond_status ORDER BY diamond_id DESC";
  $status_table_result = mysqli_query($conn, $status_table);

  $total_cert = mysqli_fetch_assoc(mysqli_query($conn,"SELECT
 ROUND(SUM(`diamond_price_total`),2) AS sumTotal,
 ROUND(SUM(`diamond_price_total_revaluated`),2) AS revalTotal,
 ROUND(SUM(`diamond_price_total_final`),2) AS finalTotal,
 ROUND(SUM(`diamond_price_sell`),2) AS sellTotal,
 ROUND(SUM(`diamond_size`),2) AS caratTotal,
 COUNT(*) AS certCount

FROM
 diamonds
WHERE
	`diamond_type` = 'Certified'
AND `diamond_lot_no` LIKE 'C%'
AND `diamond_status` NOT IN ('Invoiced','Deleted')"));

$total_cert_temp = mysqli_fetch_assoc(mysqli_query($conn,"SELECT
ROUND(SUM(`diamond_price_total`),2) AS TempsumTotal,
ROUND(SUM(`diamond_price_total_revaluated`),2) AS TemprevalTotal,
ROUND(SUM(`diamond_price_total_final`),2) AS TempfinalTotal,
ROUND(SUM(`diamond_price_sell`),2) AS TempsellTotal,
ROUND(SUM(`diamond_size`),2) AS TempcaratTotal,
COUNT(*) AS tempCount
FROM
diamonds
WHERE
`diamond_type` = 'Certified'
AND `diamond_lot_no` LIKE 'T%'
AND `diamond_status` NOT IN ('Invoiced','Deleted')"));

?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>DSM | Certified</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    </head>
  <body>
    <div class="container-fluid text-center">
      <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="#">Diamond Inventory</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="index.php">Certified <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="black.php">Black</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="fancy.php">Fancy</a>
            </li>
         <li class="nav-item">
              <a class="nav-link" href="matchingpair.php">Matching Pair</a>
            </li>
          </ul>
        </div>
      </nav>
    <?php $started_at = microtime(true); ?>

<div class="row">
  <div class="form-group col-md-5">
            <label for="search_table" class="control-label">Search Inventory</label>
            <input type="text" name="search_table" id="search_table" placeholder="Search Inventory" class="form-control" />
  </div>


<div class="col-md-4" style="float:right;">
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Status</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Certified</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent" >
    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
      <table class="table table-sm col-md-4 table-bordered" style="border:1px solid black;">
      <thead>
        <th>Status</th>
        <th>Count</th>
        <th>Carat</th>
       </thead>
       <tbody>

         <?php while($status = mysqli_fetch_assoc($status_table_result)):
          if ($status['status'] == 'InTranist'){ ?>
            <tr style="background-color: #f9e79f ;">
            <td><button type="button" class="btn btn-link status2" value="<?= $status['status'] ?>"><?php echo $status['status'] ?></button></td>
            <td><?php echo $status['count'] ?></td>
            <td><?php echo $status['carat'] ?></td>
          </tr>
        <?php } if($status['status'] == 'Available'){ ?>
          <tr style="background-color: #FDFEFE;">
          <td><button type="button" class="btn btn-link status2"  value="<?= $status['status'] ?>"><?php echo $status['status'] ?></button></td>
          <td><?php echo $status['count'] ?></td>
          <td><?php echo $status['carat'] ?></td>
        </tr>
      <?php } if($status['status'] == 'Reserve'){ ?>
          <tr style="background-color:#c4dbea;">
          <td><button type="button" class="btn btn-link status2"  value="<?= $status['status'] ?>"><?php echo $status['status'] ?></button></td>
          <td><?php echo $status['count'] ?></td>
          <td><?php echo $status['carat'] ?></td>
        </tr>
      <?php } if($status['status'] == 'In Transfer Process'){ ?>
          <tr style="background-color:#a9dfbf;">
          <td><button type="button" class="btn btn-link status2"  value="<?= $status['status'] ?>"><?php echo $status['status'] ?></button></td>
          <td><?php echo $status['count'] ?></td>
          <td><?php echo $status['carat'] ?></td>
        </tr>
      <?php } if($status['status'] == 'On Consignment') { ?>
        <tr style="background-color: #f1c4c0;">
        <td><button type="button" class="btn btn-link status2"  value="<?= $status['status'] ?>"><?php echo $status['status'] ?></button></td>
        <td><?php echo $status['count'] ?></td>
        <td><?php echo $status['carat'] ?></td>
      </tr>
        <?php } endwhile; ?>

       </tbody>
    </table></div>
    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
      <table class="table col-md-4 table-bordered" style="border:1px solid black;">
        <thead>
          <th>Desc/type</th>
          <th>Certified</th>
          <th>Temp.Cert</th>
          <th>Total</th>
        </thead>
        <tbody>
          <tr>
          <th>Orig.Price</th>
          <td><?=$total_cert['sumTotal']?></td>
          <td><?=$total_cert_temp['TempsumTotal']?></td>
          <td><?=$total_cert['sumTotal'] + $total_cert_temp['TempsumTotal']?></td>
        </tr>
          <tr>
          <th>Rev.Price</th>
          <td><?=$total_cert['revalTotal']?></td>
          <td><?=$total_cert_temp['TemprevalTotal']?></td>
          <td><?= $total_cert['revalTotal'] + $total_cert_temp['TemprevalTotal'] ?></td>
        </tr>
        <tr>
        <th>Fin.Price</th>
        <td><?=$total_cert['finalTotal']?></td>
        <td><?=$total_cert_temp['TempfinalTotal']?></td>
        <td><?= $total_cert['finalTotal'] + $total_cert_temp['TempfinalTotal'] ?></td>
      </tr>
      <tr>
      <th>Sell.Price</th>
      <td><?=$total_cert['sellTotal']?></td>
      <td><?=$total_cert_temp['TempsellTotal']?></td>
      <td><?=$total_cert['sellTotal'] + $total_cert_temp['TempsellTotal'] ?></td>
    </tr>
    <tr>
    <th>Carat</th>
    <td><?= $total_cert['caratTotal']?></td>
    <td><?= $total_cert_temp['TempcaratTotal']?></td>
    <td><?= $total_cert['caratTotal'] + $total_cert_temp['TempcaratTotal'] ?></td>
  </tr>
  <tr>
  <th># Diamonds</th>
  <td><?= $total_cert['certCount']?></td>
  <td><?= $total_cert_temp['tempCount']?></td>
  <td><?= $total_cert['certCount'] + $total_cert_temp['tempCount'] ?></td>
</tr>

        </tbody>
      </table>
    </div>


  </div>




</div>

</div>

<div class="row">



      <fieldset class="form-group">
        <div class="shapebox">
          <?php while($row_shape = mysqli_fetch_assoc($sql2)): ?>
            <?php
                 $sql_count = mysqli_query($conn, "SELECT COUNT(*) from `diamonds` WHERE diamond_type = 'Certified' AND `diamond_shape_id` = '".$row_shape['attribute_id']."' AND diamond_lot_no LIKE 'C%' AND diamond_status NOT IN ('Invoiced','Deleted') ");
                 $row_count = mysqli_fetch_array($sql_count);

                  if($row_count[0] != 0){
                ?>

                <button class="btn btn-outline-primary product" value="<?=$row_shape['attribute_id']?>"  name = 'shape' type="button" id="product<?=$row_shape['attribute_id']?>"  > <img height="20" width="20" src="img\<?=$row_shape['attribute_name']?>.png"><?= $row_shape['attribute_label']."(".$row_count[0].")" ?> </button>
          <?php } endwhile;?>
          </div>
      </fieldset>


</div>

    <table class="table table-bordered" id="searchtable">
      <thead class="table-inverse">
        <!-- <th><input type="checkbox" class="form-check-input" id="select_all" name = "select_all"></th> -->
        <th>LOT NO #</th>
        <th>LOC</th>
        <th>SHAPE</th>
        <th>CARAT</th>
        <th>LAB</th>
        <th>CERTIFICATE</th>
        <th>CLR</th>
        <th>CLA</th>
        <th>FLR</th>
        <th>FCUT</th>
        <th>POL</th>
        <th>SYM</th>
        <th>INS</th>
        <th>AINS</th>
        <th>MEASUREMENT L*B*H</span></th>
        <th>ORIGINAL RAPNET</th>
        <th>ORGINAL DISCOUNT</th>
        <th>ORIGINAL P/C </th>
        <th>ORIGINAL TOTAL</th>
        <th>REVALUATED DISCOUNT</th>
        <th>REVALUATED P/C</th>
        <th>REVALUATED TOTAL</th>
        <th>FINAL RAPNET</th>
        <th>FINAL DISCOUNT</th>
        <th>FINAL P/C</th>
        <th>FINAL TOTAL</th>
        <th>SELLING DISCOUNT</th>
        <th>SELLING P/C PRICE</th>
        <th>SELLING TOTAL</th>
        <th>STATUS</th>
        <th>CUSTOMER</th>
        <th>FRONT VIEW</th>
        <th>RAPNET VIEW</th>
        <th>PURCHASE DATE (DD/MM/YYYY)</th>
        <th>PARTY</th>
        <th>APPROVAL NO</th>
        <th>APPROVAL DATE</th>
      </thead>
      <tbody id = "display">

      </tbody>
    </table>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

<script type="text/javascript">

$(window).load(function() {
  $("#product2").addClass("active");
  $.ajax({
    url: "show_diamond_certified.php",
    context: document.body,
    success: function(html){
       $("#display").html(html);
    }
  });
});

$(document).ready(function() {
    $(".product").click(function()
      {
         var selectedid = this.id;
         $('.product.active').removeClass('active');
         $("#"+selectedid).addClass("active");
         var id=$(this).val();
         var dataString = 'shape='+ id;
         $.ajax
         ({
          type: "POST",
          url: "show_diamond_certified.php",
          data: dataString,
          cache: false,
          success: function(html)
          {
             $("#display").html(html);
          }
         });
    });
  });
</script>
    <script type="text/javascript">
         $("#search_table").keyup(function(){
           _this = this;
           // Show only matching TR, hide rest of them
           $.each($("#searchtable tbody tr"), function() {
           if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
               $(this).hide();
               else
               $(this).show();
           });
         });
         </script>
         <script type="text/javascript">
      $('.status2').click(function() {
        var id = $(this).val();
        $('#search_table').val(id);
        _this = this;
        // Show only matching TR, hide rest of them
        $.each($("#searchtable tbody tr"), function() {
        if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
            $(this).hide();
            else
            $(this).show();
        });
      });
    </script>
    <!-- <script type="text/javascript">


    var select_all = document.getElementById("select_all"); //select all checkbox
    var checkboxes = document.getElementsByClassName("checkbox"); //checkbox items

    //select all checkboxes
    select_all.addEventListener("change", function(e){
        for (i = 0; i < checkboxes.length; i++) {
            checkboxes[i].checked = select_all.checked;
        }
    });


    for (var i = 0; i < checkboxes.length; i++) {
        checkboxes[i].addEventListener('change', function(e){ //".checkbox" change
            //uncheck "select all", if one of the listed checkbox item is unchecked
            if(this.checked == false){
                select_all.checked = false;
            }
            //check "select all" if all checkbox items are checked
            if(document.querySelectorAll('.checkbox:checked').length == checkboxes.length){
                select_all.checked = true;
            }
        });
    }
    </script> -->
               <?php echo 'Cool, that only took ' . (microtime(true) - $started_at) ?>
  </body>

</html>
