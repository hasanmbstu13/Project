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
   <td colspan="14"><b>Table- 2: Size of Establishment by Economic Activity and Location in 2013.</b></td>
</tr>

 <tr>
      <td rowspan = "2"><strong>BSIC Code <br>(4 Digit)</strong></td>
      <td rowspan = "2"><strong>Location & Economic Activity</strong></td>
      <td rowspan = "2"><strong>Data Item</strong></td>
      <td rowspan = "2"><strong>Total</strong></td>
      <td colspan="10"><strong>Size of Establishments</strong></td>
      
  </tr>

    <tr>
      <td>1 Persons</td>
      <td>2 Persons</td>
      <td>3 Persons</td>
      <td>4 Persons</td>
      <td>5-9 Persons</td>
      <td>10-19 Persons</td>
      <td>20-49 Persons</td>
      <td>50-99 Persons</td>
      <td>100-199 Persons</td>
      <td>200+ Persons</td>
     
    </tr>


    <tr>
      <td>1 </td>
      <td>2 </td>
      <td>3 </td>
      <td>4 </td>
      <td>5 </td>
      <td>6 </td>
      <td>7 </td>
      <td>8 </td>
      <td>9 </td>
      <td>10 </td>
      <td>11 </td>
      <td>12 </td>
      <td>13 </td>
      <td>14 </td>
     
    </tr>

<tr>
  <td colspan = "2"><strong> <?=substr($zila, 0, -4);  ?></strong></td>
  <td colspan = "12"> </td>
</tr>

<?php 
    foreach ($data as $res)  
    { 

  ?>

   <?php    
  if ($res['number_of_unit'] != 0 )
     { 
      ?>
  
<tr>
      <td align="left" rowspan = "2"><?= $res['bsic_code']; ?></td>
      <td align="left" rowspan = "2" ><?= $res['bsic_description']; ?></td>

      <td>Estab.</td>
      <td><?= $res['number_of_unit']; ?></td>
      <td><?= $res['total_unit_1']; ?></td>
      <td><?= $res['total_unit_2']; ?></td>
      <td><?= $res['total_unit_3']; ?></td>
      <td><?= $res['total_unit_4']; ?></td>
      <td><?= $res['total_unit_5_9']; ?></td>
      <td><?= $res['total_unit_10_19']; ?></td> 
      <td><?= $res['total_unit_20_49']; ?></td>
      <td><?= $res['total_unit_50_99']; ?></td>
      <td><?= $res['total_unit_100_199']; ?></td>
      <td><?= $res['total_unit_200']; ?></td>
     
</tr>

<tr>
   <td>Persons</td>
   <td><?= $res['total_person_engaged']; ?></td>
   <td><?= $res['total_person_1']; ?></td>
   <td><?= $res['total_person_2']; ?></td>
   <td><?= $res['total_person_3']; ?></td>
   <td><?= $res['total_person_4']; ?></td>
   <td><?= $res['total_person_5_9']; ?></td>
   <td><?= $res['total_person_10_19']; ?></td>
   <td><?= $res['total_person_20_49']; ?></td>
   <td><?= $res['total_person_50_99']; ?></td>
   <td><?= $res['total_person_100_199']; ?></td>
   <td><?= $res['total_person_200']; ?></td>

</tr>


<?php } ?>
     

  <?php
    }
  ?>


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