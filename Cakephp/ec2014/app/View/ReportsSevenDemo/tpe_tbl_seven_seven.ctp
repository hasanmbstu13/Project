<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>

<script>

$(document).ready(function() {
  
//$('#zila_id').change( function() {
   // $('#upazila_id').hide();
   // $('#psa_id').hide();
   // $('#union_id').hide();
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
  <tr>
  
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
    <td colspan="7"><b>Table 7.7: Number of Establishments by Mode of Sales, Accounting System and Upazila in 2013</b></td>
  </tr>

 <tr>
      <td rowspan="2"><strong>Type</strong></td>
      <td rowspan="2"><strong>Total Establishments</strong></td>
      <td colspan="3"><strong>Mode of Sales</strong></td>
      <td colspan="2"><strong>Accounting System</strong></td>
    </tr>

    <tr>
      <td>Retail</td>
      <td>Wholesale</td>
      <td>Not Applicable</td>
      <td>Yes</td>
      <td>No</td>
    </tr>

    <tr>
      <td>1 </td>
      <td>2 </td>
      <td>3 </td>
      <td>4 </td>
      <td>5 </td>
      <td>6 </td>
      <td>7 </td>
    </tr>



  <?php

  $TOTAL_EST = 0;
  $TOTAL_ENABLED = 0;
  $TOTAL_NOT_ENABLED = 0;

  
  foreach ($result as $res)  
  { 

       $TOTAL_EST += $res['TOTAL_EST'] ;
       $TOTAL_RETAIL += $res['RETAIL'];
       $TOTAL_WHOLESALE += $res['WHOLESALE'];
       $TOTAL_NOT_APPLICABLE += $res['NOT_APPLICABLE'];
       $TOTAL_ACCOUNTABLE += $res['ACCOUNT'];
       $TOTAL_NOT_ACCOUNTABLE += $res['NOT_ACCOUNT'];

  ?>

 <tr>
   <td align="left"><?= $res['UNION_NAME']; ?></td>
   <td><?= $res['TOTAL_EST']; ?></td>
   <td><?= $res['RETAIL']; ?></td>
   <td><?= $res['WHOLESALE']; ?></td>
   <td><?= $res['NOT_APPLICABLE']; ?></td>
   <td><?= $res['ACCOUNT']; ?></td>
   <td><?= $res['NOT_ACCOUNT']; ?></td>
  
 </tr>
 
 <?php   
 }

?>
 <tr>
    <td align="left"><?= $upazila ; ?></td>
   <td><?= $TOTAL_EST ; ?></td>
   <td><?= $TOTAL_RETAIL ; ?></td>
   <td><?= $TOTAL_WHOLESALE; ?></td>
   <td><?= $TOTAL_NOT_APPLICABLE ; ?></td>
   <td><?= $TOTAL_ACCOUNTABLE ; ?></td>
   <td><?= $TOTAL_NOT_ACCOUNTABLE; ?></td>
   
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
