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
    <td colspan="8"><b>Table 7.8: Head of Establishment by Sex, Location and Level of Education in 2013</b></td>
  </tr>

 <tr>
      <td rowspan="2"><strong>Type</strong></td>
      <td rowspan="2"><strong>Total Establishments</strong></td>
      <td colspan="3"><strong>Total</strong></td>
      <td colspan="3"><strong>Urban</strong></td>
      <td colspan="3"><strong>Rural</strong></td>
    </tr>

    <tr>
      <td>Male</td>
      <td>Female</td>
      <td>Others</td>
      <td>Male</td>
      <td>Female</td>
      <td>Others</td>
      <td>Male</td>
      <td>Female</td>
      <td>Others</td>
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
      <td>11</td>
    </tr>

     <tr>
      <td>None</td>
      <td><?= $total_est_none;  ?></td>
      <td><?= $total_male_none;  ?></td>
      <td><?= $total_female_none;  ?></td>
      <td><?= $total_others_none;  ?></td>
      <td><?= $total_urban_male_none;  ?></td>
      <td><?= $total_urban_female_none;  ?></td>
      <td><?= $total_urban_others_none;  ?></td>
      <td><?= $total_rural_male_none;  ?></td>
      <td><?= $total_rural_female_none;  ?></td>
      <td><?= $total_rural_others_none;  ?></td>
     
    </tr>


    <tr>
      <td>Primary</td>
      <td><?= $total_est_primary;  ?></td>
      <td><?= $total_male_primary;  ?></td>
      <td><?= $total_female_primary;  ?></td>
      <td><?= $total_others_primary;  ?></td>
      <td><?= $total_urban_male_primary;  ?></td>
      <td><?= $total_urban_female_primary;  ?></td>
      <td><?= $total_urban_others_primary;  ?></td>
      <td><?= $total_rural_male_primary;  ?></td>
      <td><?= $total_rural_female_primary;  ?></td>
      <td><?= $total_rural_others_primary;  ?></td>
     
    </tr>


    <tr>
      <td>Lower Secondary</td>
      <td><?= $total_est_lower_sec;  ?></td>
      <td><?= $total_male_lower_sec;  ?></td>
      <td><?= $total_female_lower_sec;  ?></td>
      <td><?= $total_others_lower_sec;  ?></td>
      <td><?= $total_urban_male_lower_sec;  ?></td>
      <td><?= $total_urban_female_lower_sec;  ?></td>
      <td><?= $total_urban_others_lower_sec;  ?></td>
      <td><?= $total_rural_male_lower_sec;  ?></td>
      <td><?= $total_rural_female_lower_sec;  ?></td>
      <td><?= $total_rural_others_lower_sec;  ?></td>
  </tr>



  <tr>
      <td>Secondary</td>
      <td><?= $total_est_sec;  ?></td>
      <td><?= $total_male_sec;  ?></td>
      <td><?= $total_female_sec;  ?></td>
      <td><?= $total_others_sec;  ?></td>
      <td><?= $total_urban_male_sec;  ?></td>
      <td><?= $total_urban_female_sec;  ?></td>
      <td><?= $total_urban_others_sec;  ?></td>
      <td><?= $total_rural_male_sec;  ?></td>
      <td><?= $total_rural_female_sec;  ?></td>
      <td><?= $total_rural_others_sec;  ?></td>
     
    </tr>



    <tr>
      <td>Higher Secondary</td>
      <td><?= $total_est_higher_sec;  ?></td>
      <td><?= $total_male_higher_sec;  ?></td>
      <td><?= $total_female_higher_sec;  ?></td>
      <td><?= $total_others_higher_sec;  ?></td>
      <td><?= $total_urban_male_higher_sec;  ?></td>
      <td><?= $total_urban_female_higher_sec;  ?></td>
      <td><?= $total_urban_others_higher_sec;  ?></td>
      <td><?= $total_rural_male_higher_sec;  ?></td>
      <td><?= $total_rural_female_higher_sec;  ?></td>
      <td><?= $total_rural_others_higher_sec;  ?></td>
     
    </tr>


<tr>
      <td>Graduate & Above</td>
      <td><?= $total_est_higher;  ?></td>
      <td><?= $total_male_higher;  ?></td>
      <td><?= $total_female_higher;  ?></td>
      <td><?= $total_others_higher;  ?></td>
      <td><?= $total_urban_male_higher;  ?></td>
      <td><?= $total_urban_female_higher;  ?></td>
      <td><?= $total_urban_others_higher;  ?></td>
      <td><?= $total_rural_male_higher;  ?></td>
      <td><?= $total_rural_female_higher;  ?></td>
      <td><?= $total_rural_others_higher;  ?></td>
     
    </tr>



<?php

    $total_est = $total_est_none + $total_est_primary +$total_est_lower_sec + $total_est_sec + $total_est_higher_sec +  $total_est_higher;

    $total_male = $total_male_none + $total_male_primary +$total_male_lower_sec + $total_male_sec + $total_male_higher_sec +  $total_male_higher;

    $total_female = $total_female_none + $total_female_primary +$total_female_lower_sec + $total_female_sec + $total_female_higher_sec +  $total_female_higher;

    $total_others = $total_others_none + $total_others_primary +$total_others_lower_sec + $total_others_sec + $total_others_higher_sec +  $total_others_higher;

    $total_urban_male = $total_urban_male_none + $total_urban_male_primary +$total_urban_male_lower_sec + $total_urban_male_sec + $total_urban_male_higher_sec +  $total_urban_male_higher;

    $total_urban_female = $total_urban_female_none + $total_urban_female_primary +$total_urban_female_lower_sec + $total_urban_female_sec + $total_urban_female_higher_sec +  $total_urban_female_higher;

    $total_urban_others = $total_urban_others_none + $total_urban_others_primary +$total_urban_others_lower_sec + $total_urban_others_sec + $total_urban_others_higher_sec +  $total_urban_others_higher;

    $total_rural_male = $total_rural_male_none + $total_rural_male_primary +$total_rural_male_lower_sec + $total_rural_male_sec + $total_rural_male_higher_sec +  $total_rural_male_higher;

    $total_rural_female = $total_rural_female_none + $total_rural_female_primary +$total_rural_female_lower_sec + $total_rural_female_sec + $total_rural_female_higher_sec +  $total_rural_female_higher;

    $total_rural_others = $total_rural_others_none + $total_rural_others_primary +$total_rural_others_lower_sec + $total_rural_others_sec + $total_rural_others_higher_sec +  $total_rural_others_higher;

?>


<tr>
      <td>Total</td>
      <td><?= $total_est;  ?></td>
      <td><?= $total_male;  ?></td>
      <td><?= $total_female;  ?></td>
      <td><?= $total_others;  ?></td>
      <td><?= $total_urban_male;  ?></td>
      <td><?= $total_urban_female;  ?></td>
      <td><?= $total_urban_others;  ?></td>
      <td><?= $total_rural_male;  ?></td>
      <td><?= $total_rural_female;  ?></td>
      <td><?= $total_rural_others;  ?></td>
     
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
