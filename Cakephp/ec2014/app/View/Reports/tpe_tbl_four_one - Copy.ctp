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
//if($this -> request -> is('post'))
//{
?>

<div id="table_for_print">

  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport" >
 <tr >
  <td rowspan=2 >Section</td>
  <td rowspan=2 >Economic activity</td>
  <td rowspan=2>Estab</td>
  <td colspan=3 >Total persons engaged (TPE)</td>
  <td rowspan=2 >Average size of establishment</td>
 </tr>

 <tr>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
 </tr>

 <tr >
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
 </tr>


  <tr>
  <td>A</td>
  <td align="left">Agriculture,forestry and fishing</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>

   <tr>
  <td>B</td>
  <td align="left">Mining and quarrying</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity ,gas,steam and air conditioning supply</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water supply,sewerage,waste management and remediation activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and retail trade,repair of motor vehicles and motorcycles</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and storage</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and food service activities (Hotel and restaurents)</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and communication</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and insurance activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real state activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, scientific and technical activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and support service activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public administration and defence,compulsory social security</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">human health and social work activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>



     <tr>
  <td>R</td>
  <td align="left">Art, entertainment and recreation</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other service activities</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of households as employers, undifferentiated goods and services producing activities of households for own use</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of extraterritorial organizations and bodies</td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td></td>
 </tr>



 
</table>

<br><div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php //} ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>



