<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
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
          <td colspan="7"><b>Table 3.4: Average Size of Establishment by Type, Location and Sex in 2001 & 03 and in 2013</b></td>
        </tr>
        <tr>
            <td rowspan="3"><strong>Type</strong></td>
            <td colspan="6"><strong>Average Size of Establishments</strong></td>
       </tr>
        
        <tr>
            <td colspan="3">2001 &amp; 03</td>
            <td colspan="3" >2013
        </tr>  

        <tr style='height:.1in'>
            <td>Total</td>
            <td>Male</td>
            <td>Female</td>
            <td>Total</td>
            <td>Male</td>            
            <td>Female</td>
            
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








 <!-- ONE -->
<tr>
  <td>
    <strong>Total</strong>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_est_person / $total_est), 2); ?></td>
  <td><?=round(($total_est_male / $total_est), 2); ?></td>
  <td><?=round(($total_est_female / $total_est), 2); ?></td>
 
 </tr>

 <tr>  <!-- Permanent -->
  <td>Permanent</td>
   <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_parmanent_est_person / $total_parmanent_est), 2); ?></td>
  <td><?=round(($total_parmanent_est_male / $total_parmanent_est), 2); ?> </td>
  <td><?=round(($total_parmanent_est_female / $total_parmanent_est), 2); ?></td>
  

 </tr>





 <tr>  <!-- Temporary -->
  <td>Temporary</td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_temporary_est_person / $total_temporary_est), 2); ?></td>
  <td><?=round(($total_temporary_est_male / $total_temporary_est), 2); ?></td>
  <td><?=round(($total_temporary_est_female / $total_temporary_est), 2); ?></td>
  
 </tr>




 <tr> <!-- Household -->
  <td>Economic Household</td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_household_est_person / $total_household_est), 2); ?></td>
  <td><?=round(($total_household_est_male / $total_household_est), 2); ?></td>
  <td><?=round(($total_household_est_female / $total_household_est), 2); ?></td>
 

 </tr>


 

<!-- TWO -->

 <tr>
  <td>
    <strong>Urban</strong>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_urban_est_person / $total_urban_est), 2); ?></td>
  <td><?=round(($total_urban_est_male / $total_urban_est), 2); ?></td>
  <td><?=round(($total_urban_est_female / $total_urban_est), 2); ?></td>
  

 </tr>

 <tr>  <!-- Permanent -->
  <td>Permanent</td>
   <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_urban_parmanent_est_person / $total_urban_parmanent_est), 2); ?></td>
 <td><?=round(($total_urban_parmanent_est_male / $total_urban_parmanent_est), 2); ?></td>
  <td><?=round(($total_urban_parmanent_est_female / $total_urban_parmanent_est), 2); ?></td>
  

 </tr>





 <tr>  <!-- Temporary -->
  <td>Temporary</td>
   <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_urban_temporary_est_person / $total_urban_temporary_est), 2); ?></td>
  <td><?=round(($total_urban_temporary_est_male / $total_urban_temporary_est), 2); ?></td>
  <td><?=round(($total_urban_temporary_est_female / $total_urban_temporary_est), 2); ?></td>
 
 </tr>




 <tr> <!-- Household -->
  <td>Economic Household</td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_urban_household_est_person / $total_urban_household_est), 2); ?></td>
  <td><?=round(($total_urban_household_est_male / $total_urban_household_est), 2); ?></td>
  <td><?=round(($total_urban_household_est_female / $total_urban_household_est), 2); ?></td>
  
 </tr>






<!-- THREE -->
 <tr>
  <td>
    <strong>Rural</strong>
  </td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_rural_est_person / $total_rural_est), 2); ?></td>
  <td><?=round(($total_rural_est_male / $total_rural_est), 2); ?></td>
  <td><?=round(($total_rural_est_female / $total_rural_est), 2); ?></td>
 

 </tr>

 <tr>  <!-- Permanent -->
  <td>Permanent</td>
   <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_rural_parmanent_est_person/ $total_rural_parmanent_est), 2); ?></td>
  <td><?=round(($total_rural_parmanent_est_male/ $total_rural_parmanent_est), 2); ?></td>
  <td><?=round(($total_rural_parmanent_est_female/ $total_rural_parmanent_est), 2); ?></td>
  

 </tr>





 <tr>  <!-- Temporary -->
  <td>Temporary</td>
   <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_rural_temporary_est_person/ $total_rural_temporary_est), 2); ?></td>
  <td><?=round(($total_rural_temporary_est_male/ $total_rural_temporary_est), 2); ?></td>
  <td><?=round(($total_rural_temporary_est_female/ $total_rural_temporary_est), 2); ?></td>
  

 </tr>




 <tr> <!-- Household -->
  <td>Economic Household</td>
  <td></td>
  <td></td>
  <td></td>
  <td><?=round(($total_rural_household_est_person/ $total_rural_household_est), 2); ?></td>
  <td><?=round(($total_rural_household_est_male/ $total_rural_household_est), 2); ?></td>
  <td><?=round(($total_rural_household_est_female/ $total_rural_household_est), 2); ?></td>
 
 
 </tr>
 
</table> 

 <br><div class="notice"> </div>


</div>
<br>
<br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php } ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>

