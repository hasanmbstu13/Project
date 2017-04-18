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
    <td colspan="6"><b>Size Distribution Of Economic units in 2013</b></td>
  </tr> 

 <tr >
  <td rowspan=2 align="left">Description</td>
  <td colspan=5 >Employee Size</td>
 </tr>
 <tr >
  <td ><10</td>
  <td >10-49</td>
  <td >50-99</td>
  <td >100+</td>
  <td >All</td>
 </tr>
 <tr>
   <td>No. of economic units</td>
   <td><?=(int)$data['no_of_economic_units']['less_than_10']?></td>
   <td><?=(int)$data['no_of_economic_units']['between_10_49']?></td>
   <td><?=(int)$data['no_of_economic_units']['between_50_99']?></td>
   <td><?=(int)$data['no_of_economic_units']['more_than_99']?></td>
   <td><?=(int)$data['no_of_economic_units']['total']?></td>
 </tr>

 <tr>
   <td align="left">Of Which</td>
   <td colspan=5>&nbsp;</td>
 </tr>

 <tr>
   <td>-Manufacturing</td>
   <td><?=(int)$data['manuacturing']['less_than_10']?></td>
   <td><?=(int)$data['manuacturing']['between_10_49']?></td>
   <td><?=(int)$data['manuacturing']['between_50_99']?></td>
   <td><?=(int)$data['manuacturing']['more_than_99']?></td>
   <td><?=(int)$data['manuacturing']['total']?></td>
 </tr>

  <tr>
   <td>-Others</td>
   <td><?=(int)$data['others']['less_than_10']?></td>
   <td><?=(int)$data['others']['between_10_49']?></td>
   <td><?=(int)$data['others']['between_50_99']?></td>
   <td><?=(int)$data['others']['more_than_99']?></td>
   <td><?=(int)$data['others']['total']?></td>
 </tr>

  <tr>
   <td align="left">-Rural</td>
   <td><?=(int)$data['rural']['less_than_10']?></td>
   <td><?=(int)$data['rural']['between_10_49']?></td>
   <td><?=(int)$data['rural']['between_50_99']?></td>
   <td><?=(int)$data['rural']['more_than_99']?></td>
   <td><?=(int)$data['rural']['total']?></td>
 </tr>


 <tr>
   <td align="left">-urban</td>
   <td><?=(int)$data['urban']['less_than_10']?></td>
   <td><?=(int)$data['urban']['between_10_49']?></td>
   <td><?=(int)$data['urban']['between_50_99']?></td>
   <td><?=(int)$data['urban']['more_than_99']?></td>
   <td><?=(int)$data['urban']['total']?></td>
 </tr>



</table>


<br><div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div>

<br>
<br>
<br>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport2">
 
 <tr>
    <td colspan="6"><b>Size Distribution Of persons employed in 2013</b></td>
  </tr> 

  <tr >
  <td rowspan=2 align="left">Description</td>
  <td colspan=5 >Employee Size</td>
 </tr>
 <tr >
  <td ><10</td>
  <td >10-49</td>
  <td >50-99</td>
  <td >100+</td>
  <td >All</td>
 </tr>
 <tr>
   <td>No. of persons employed</td>
   <td><?=(int)$data2['no_of_economic_units']['less_than_10']?></td>
   <td><?=(int)$data2['no_of_economic_units']['between_10_49']?></td>
   <td><?=(int)$data2['no_of_economic_units']['between_50_99']?></td>
   <td><?=(int)$data2['no_of_economic_units']['more_than_99']?></td>
   <td><?=(int)$data2['no_of_economic_units']['total']?></td>
 </tr>

 <tr>
   <td align="left">Of Which</td>
   <td colspan=5>&nbsp;</td>
 </tr>

 <tr>
   <td>-Manufacturing</td>
   <td><?=(int)$data2['manuacturing']['less_than_10']?></td>
   <td><?=(int)$data2['manuacturing']['between_10_49']?></td>
   <td><?=(int)$data2['manuacturing']['between_50_99']?></td>
   <td><?=(int)$data2['manuacturing']['more_than_99']?></td>
   <td><?=(int)$data2['manuacturing']['total']?></td>
 </tr>

  <tr>
   <td>-Others</td>
   <td><?=(int)$data2['others']['less_than_10']?></td>
   <td><?=(int)$data2['others']['between_10_49']?></td>
   <td><?=(int)$data2['others']['between_50_99']?></td>
   <td><?=(int)$data2['others']['more_than_99']?></td>
   <td><?=(int)$data2['others']['total']?></td>
 </tr>

  <tr>
   <td align="left">-Rural</td>
   <td><?=(int)$data2['rural']['less_than_10']?></td>
   <td><?=(int)$data2['rural']['between_10_49']?></td>
   <td><?=(int)$data2['rural']['between_50_99']?></td>
   <td><?=(int)$data2['rural']['more_than_99']?></td>
   <td><?=(int)$data2['rural']['total']?></td>
 </tr>


 <tr>
   <td align="left">-urban</td>
   <td><?=(int)$data2['urban']['less_than_10']?></td>
   <td><?=(int)$data2['urban']['between_10_49']?></td>
   <td><?=(int)$data2['urban']['between_50_99']?></td>
   <td><?=(int)$data2['urban']['more_than_99']?></td>
   <td><?=(int)$data2['urban']['total']?></td>
 </tr>



</table>

<br><div class="notice"> </div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel - Unit" id="export_to_excel">
<input type="button" value="Export to Excel - Employee" id="export_to_excel2">
</div> 

<?php 

} 

?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>