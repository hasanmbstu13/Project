<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
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
   <td colspan="17"><b>Table- 6: Number of Establishment by Type & Total Persons Engaged (TEP) by Sex and Upazila in 2013.</b></td>
</tr>

 <tr>
      <td rowspan = "3"><strong>Upazila</strong></td>
      <td colspan="4"><strong>Total</strong></td>
      <td colspan="4"><strong>Parmament</strong></td>
      <td colspan="4"><strong>Temporary</strong></td>
      <td colspan="4"><strong>Economic Household</strong></td>
      
  </tr>

    <tr>
      <td rowspan = "2"><strong>Estab.</strong></td>
      <td colspan="3"><strong>Persons</strong></td>
      <td rowspan = "2"><strong>Estab.</strong></td>
      <td colspan="3"><strong>Persons</strong></td>
      <td rowspan = "2"><strong>Estab.</strong></td>
      <td colspan="3"><strong>Persons</strong></td>
      <td rowspan = "2"><strong>Estab.</strong></td>
      <td colspan="3"><strong>Persons</strong></td>
    </tr>

    <tr>
      <td>Total</td>
      <td>Male</td>
      <td>Female</td>
      <td>Total</td>
      <td>Male</td>
      <td>Female</td>
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
      <td>8 </td>
      <td>9 </td>
      <td>10 </td>
      <td>11 </td>
      <td>12 </td>
      <td>13 </td>
      <td>14 </td>
      <td>15 </td>
      <td>16 </td>
      <td>17</td>
     
    </tr>

<tr>
  <td><strong><?=substr($zila, 0, -4);  ?></strong></td>
  <td colspan = "16"> </td>
</tr>


<?php 
    $total_east = 0;
    $total_person_engage = 0;
    $total_male_engage = 0;
    $total_female_engage = 0;

    $total_parmament_east = 0;
    $total_parmament_person_engage = 0;
    $total_parmament_male_engage = 0;
    $total_parmament_female_engage = 0;

    $total_temporary_east = 0;
    $total_temporary_person_engage = 0;
    $total_temporary_male_engage = 0;
    $total_temporary_female_engage = 0;

    $total_eh_east = 0;
    $total_eh_person_engage = 0;
    $total_eh_male_engage = 0;
    $total_eh_female_engage = 0;
?>


<?php 
    foreach ($data as $res)  
    {
  ?>


  <?php 
      $total_east += $res['total_east'];
      $total_person_engage += $res['total_person_engage'];
      $total_male_engage += $res['total_male_engage'];
      $total_female_engage += $res['total_female_engage'];

      $total_parmament_east += $res['total_parmament_east'];
      $total_parmament_person_engage += $res['total_parmament_person_engage'];
      $total_parmament_male_engage += $res['total_parmament_male_engage'];
      $total_parmament_female_engage += $res['total_parmament_female_engage'];

      $total_temporary_east += $res['total_temporary_east'];
      $total_temporary_person_engage += $res['total_temporary_person_engage'];
      $total_temporary_male_engage += $res['total_temporary_male_engage'];
      $total_temporary_female_engage += $res['total_temporary_female_engage'];

      $total_eh_east += $res['total_eh_east'];
      $total_eh_person_engage += $res['total_eh_person_engage'];
      $total_eh_male_engage += $res['total_eh_male_engage'];
      $total_eh_female_engage += $res['total_eh_female_engage'];
?>


  
  <tr>
      <td align="left"><?= $res['upazila_name']; ?></td>

      <td><?= $res['total_east']; ?></td>
      <td><?= $res['total_person_engage']; ?></td>
      <td><?= $res['total_male_engage']; ?></td>
      <td><?= $res['total_female_engage']; ?></td>

      <td><?= $res['total_parmament_east']; ?></td>
      <td><?= $res['total_parmament_person_engage']; ?></td>
      <td><?= $res['total_parmament_male_engage']; ?></td>
      <td><?= $res['total_parmament_female_engage']; ?></td>

      <td><?= $res['total_temporary_east']; ?></td>
      <td><?= $res['total_temporary_person_engage']; ?></td>
      <td><?= $res['total_temporary_male_engage']; ?></td>
      <td><?= $res['total_temporary_female_engage']; ?></td>

      <td><?= $res['total_eh_east']; ?></td>
      <td><?= $res['total_eh_person_engage']; ?></td>
      <td><?= $res['total_eh_male_engage']; ?></td>
      <td><?= $res['total_eh_female_engage']; ?></td>

  </tr>

  <?php
    }
  ?>


    <tr>
      <td align="left"><strong>Zila Total</strong></td>

      <td><?= $total_east; ?></td>
      <td><?= $total_person_engage; ?></td>
      <td><?= $total_male_engage; ?></td>
      <td><?= $total_female_engage; ?></td>

      <td><?= $total_parmament_east; ?></td>
      <td><?= $total_parmament_person_engage; ?></td>
      <td><?= $total_parmament_male_engage; ?></td>
      <td><?= $total_parmament_female_engage; ?></td>

      <td><?= $total_temporary_east; ?></td>
      <td><?= $total_temporary_person_engage; ?></td>
      <td><?= $total_temporary_male_engage; ?></td>
      <td><?= $total_temporary_female_engage; ?></td>

      <td><?= $total_eh_east; ?></td>
      <td><?= $total_eh_person_engage; ?></td>
      <td><?= $total_eh_male_engage; ?></td>
      <td><?= $total_eh_female_engage; ?></td>

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