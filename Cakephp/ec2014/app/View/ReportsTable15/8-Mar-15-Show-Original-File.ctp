<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<!--
<b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
<b>Union:</b><select id="union_id" name="geo_code_union"><option value="">Please Select</option></select>  -->
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

  <!--
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
  </tr>   -->
</table>


<?php echo $this -> Form -> end(__('Submit')); ?>    
<br><br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php 
//debug($data);
if($this -> request -> is('post'))
{
?>

<div id="table_for_print">

  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">


<tr>
   <td colspan="18"><b>Table- 15: Number of Manufacturing Establishments by Type of Selected Working Facilities, Economic Activity, Location and Upazila in 2013</b></td>
</tr>


 <tr >
  <td rowspan=2>BSIC Code <br> (2 Digit)</td>
  <td rowspan=2>Location & Economic Activity</td>
  <td rowspan=2>Total Estab.</td>
  <td colspan=4>Using Machinery</td>
  <td colspan=4>Marketing Facility</td>
  <td colspan=7>Use of Energy/Fuel</td>
 </tr>

  
</tr>

 <tr>
  <td>Power Operationg</td>
  <td>Hand Operating</td>
  <td>Both</td>
  <td>Not Applicable</td>
  <td>Totally Local</td>
  <td>Totally Exported </td>
  <td>Both</td>
  <td>Not Applicable </td>
  <td>Electricity</td>
  <td>Solar</td>
  <td>Gas</td>
  <td>Petroleum</td>
  <td>Coal</td>
  <td>Wood</td>
  <td>Not Applicable</td>
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
    <td>14</td>
    <td>15</td>
    <td>16</td>
    <td>17</td>
    <td>18</td>

  </tr>

  <tr>
    <td></td>
    <td><?=substr($zila, 0, -4);  ?></td>
    <td colspan= 16> </td>
  </tr>




<?php 
foreach ($data as $res) { 
  if(isset($res['DIVN_CODE'] )){?>

   <tr>
     <td><?=(int)$res['DIVN_CODE'] ?></td>
     <td><?= $res['DIVN_CODE_DESC_ENG'] ?></td>
     <td><?=(int)$res['TOTAL_EST'] ?></td>
     <td><?=(int)$res['MAC_POWER_OPERATING'] ?></td>
     <td><?=(int)$res['MAC_HANE_OPERATING'] ?></td>
     <td><?=(int)$res['MAC_BOTH'] ?></td>
     <td><?=(int)$res['MAC_NOT_APPLICABLE'] ?></td>
     <td><?=(int)$res['MAR_TOTALLY_LOCAL'] ?></td>
     <td><?=(int)$res['MAR_TOTALLY_EXPORT'] ?></td>
     <td><?=(int)$res['MAR_BOTH'] ?></td>
     <td><?=(int)$res['MAR_NOT_APPLICABLE'] ?></td>
     <td><?=(int)$res['ENERGY_ELICTRICITY'] ?></td>
     <td><?=(int)$res['ENERGY_SOLAR'] ?></td>  
     <td><?=(int)$res['ENERGY_GAS'] ?></td>
     <td><?=(int)$res['ENERGY_PETROLEUM'] ?></td>
     <td><?=(int)$res['ENERGY_COAL'] ?></td>
     <td><?=(int)$res['ENERGY_WOOD'] ?></td>
     <td><?=(int)$res['ENERGY_NOT_APPLICABLE'] ?></td>
   </tr>
<?php } 
}?>

</table>

<br><div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div>


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