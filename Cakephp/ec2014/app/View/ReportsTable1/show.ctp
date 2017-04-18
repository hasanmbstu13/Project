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
   <td colspan="16"><b>Table- 1: Number of Establishment by Type & Economic Activity and Total Person Engaged (TPE) by Sex & Category in 2013.</b></td>
</tr>

 <tr>
      <td rowspan = "2"><strong>BSIC Code<br>(4 Digit)</strong></td>
      <td rowspan = "2"><strong>Location, Economic Activity and Type of Units</strong></td>
      <td rowspan = "2"><strong>Number of Unit</strong></td>
      <td colspan="3"><strong>Total Personal Engaged</strong></td>
      <td colspan="2"><strong>Working Proprietors</strong></td>
      <td colspan="2"><strong>Unpaid Family Helpers</strong></td>
      <td colspan="2"><strong>Full Time Workers</strong></td>
      <td colspan="2"><strong>Part Time Workers</strong></td>
      <td colspan="2"><strong>Irregular Workers</strong></td>
  </tr>


    <tr>
      <td>Total</td>
      <td>Male</td>
      <td>Female</td>
      <td>Male</td>
      <td>Female</td>
      <td>Male</td>
      <td>Female</td>
      <td>Male</td>
      <td>Female</td>
      <td>Male</td>
      <td>Female</td>
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
      <td>8 </td>
      <td>9 </td>
      <td>10 </td>
      <td>11 </td>
      <td>12 </td>
      <td>13 </td>
      <td>14 </td>
      <td>15 </td>
      <td>16 </td>
     
    </tr>

<tr>
  <td colspan = "2"><strong><?=substr($zila, 0, -4); ?></strong></td>
  <td colspan = "13"> </td>
  <td><strong> </strong></td>
</tr>


<?php 
    $number_of_unit = 0;
    $total_person_engaged = 0;
    $total_male_engaged = 0;
    $total_female_engaged = 0;
    $male_wp = 0;
    $female_wp = 0;
    $male_foc = 0;
    $female_foc = 0;
    $male_full_time = 0;
    $female_full_time = 0;
    $male_part_time = 0;
    $female_part_time = 0;
    $male_irregular = 0;
    $female_irregular = 0;
?>

<?php 
    foreach ($data as $res) {  ?>

  <?php    
  if ($res['number_of_unit'] != 0 )
     { 
      ?>

<?php 
    $number_of_unit += $res['number_of_unit'];
    $total_person_engaged += $res['total_person_engaged'] ;
    $total_male_engaged += $res['total_male_engaged'];
    $total_female_engaged += $res['total_female_engaged'];
    $male_wp += $res['male_wp'];
    $female_wp += $res['female_wp'];
    $male_foc += $res['male_foc'];
    $female_foc += $res['female_foc'];
    $male_full_time += $res['male_full_time'];
    $female_full_time += $res['female_full_time'];
    $male_part_time += $res['male_part_time'];
    $female_part_time += $res['female_part_time'];
    $male_irregular += $res['male_irregular'];
    $female_irregular += $res['female_irregular'];
?>
  
  <tr>
      <td align="left"><?= $res['bsic_code']; ?></td>
      <td><?= $res['bsic_description']; ?></td>
      <td><?= $res['number_of_unit']; ?></td>
      <td><?= $res['total_person_engaged']; ?></td>
      <td><?= $res['total_male_engaged']; ?></td>
      <td><?= $res['total_female_engaged']; ?></td>
      <td><?= $res['male_wp']; ?></td>
      <td><?= $res['female_wp']; ?></td>
      <td><?= $res['male_foc']; ?></td>
      <td><?= $res['female_foc']; ?></td>
      <td><?= $res['male_full_time']; ?></td>
      <td><?= $res['female_full_time']; ?></td>
      <td><?= $res['male_part_time']; ?></td>
      <td><?= $res['female_part_time']; ?></td>
      <td><?= $res['male_irregular']; ?></td>
      <td><?= $res['female_irregular']; ?></td>

  </tr>

  <?php 
}
?>

  <?php
    }
  ?>



  <tr>
      <td colspan = "2" style = "text-align:center"><strong>Zila Total</strong></td>
      <td><?= $number_of_unit; ?></td>
      <td><?= $total_person_engaged; ?></td>
      <td><?= $total_male_engaged; ?></td>
      <td><?= $total_female_engaged; ?></td>
      <td><?= $male_wp; ?></td>
      <td><?= $female_wp; ?></td>
      <td><?= $male_foc; ?></td>
      <td><?= $female_foc; ?></td>
      <td><?= $male_full_time; ?></td>
      <td><?= $female_full_time; ?></td>
      <td><?= $male_part_time; ?></td>
      <td><?= $female_part_time; ?></td>
      <td><?= $male_irregular; ?></td>
      <td><?= $female_irregular; ?></td>

  </tr>


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