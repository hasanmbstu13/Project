<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>

<script>
/*
$(document).ready(function() {

//$('#zila_id').change( function() {
    $('#upazila_id').hide();
    $('#psa_id').hide();
    $('#union_id').hide();
 // });
});   */
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
  <tr>
    <td><b>Upazila:</b></td>
    <td><input type="text" id="upazila_text" name="upazila_text" value="<?=$upazila?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td><b>PSA:</b></td>
    <td><input type="text" id="psa_text" name="psa_text" value="<?=$psa?>" readonly="readonly"></td>
  </tr>
  <tr>
    <td><b>Union:</b></td>
    <td><input type="text" id="union_text" name="union_text" value="<?=$union?>" readonly="readonly"></td>
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
    <td colspan="7"><b>Table 6.2: Number of manufacturing establishments by selected working facilities</b></td>
  </tr>

 <tr >
  <td rowspan=1 >Location</td>
  <td colspan=2 >Total</td>
  <td colspan=4 >Establishments having following working facilities</td>
 </tr>


 <tr>
  <td></td>
  <td>Establishments</td>
  <td>Person Engaged</td>
  <td>Fighting equipments</td>
  <td>Waste management</td>
  <td>Toilet facility </td>
  <td>Separate toilet for female </td>
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

  $total_est = $total_est_urban + $total_est_rural; 
  $total_person = $total_person_urban + $total_person_rural; 
  $total_fire_equipment = $total_fire_equipment_urban + $total_fire_equipment_rural;
  $total_waste_management = $total_waste_management_urban + $total_waste_management_rural ;
  $total_toilet_facility = $total_toilet_facility_urban + $total_toilet_facility_rural ;
  $total_women_toilet = $total_women_toilet_urban + $total_women_toilet_rural;

  ?>

 <tr>
   <td>Urban</td>
   <td><?=$total_est_urban ; ?></td>
   <td><?=$total_person_urban ; ?></td>
   <td><?=$total_fire_equipment_urban ; ?></td>
   <td><?=$total_waste_management_urban ; ?></td>
   <td><?=$total_toilet_facility_urban ; ?></td>
   <td><?=$total_women_toilet_urban ; ?></td>
 </tr>


 <tr>
   <td>Rural</td>
   <td><?=$total_est_rural ; ?></td>
   <td><?=$total_person_rural ; ?></td>
   <td><?=$total_fire_equipment_rural ; ?></td>
   <td><?=$total_waste_management_rural ; ?></td>
   <td><?=$total_toilet_facility_rural ; ?></td>
   <td><?=$total_women_toilet_rural ; ?></td>
 </tr>


 <tr>
   <td>Total</td>
   <td><?= $total_est; ?></td>
   <td><?= $total_person; ?></td>
   <td><?= $total_fire_equipment; ?></td>
   <td><?= $total_waste_management; ?></td>
   <td><?= $total_toilet_facility; ?></td>
   <td><?= $total_women_toilet; ?></td>
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

 } ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
