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
    <td colspan="10"><b>Table 5.2: Working Status of Total Persons Engaged (TPE) by Category, Sex and Type of Establishment in 2001 & 03 & in 2013 and Annual Growth Rate</b></td>
  </tr>

   <tr>
  <td rowspan=3>Working Status</td>
  <td colspan=8>Total Persons Engaged (TPE)</td>
  <td>Growth rate</td>
 </tr>
 <tr>
  <td colspan=4>2001 &amp; 03</td>
  <td colspan=4>2013</td>
  <td>&nbsp;</td>
 </tr>
 <tr>
  <td >Total</td>
  <td >%</td>
  <td >Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >%</td>
  <td >Male</td>
  <td >Female</td>
  <td >&nbsp; </td>
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


#parmanent
$parmanent_establishments_percent = round((($result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$parmanent_proprietor_percent = round((($result_parmanent[0][0]['WORKING_PROPRIETOR']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$parmanent_unpaid_percent = round((($result_parmanent[0][0]['UNPAID_FAMILY_WORKERS']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$parmanent_fulltime_percent = round((($result_parmanent[0][0]['FULL_TIME_WORKERS']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$parmanent_parttime_percent = round((($result_parmanent[0][0]['PART_TIME_WORKERS']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$parmanent_casual_percent = round((($result_parmanent[0][0]['CASUAL_WORKERS']/$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);


#temporary
$temporary_establishments_percent = round((($result_temporary[0][0]['TOTAL_PERSON_ENGAGED']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$temporary_proprietor_percent = round((($result_temporary[0][0]['WORKING_PROPRIETOR']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$temporary_unpaid_percent = round((($result_temporary[0][0]['UNPAID_FAMILY_WORKERS']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$temporary_fulltime_percent = round((($result_temporary[0][0]['FULL_TIME_WORKERS']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$temporary_parttime_percent = round((($result_temporary[0][0]['PART_TIME_WORKERS']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$temporary_casual_percent = round((($result_temporary[0][0]['CASUAL_WORKERS']/$result_temporary[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);


#household
$household_establishments_percent = round((($result_household[0][0]['TOTAL_PERSON_ENGAGED']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$household_proprietor_percent = round((($result_household[0][0]['WORKING_PROPRIETOR']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$household_unpaid_percent = round((($result_household[0][0]['UNPAID_FAMILY_WORKERS']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$household_fulltime_percent = round((($result_household[0][0]['FULL_TIME_WORKERS']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$household_parttime_percent = round((($result_household[0][0]['PART_TIME_WORKERS']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);
$household_casual_percent = round((($result_household[0][0]['CASUAL_WORKERS']/$result_household[0][0]['TOTAL_PERSON_ENGAGED']) * 100),2);


?>


<!-- Permanent Section -->

<tr>
  <td><strong>Permanent Establishments</strong></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['TOTAL_PERSON_ENGAGED'] ;?></td>
   <td><?=$parmanent_establishments_percent ;?></td>
   <td><?=$result_parmanent[0][0]['TOTAL_MALE_ENGAGED'] ;?></td>
   <td><?=$result_parmanent[0][0]['TOTAL_FEMALE_ENGAGED'] ;?></td>
   <td></td>
 </tr>



 <tr>
   <td>Working Proprietor</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['WORKING_PROPRIETOR'] ;?></td>
   <td><?=$parmanent_proprietor_percent ;?></td>
   <td><?=$result_parmanent[0][0]['WORKING_PROPRIETOR_MALE'] ;?></td>
   <td><?=$result_parmanent[0][0]['WORKING_PROPRIETOR_FEMALE'] ;?></td>
   <td></td>
   
 </tr>


  <tr>
   <td>Unpaid Family Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['UNPAID_FAMILY_WORKERS'] ;?></td>
   <td><?=$parmanent_unpaid_percent ;?></td>
   <td><?=$result_parmanent[0][0]['UNPAID_FAMILY_WORKERS_MALE'] ;?></td>
   <td><?=$result_parmanent[0][0]['UNPAID_FAMILY_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Full Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['FULL_TIME_WORKERS'] ;?></td>
   <td><?=$parmanent_fulltime_percent  ;?></td>
   <td><?=$result_parmanent[0][0]['FULL_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_parmanent[0][0]['FULL_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Part-Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['PART_TIME_WORKERS'] ;?></td>
   <td><?=$parmanent_parttime_percent  ;?></td>
   <td><?=$result_parmanent[0][0]['PART_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_parmanent[0][0]['PART_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Casual Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_parmanent[0][0]['CASUAL_WORKERS'] ;?></td>
   <td><?=$parmanent_casual_percent  ;?></td>
   <td><?=$result_parmanent[0][0]['CASUAL_WORKERS_MALE'] ;?></td>
   <td><?=$result_parmanent[0][0]['CASUAL_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>










 <!-- Temporary Section -->
<tr>
  <td><strong>Temporary Establishments</strong></td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['TOTAL_PERSON_ENGAGED'] ;?></td>
   <td><?=$temporary_establishments_percent ;?></td>
   <td><?=$result_temporary[0][0]['TOTAL_MALE_ENGAGED'] ;?></td>
   <td><?=$result_temporary[0][0]['TOTAL_FEMALE_ENGAGED'] ;?></td>
   <td></td>
 </tr>



 <tr>
   <td>Working Proprietor</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['WORKING_PROPRIETOR'] ;?></td>
   <td><?=$temporary_proprietor_percent ;?></td>
   <td><?=$result_temporary[0][0]['WORKING_PROPRIETOR_MALE'] ;?></td>
   <td><?=$result_temporary[0][0]['WORKING_PROPRIETOR_FEMALE'] ;?></td>
   <td></td>
   
 </tr>


  <tr>
   <td>Unpaid Family Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['UNPAID_FAMILY_WORKERS'] ;?></td>
   <td><?=$temporary_unpaid_percent ;?></td>
   <td><?=$result_temporary[0][0]['UNPAID_FAMILY_WORKERS_MALE'] ;?></td>
   <td><?=$result_temporary[0][0]['UNPAID_FAMILY_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Full Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['FULL_TIME_WORKERS'] ;?></td>
   <td><?=$temporary_fulltime_percent  ;?></td>
   <td><?=$result_temporary[0][0]['FULL_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_temporary[0][0]['FULL_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Part-Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['PART_TIME_WORKERS'] ;?></td>
   <td><?=$temporary_parttime_percent  ;?></td>
   <td><?=$result_temporary[0][0]['PART_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_temporary[0][0]['PART_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Casual Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_temporary[0][0]['CASUAL_WORKERS'] ;?></td>
   <td><?=$temporary_casual_percent  ;?></td>
   <td><?=$result_temporary[0][0]['CASUAL_WORKERS_MALE'] ;?></td>
   <td><?=$result_temporary[0][0]['CASUAL_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>











 <!-- HouseHold Section -->
<tr>
  <td><strong>Economic Household</strong>
</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['TOTAL_PERSON_ENGAGED'] ;?></td>
   <td><?=$household_establishments_percent ;?></td>
   <td><?=$result_household[0][0]['TOTAL_MALE_ENGAGED'] ;?></td>
   <td><?=$result_household[0][0]['TOTAL_FEMALE_ENGAGED'] ;?></td>
   <td></td>
 </tr>



 <tr>
   <td>Working Proprietor</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['WORKING_PROPRIETOR'] ;?></td>
   <td><?=$household_proprietor_percent ;?></td>
   <td><?=$result_household[0][0]['WORKING_PROPRIETOR_MALE'] ;?></td>
   <td><?=$result_household[0][0]['WORKING_PROPRIETOR_FEMALE'] ;?></td>
   <td></td>
   
 </tr>


  <tr>
   <td>Unpaid Family Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['UNPAID_FAMILY_WORKERS'] ;?></td>
   <td><?=$household_unpaid_percent ;?></td>
   <td><?=$result_household[0][0]['UNPAID_FAMILY_WORKERS_MALE'] ;?></td>
   <td><?=$result_household[0][0]['UNPAID_FAMILY_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Full Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['FULL_TIME_WORKERS'] ;?></td>
   <td><?=$household_fulltime_percent  ;?></td>
   <td><?=$result_household[0][0]['FULL_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_household[0][0]['FULL_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Part-Time Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['PART_TIME_WORKERS'] ;?></td>
   <td><?=$household_parttime_percent  ;?></td>
   <td><?=$result_household[0][0]['PART_TIME_WORKERS_MALE'] ;?></td>
   <td><?=$result_household[0][0]['PART_TIME_WORKERS_FEMALE'] ;?></td>
   <td></td>
 </tr>

  <tr>
   <td>Casual Workers</td>
   <td></td>
   <td></td>
   <td></td>
   <td></td>
   <td><?=$result_household[0][0]['CASUAL_WORKERS'] ;?></td>
   <td><?=$household_casual_percent  ;?></td>
   <td><?=$result_household[0][0]['CASUAL_WORKERS_MALE'] ;?></td>
   <td><?=$result_household[0][0]['CASUAL_WORKERS_FEMALE'] ;?></td>
   <td></td>
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

} ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>
