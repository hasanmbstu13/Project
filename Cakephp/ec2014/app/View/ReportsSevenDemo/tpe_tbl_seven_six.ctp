<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>

<script>

$(document).ready(function() {

//$('#zila_id').change( function() {
    //$('#upazila_id').hide();
    //$('#psa_id').hide();
    //$('#union_id').hide();
 // });
}); 
</script>

<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
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
</table>


<?php echo $this -> Form -> end(__('Submit')); ?>    
<br><br>
<hr>

<?php 

if($this -> request -> is('post'))
 {
?>

<div id="table_for_print">

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">

<tr>
    <td colspan="5"><b>Table 7.6: Registration Status of Establishments by Upazila in 2013</b></td>
  </tr>

 <tr>
  <td>Union</td>
  <td>Total Establishments</td>
  <td>Registered</td>
  <td>Non-Registered</td>
  <td>Not Applicable </td>
 </tr>

 <tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>

 </tr>


  <?php

  $TOTAL_EST = 0;
  $TOTAL_REGISTERED = 0;
  $TOTAL_NON_REGISTERED = 0;
  $TOTAL_NOT_APPLICABLE = 0;

  
  foreach ($result as $res)  
  { 

       $TOTAL_EST += $res['TOTAL_EST'] ;
       $TOTAL_REGISTERED += $res['REGISTERED'];
       $TOTAL_NON_REGISTERED += $res['NON_REGISTERED'];
       $TOTAL_NOT_APPLICABLE += $res['NOT_APPLICABLE'];

  ?>

 <tr>
       <td align="left"><?= $res['UNION_NAME']; ?></td>
       <td><?= $res['TOTAL_EST']; ?></td>
       <td><?= $res['REGISTERED']; ?></td>
       <td><?= $res['NON_REGISTERED']; ?></td>
       <td><?= $res['NOT_APPLICABLE']; ?></td>
 </tr>
 
 <?php   
 }

?>
 <tr>
   <td align="left"><?= $upazila ; ?></td>
   <td><?= $TOTAL_EST ; ?></td>
   <td><?= $TOTAL_REGISTERED ; ?></td>
   <td><?= $TOTAL_NON_REGISTERED; ?></td>
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
