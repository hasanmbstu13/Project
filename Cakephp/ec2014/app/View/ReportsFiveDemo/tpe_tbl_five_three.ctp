<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>

<script>

$(document).ready(function() {

//$('#zila_id').change( function() {
  //  $('#upazila_id').hide();
  //  $('#psa_id').hide();
 //   $('#union_id').hide();
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
<!-- #################################   RESULT SHOW ############################  -->

<?php 
if($this -> request -> is('post'))
{
?>

<div id="table_for_print">

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
 <tr>
    <td colspan="10"><b>Table 5.3: Upazila Wise Establishment, Total Persons Engaged (TPE) and Average Size of Establishment in 2001 & 01 and in 2013</b></td>
  </tr>

 <tr >
  <td rowspan=3>Upazila</td>
  <td rowspan=3 >Total Establishments</td>
  <td colspan=4 >2001 &amp; 01</td>
  <td colspan=4 >2013</td>
 </tr>
 <tr >
  <td width=164 colspan=3 >Total Persons Engaged (TPE)</td>
  <td width=70 rowspan=2 >Average Size of Estab.</td>
  <td width=174 colspan=3 >Total Persons Engaged (TPE)</td>
  <td width=70 rowspan=2 >Average Size of Estab.</td>
 </tr>


 <tr >
  <td >Total</td>
  <td>Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
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
 </tr>

<?php 
  
  $TOTAL_EST = 0;
  $TOTAL_PERSON_ENGAGED = 0;
  $TOTAL_MALE_ENGAGED = 0;
  $TOTAL_FEMALE_ENGAGED = 0;
  $AVG_SIZE = 0;


  foreach ($result as $res) {

       $TOTAL_EST += $res[0]['TOTAL_EST'] ;
       $TOTAL_PERSON_ENGAGED += $res[0]['TOTAL_PERSON_ENGAGED'];
       $TOTAL_MALE_ENGAGED += $res[0]['TOTAL_MALE_ENGAGED'];
       $TOTAL_FEMALE_ENGAGED += $res[0]['TOTAL_FEMALE_ENGAGED'];
       $AVG_SIZE = round(($TOTAL_PERSON_ENGAGED/$TOTAL_EST),2);

?>
  
<tr>
  <td align="left"><?= $res[0]['UNION_NAME'];  ?></td>

  <td><?= $res[0]['TOTAL_EST'] ; ?></td> 
  <td></td>
  <td></td>
  <td></td>
  <td></td>
  <td><?= $res[0]['TOTAL_PERSON_ENGAGED'] ; ?></td>  
  <td><?= $res[0]['TOTAL_MALE_ENGAGED'] ; ?></td>
  <td><?= $res[0]['TOTAL_FEMALE_ENGAGED'] ; ?></td>
  <td><?=round(($res[0]['TOTAL_PERSON_ENGAGED'] / $res[0]['TOTAL_EST']),2); ?></td> 
 </tr>

<?php 

    } 
?>


<tr>
  <td align="left"><?= $upazila ; ?></td>
  <td><?= $TOTAL_EST ;?> </td> 
  <td></td>
  <td></td> 
  <td></td>
  <td></td>
  <td><?= $TOTAL_PERSON_ENGAGED; ?></td>  
  <td><?= $TOTAL_MALE_ENGAGED ; ?></td>
  <td><?= $TOTAL_FEMALE_ENGAGED ; ?></td>
  <td><?= $AVG_SIZE;  ?></td> 
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