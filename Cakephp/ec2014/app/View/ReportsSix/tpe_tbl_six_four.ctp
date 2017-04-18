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
    <td colspan="7"><b>Table 6.4 : Number of Manufacturing Establishment by Type of Machinery Used and by Upazila in 2013</b></td>
  </tr>

 <tr>
  <td>Upazila</td>
  <td>Total Establishments</td>
  <td>Power Operating</td>
  <td>Fuel Operating</td>
  <td>Both Power and Fuel Operating</td>
  <td>Hand Operating</td>
  <td>Not Applicable </td>
 </tr>

 <tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
 </tr>


  <?php

  $TOTAL_EST = 0;
  $TOTAL_POWER_OPERATING = 0;
  $TOTAL_FUEL_OPERATING = 0;
  $TOTAL_BOTH_OPERATING = 0;
  $TOTAL_HAND_OPERATING = 0;
  $TOTAL_NOT_APPILCABLE = 0;

  
  foreach ($result as $res)  
  { 

       $TOTAL_EST += $res['TOTAL_EST'] ;
       $TOTAL_POWER_OPERATING += $res['POWER_OPERATING'];
       $TOTAL_FUEL_OPERATING += $res['FUEL_OPERATING'];
       $TOTAL_BOTH_OPERATING += $res['BOTH_OPERATING'];
       $TOTAL_HAND_OPERATING += $res['HAND_OPERATING'];
       $TOTAL_NOT_APPILCABLE += $res['NOT_APPILCABLE'];



  ?>

 <tr>
   <td align="left"><?= $res['UPZILA_NAME']; ?></td>
   <td><?= $res['TOTAL_EST']; ?></td>
   <td><?= $res['POWER_OPERATING']; ?></td>
   <td><?= $res['FUEL_OPERATING']; ?></td>
   <td><?= $res['BOTH_OPERATING']; ?></td>
   <td><?= $res['HAND_OPERATING']; ?></td>
   <td><?= $res['NOT_APPILCABLE']; ?></td>
 </tr>
 
 <?php   
 }

?>
 <tr>
    <td align="left"><?= substr($zila,0,-4) ; ?></td>
   <td><?= $TOTAL_EST ; ?></td>
   <td><?= $TOTAL_POWER_OPERATING ; ?></td>
   <td><?= $TOTAL_FUEL_OPERATING; ?></td>
   <td><?= $TOTAL_BOTH_OPERATING; ?></td>
   <td><?= $TOTAL_HAND_OPERATING; ?></td>
   <td><?= $TOTAL_NOT_APPILCABLE; ?></td>
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
