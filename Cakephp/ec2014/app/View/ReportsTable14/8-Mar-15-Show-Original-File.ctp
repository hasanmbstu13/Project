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

  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">



<tr>
   <td colspan="10"><b>Table- 14: Number of Manufacturing & trade Establishment by Size of Current Fixed Assets, Economic Activity and Location in 2013..</b></td>
</tr>



 <tr >
  <td rowspan=2 >BSIC Code <br>(4 digit)</td>
  <td rowspan=2>Location &amp; Economic Activities </td>
  <td rowspan=2 >Total Estab.</td>
  <td colspan=7>Size of Current Fixed Assts (Lac Taka)</td>
 </tr>

 <tr>
  <td>Up to 5</td>
  <td>5-50</td>
  <td>50-100</td>
  <td>100-1000</td>
  <td>1000-1500</td>
  <td>1500-3000</td>
  <td>30000+ & above</td>
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




 <tr>
    <td colspan="2"><?=substr($zila, 0, -4);  ?></td> 
    <td colspan="8">&nbsp;</td>
  </tr>


<?php 
foreach ($data as $res) { 
  if(isset($res['CLASS_CODE'] )){?>

   <tr>
     <td><?=(int)$res['CLASS_CODE'] ?></td>
     <td><?= $res['CLASS_CODE_DESC_ENG'] ?></td>
     <td><?=(int)$res['TOTAL_EST'] ?></td>
     <td><?=(int)$res['UP_TO_5'] ?></td>
     <td><?=(int)$res['BET_5_50'] ?></td>
     <td><?=(int)$res['BET_50_100'] ?></td>
     <td><?=(int)$res['BET_100_1000'] ?></td>
     <td><?=(int)$res['BET_1000_1500'] ?></td>
     <td><?=(int)$res['BET_1500_3000'] ?></td>
     <td><?=(int)$res['ABOVE_3000'] ?></td>
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