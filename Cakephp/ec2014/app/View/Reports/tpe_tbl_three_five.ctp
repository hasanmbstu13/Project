<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b>
<select id="divn_id" name="geo_code_divn">
	<option value="">Please Select</option>
</select>
<b>Zila:</b>
<select id="zila_id" name="geo_code_zila">
	<option value="">Please Select</option>
</select>
<b>Upazila:</b>
<select id="upazila_id" name="geo_code_upazila">
	<option value="">Please Select</option>
</select>
<b>PSA:</b>
<select id="psa_id" name="geo_code_psa">
	<option value="">Please Select</option>
</select>
<b>Union:</b>
<select id="union_id" name="geo_code_union">
	<option value="">Please Select</option>
</select>
<br>
<br>
<hr>
<h3>Search With</h3>
<table style="width: 400px;">
	<tr>
		<td><b>Division:</b></td>
		<td>
		<input type="text" id="divn_text" name="divn_text" value="<?=$divn?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Zila:</b></td>
		<td>
		<input type="text" id="zila_text" name="zila_text" value="<?=$zila?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Upazila:</b></td>
		<td>
		<input type="text" id="upazila_text" name="upazila_text" value="<?=$upazila?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>PSA:</b></td>
		<td>
		<input type="text" id="psa_text" name="psa_text" value="<?=$psa?>" readonly="readonly">
		</td>
	</tr>
	<tr>
		<td><b>Union:</b></td>
		<td>
		<input type="text" id="union_text" name="union_text" value="<?=$union?>" readonly="readonly">
		</td>
	</tr>
</table>

<?php echo $this -> Form -> end(__('Submit')); ?>
<br>
<br>
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
          <td colspan="6"><b>Table 3.5: Annual Growth Rate of Employment by Paid and Unpaid Worker and by Type of Establishment in 2001 & 03 and 2013</b></td>
        </tr>
		<tr>
			<td rowspan="2"><strong>Type</strong></td>
			<td colspan="2"><strong>2001 & 03</strong></td>
			<td colspan="2"><strong>2013</strong></td>
			<td colspan="1"><strong>Annual Growth</strong></td>
		</tr>

		<tr>
			<td>TPE</td>
			<td>%</td>
			<td>TPE</td>
			<td>%</td>
			<td></td>
			
		</tr>

		<tr>
			<td>1 </td>
			<td>2 </td>
			<td>3 </td>
			<td>4 </td>
			<td>5 </td>
			<td>6 </td>
			
		</tr>

<?php

$total_parmanent_worker = $total_parmanent_paid_worker + $total_parmanent_casual_worker;
$total_temporary_worker = $total_temporary_paid_worker + $total_temporary_casual_worker;
$total_household_worker = $total_household_paid_worker + $total_household_casual_worker;

$total_paid_worker = $total_parmanent_paid_worker + $total_temporary_paid_worker + $total_household_paid_worker;
$total_casual_worker = $total_parmanent_casual_worker + $total_temporary_casual_worker + $total_household_casual_worker;

$total_worker = $total_parmanent_worker + $total_temporary_worker + $total_household_worker;





 ?>
		<!-- ONE -->
		<tr>
			<td><strong>All Establishments</strong></td>
			<td></td>
			<td> </td>
			<td><?= $total_worker; ?></td>
			<td>100</td>
			<td></td>

		</tr>

		<tr>
			<td>Paid Worker</td>
			<td></td>
			<td></td>
			<td><?= $total_paid_worker; ?></td>
			<td><?=round((($total_paid_worker / $total_worker) * 100),2); ?></td>
			<td></td>
		</tr>

		<tr>
			<td>Casual Worker</td>
			<td></td>
			<td></td>
			<td><?= $total_casual_worker; ?></td>
			<td><?=round((($total_casual_worker / $total_worker) * 100),2); ?></td>
			<td></td>

		</tr>


		<tr>

			<td><strong>Permanent Establishments</strong></td>
			<td></td>
			<td></td>
			<td><?= $total_parmanent_worker; ?></td>
			<td>100</td>
			<td></td>
		</tr>

		<tr>
			<td>Paid Worker</td>  
			<td></td>
			<td></td>
			<td><?= $total_parmanent_paid_worker; ?></td>
			<td><?=round((($total_parmanent_paid_worker / $total_parmanent_worker) * 100),2); ?></td>
			<td></td>

		</tr>

		<tr>
			<td>Casual Worker</td>
			<td></td>
			<td></td>
			<td><?= $total_parmanent_casual_worker; ?></td>
			<td><?=round((($total_parmanent_casual_worker / $total_parmanent_worker) * 100),2); ?></td>
			<td></td>
		</tr>

		<tr>
		
			<td><strong>Temporary Employment</strong></td>
			<td></td>
			<td></td>
			<td><?= $total_temporary_worker; ?></td>
			<td>100</td>
			<td></td>
		</tr>

		<tr>
			<td>Paid Worker</td>
			<td ></td>
			<td></td>
			<td><?= $total_temporary_paid_worker; ?></td>
			<td><?=round((($total_temporary_paid_worker / $total_temporary_worker) * 100), 2); ?></td>
			<td></td>
		</tr>

		<tr >
			<td>Casual Worker</td>
			<td></td>
			<td></td>
			<td><?= $total_temporary_casual_worker; ?></td>
			<td><?=round((($total_temporary_casual_worker / $total_temporary_worker) * 100),2); ?></td>
			<td></td>
		</tr>
		
		
		<tr>
			<td><strong>Economic Household</strong> </td>
			<td></td>
			<td></td>
			<td><?= $total_household_worker; ?></td>
			<td>100</td>
			<td></td>
		</tr>

		<tr>
			<td>Paid Worker</td>
			<td ></td>
			<td></td>
			<td><?= $total_household_paid_worker; ?></td>
			<td><?=round((($total_household_paid_worker / $total_household_worker) * 100), 2) ?> </td>
			<td></td>
		</tr>

		<tr >
			<td>Casual Worker</td>
			<td></td>
			<td></td>
			<td><?= $total_household_casual_worker; ?></td>
			<td><?=round((($total_household_casual_worker / $total_household_worker) * 100), 2) ?></td>
			<td></td>
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

<br>
<br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>

