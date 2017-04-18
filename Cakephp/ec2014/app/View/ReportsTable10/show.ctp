<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>

<script>

$(document).ready(function() {

//$('#zila_id').change( function() {
    $('#upazila_id').hide();
    $('#psa_id').hide();
    $('#union_id').hide();
 // });
}); 
</script>

<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
<b>Union:</b><select id="union_id" name="geo_code_union"><option value="">Please Select</option></select>
<br><br>
<hr>
<h3>Search With</h3>
<table style="width: 400px;">
  <tr>
    <td><b>Division:</b></td>
    <td><input type="text" id="divn_text" name="divn_text" value="<?=$divn?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td><b>Zila:</b></td>
    <td><input type="text" id="zila_text" name="zila_text" value="<?=$zila?>" readonly="readonly"></td>
  </tr>
  
</table>


<?php echo $this -> Form -> end(__('Submit')); ?>    
<br><br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php 

if($this -> request -> is('post'))
 {
?>

<div id="table_for_print">

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
 
 <tr>
   <td colspan="13"><b>Table- 10: Number of Establishments by Registration Status, Location and Upazila in 2013.</b></td>
</tr>



 <tr>
  <td rowspan=2>Upazila</td>
  <td rowspan=2>Total Establishments</td>
  <td colspan=9>Registered</td>
  <td rowspan=2>Not Registered</td>
  <td rowspan=2>Not Applicable</td>
  
 </tr>

 <tr>
  
  <td>Board of Investment</td>
  <td>BSCIC</td>
  <td>BEPZA</td>
  <td>Inspector of Factories</td>
  <td>City Corp./Munici./Up</td>
  <td>Joint Stock Co.</td>
  <td>Co-operative</td>
  <td>NGO Bureau</td>
  <td>Other</td>
</tr>

 <tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
  <td>8</td>
  <td>9</td>
  <td>10</td>
  <td>11</td>
  <td>12</td>
  <td>13</td>
 </tr>


  <?php

  $TOTAL_EST = 0;
  $TOTAL_INVESTMENT_BOARD = 0;
  $TOTAL_BSCIC = 0;
  $TOTAL_BEPZA = 0;
  $TOTAL_INS_FACTORIES = 0;
  $TOTAL_CITY_MIN_UP = 0;
  $TOTAL_JOINT_STOCK = 0;
  $TOTAL_COOPERATIVE = 0;
  $TOTAL_NGO = 0;
  $TOTAL_OTHERS = 0;
  $TOTAL_NOT_REGISTERED = 0;
  $TOTAL_NOT_APPLICABLE = 0;

  
  foreach ($result as $res)  
  { 

       $TOTAL_EST += $res['TOTAL_EST'] ;
       $TOTAL_INVESTMENT_BOARD += $res['INVESTMENT_BOARD'];
       $TOTAL_BSCIC += $res['BSCIC'];
       $TOTAL_BEPZA += $res['BEPZA'];
       $TOTAL_INS_FACTORIES += $res['INS_FACTORIES'];
       $TOTAL_CITY_MIN_UP += $res['CITY_MIN_UP'];
       $TOTAL_JOINT_STOCK += $res['JOINT_STOCK'];
       $TOTAL_COOPERATIVE += $res['COOPERATIVE'];
       $TOTAL_NGO += $res['NGO'];
       $TOTAL_OTHERS += $res['OTHERS'];
       $TOTAL_NOT_REGISTERED += $res['NOT_REGISTERED'];
       $TOTAL_NOT_APPLICABLE += $res['NOT_APPLICABLE'];


  ?>

 <tr>
   <td align="left"><?= $res['UPZILA_NAME']; ?></td>
   <td><?= $res['TOTAL_EST']; ?></td>
   <td><?= $res['INVESTMENT_BOARD']; ?></td>
   <td><?= $res['BSCIC']; ?></td>
   <td><?= $res['BEPZA']; ?></td>
   <td><?= $res['INS_FACTORIES']; ?></td>
   <td><?= $res['CITY_MIN_UP']; ?></td>
   <td><?= $res['JOINT_STOCK']; ?></td>
   <td><?= $res['COOPERATIVE']; ?></td>
   <td><?= $res['NGO']; ?></td>
   <td><?= $res['OTHERS']; ?></td>
   <td><?= $res['NOT_REGISTERED']; ?></td>
   <td><?= $res['NOT_APPLICABLE']; ?></td>
 </tr>
 
 <?php   
 }

?>
 <tr>
   <td align="left"><?= substr($zila,0,-4) ; ?></td>
   <td><?= $TOTAL_EST ; ?></td>
   <td><?= $TOTAL_INVESTMENT_BOARD ; ?></td>
   <td><?= $TOTAL_BSCIC; ?></td>
   <td><?= $TOTAL_BEPZA; ?></td>
   <td><?= $TOTAL_INS_FACTORIES; ?></td>
   <td><?= $TOTAL_CITY_MIN_UP; ?></td>
   <td><?= $TOTAL_JOINT_STOCK; ?></td>
   <td><?= $TOTAL_COOPERATIVE; ?></td>
   <td><?= $TOTAL_NGO; ?></td>
   <td><?= $TOTAL_OTHERS; ?></td>
   <td><?= $TOTAL_NOT_REGISTERED; ?></td>
   <td><?= $TOTAL_NOT_APPLICABLE; ?></td>

 </tr>


</table>

<br><div class="notice"> </div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php 

 }

 ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
