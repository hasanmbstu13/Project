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
   <td colspan="23"><b>Table- 7: Head of Establishments by Sex, Level of Education, Location and Economic Activity in 2013.</b></td>
</tr>

<thead>


  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Data Items</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Total Estab.</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Agriculture, Forestry, Fishing</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Mining and Quarrying</div>
  </th>
  
  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Manufacturing</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Electricity, Gas, Steam and Air Conditioning Supply</div>
  </th>


  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Water Supply, Sewerage, Waste Management and Remediation</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Construction</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Wholesale &amp; Retail Trade, Repair of Motor Vehicles &amp; Motorcycles</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Transportation and Storage</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Accommodation and Food Service Activities (Hotel &amp; Restaurants)</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Information and Communication </div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Financial and Insurance Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Real Estate Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Professional, Scientific and Technical Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Administration and Support Service Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Public Administration &amp; Defense, Compulsory Social Security</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Education</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Human Health and Social Work Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Arts,Entertainment and Recreation</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Other Service Activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 45px;text-align: left;">
    <div style=" margin-left: -75px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Activities of Household as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Activities of Extraterritorial Organizations and Bodies</div>
  </th>


  
 
 </thead>


<tbody>
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
   <td>19</td>
   <td>20</td>
   <td>21</td>
   <td>22</td>
   <td>23</td>
 </tr>
  
<!-- MALE -->
<tr>
  <td><strong>Male Headed Estab.</strong></td>

  <td><?=$data['male_total_est']?></td>
  <td><?=$data['male_total_agri']?></td>
  <td><?=$data['male_total_mining']?></td>
  <td><?=$data['male_total_manufacturing']?></td>
  <td><?=$data['male_total_electricity']?></td>
  <td><?=$data['male_total_water']?></td>
  <td><?=$data['male_total_construction']?></td>
  <td><?=$data['male_total_wholesale']?></td>
  <td><?=$data['male_total_transport']?></td>
  <td><?=$data['male_total_accomodation']?></td>
  <td><?=$data['male_total_information']?></td>
  <td><?=$data['male_total_financial']?></td>
  <td><?=$data['male_total_real_estate']?></td>
  <td><?=$data['male_total_professional']?></td>
  <td><?=$data['male_total_administration']?></td>
  <td><?=$data['male_total_public']?></td>
  <td><?=$data['male_total_education']?></td>
  <td><?=$data['male_total_human']?></td>
  <td><?=$data['male_total_arts']?></td>
  <td><?=$data['male_total_other_service']?></td>
  <td><?=$data['male_total_households']?></td>
  <td><?=$data['male_total_extraterritorial']?></td>
   
</tr>

<tr>
  <td>None</td>

  <td><?=$data['male_none_est']?></td>
  <td><?=$data['male_none_agri']?></td>
  <td><?=$data['male_none_mining']?></td>
  <td><?=$data['male_none_manufacturing']?></td>
  <td><?=$data['male_none_electricity']?></td>
  <td><?=$data['male_none_water']?></td>
  <td><?=$data['male_none_construction']?></td>
  <td><?=$data['male_none_wholesale']?></td>
  <td><?=$data['male_none_transport']?></td>
  <td><?=$data['male_none_accomodation']?></td>
  <td><?=$data['male_none_information']?></td>
  <td><?=$data['male_none_financial']?></td>
  <td><?=$data['male_none_real_estate']?></td>
  <td><?=$data['male_none_professional']?></td>
  <td><?=$data['male_none_administration']?></td>
  <td><?=$data['male_none_public']?></td>
  <td><?=$data['male_none_education']?></td>
  <td><?=$data['male_none_human']?></td>
  <td><?=$data['male_none_arts']?></td>
  <td><?=$data['male_none_other_service']?></td>
  <td><?=$data['male_none_households']?></td>
  <td><?=$data['male_none_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Primary</td>

  <td><?=$data['male_primary_est']?></td>
  <td><?=$data['male_primary_agri']?></td>
  <td><?=$data['male_primary_mining']?></td>
  <td><?=$data['male_primary_manufacturing']?></td>
  <td><?=$data['male_primary_electricity']?></td>
  <td><?=$data['male_primary_water']?></td>
  <td><?=$data['male_primary_construction']?></td>
  <td><?=$data['male_primary_wholesale']?></td>
  <td><?=$data['male_primary_transport']?></td>
  <td><?=$data['male_primary_accomodation']?></td>
  <td><?=$data['male_primary_information']?></td>
  <td><?=$data['male_primary_financial']?></td>
  <td><?=$data['male_primary_real_estate']?></td>
  <td><?=$data['male_primary_professional']?></td>
  <td><?=$data['male_primary_administration']?></td>
  <td><?=$data['male_primary_public']?></td>
  <td><?=$data['male_primary_education']?></td>
  <td><?=$data['male_primary_human']?></td>
  <td><?=$data['male_primary_arts']?></td>
  <td><?=$data['male_primary_other_service']?></td>
  <td><?=$data['male_primary_households']?></td>
  <td><?=$data['male_primary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Lower Secondary</td>

  <td><?=$data['male_lower_est']?></td>
  <td><?=$data['male_lower_agri']?></td>
  <td><?=$data['male_lower_mining']?></td>
  <td><?=$data['male_lower_manufacturing']?></td>
  <td><?=$data['male_lower_electricity']?></td>
  <td><?=$data['male_lower_water']?></td>
  <td><?=$data['male_lower_construction']?></td>
  <td><?=$data['male_lower_wholesale']?></td>
  <td><?=$data['male_lower_transport']?></td>
  <td><?=$data['male_lower_accomodation']?></td>
  <td><?=$data['male_lower_information']?></td>
  <td><?=$data['male_lower_financial']?></td>
  <td><?=$data['male_lower_real_estate']?></td>
  <td><?=$data['male_lower_professional']?></td>
  <td><?=$data['male_lower_administration']?></td>
  <td><?=$data['male_lower_public']?></td>
  <td><?=$data['male_lower_education']?></td>
  <td><?=$data['male_lower_human']?></td>
  <td><?=$data['male_lower_arts']?></td>
  <td><?=$data['male_lower_other_service']?></td>
  <td><?=$data['male_lower_households']?></td>
  <td><?=$data['male_lower_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Secondary</td>

  <td><?=$data['male_secondary_est']?></td>
  <td><?=$data['male_secondary_agri']?></td>
  <td><?=$data['male_secondary_mining']?></td>
  <td><?=$data['male_secondary_manufacturing']?></td>
  <td><?=$data['male_secondary_electricity']?></td>
  <td><?=$data['male_secondary_water']?></td>
  <td><?=$data['male_secondary_construction']?></td>
  <td><?=$data['male_secondary_wholesale']?></td>
  <td><?=$data['male_secondary_transport']?></td>
  <td><?=$data['male_secondary_accomodation']?></td>
  <td><?=$data['male_secondary_information']?></td>
  <td><?=$data['male_secondary_financial']?></td>
  <td><?=$data['male_secondary_real_estate']?></td>
  <td><?=$data['male_secondary_professional']?></td>
  <td><?=$data['male_secondary_administration']?></td>
  <td><?=$data['male_secondary_public']?></td>
  <td><?=$data['male_secondary_education']?></td>
  <td><?=$data['male_secondary_human']?></td>
  <td><?=$data['male_secondary_arts']?></td>
  <td><?=$data['male_secondary_other_service']?></td>
  <td><?=$data['male_secondary_households']?></td>
  <td><?=$data['male_secondary_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Higher Secondary</td>

  <td><?=$data['male_higher_secondary_est']?></td>
  <td><?=$data['male_higher_secondary_agri']?></td>
  <td><?=$data['male_higher_secondary_mining']?></td>
  <td><?=$data['male_higher_secondary_manufacturing']?></td>
  <td><?=$data['male_higher_secondary_electricity']?></td>
  <td><?=$data['male_higher_secondary_water']?></td>
  <td><?=$data['male_higher_secondary_construction']?></td>
  <td><?=$data['male_higher_secondary_wholesale']?></td>
  <td><?=$data['male_higher_secondary_transport']?></td>
  <td><?=$data['male_higher_secondary_accomodation']?></td>
  <td><?=$data['male_higher_secondary_information']?></td>
  <td><?=$data['male_higher_secondary_financial']?></td>
  <td><?=$data['male_higher_secondary_real_estate']?></td>
  <td><?=$data['male_higher_secondary_professional']?></td>
  <td><?=$data['male_higher_secondary_administration']?></td>
  <td><?=$data['male_higher_secondary_public']?></td>
  <td><?=$data['male_higher_secondary_education']?></td>
  <td><?=$data['male_higher_secondary_human']?></td>
  <td><?=$data['male_higher_secondary_arts']?></td>
  <td><?=$data['male_higher_secondary_other_service']?></td>
  <td><?=$data['male_higher_secondary_households']?></td>
  <td><?=$data['male_higher_secondary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Degree or Above </td>

  <td><?=$data['male_degree_est']?></td>
  <td><?=$data['male_degree_agri']?></td>
  <td><?=$data['male_degree_mining']?></td>
  <td><?=$data['male_degree_manufacturing']?></td>
  <td><?=$data['male_degree_electricity']?></td>
  <td><?=$data['male_degree_water']?></td>
  <td><?=$data['male_degree_construction']?></td>
  <td><?=$data['male_degree_wholesale']?></td>
  <td><?=$data['male_degree_transport']?></td>
  <td><?=$data['male_degree_accomodation']?></td>
  <td><?=$data['male_degree_information']?></td>
  <td><?=$data['male_degree_financial']?></td>
  <td><?=$data['male_degree_real_estate']?></td>
  <td><?=$data['male_degree_professional']?></td>
  <td><?=$data['male_degree_administration']?></td>
  <td><?=$data['male_degree_public']?></td>
  <td><?=$data['male_degree_education']?></td>
  <td><?=$data['male_degree_human']?></td>
  <td><?=$data['male_degree_arts']?></td>
  <td><?=$data['male_degree_other_service']?></td>
  <td><?=$data['male_degree_households']?></td>
  <td><?=$data['male_degree_extraterritorial']?></td>
   
</tr> 

  <!--FEMALE  -->

  <tr>
  <td><strong>Female Headed Estab.</strong></td>

  <td><?=$data['female_total_est']?></td>
  <td><?=$data['female_total_agri']?></td>
  <td><?=$data['female_total_mining']?></td>
  <td><?=$data['female_total_manufacturing']?></td>
  <td><?=$data['female_total_electricity']?></td>
  <td><?=$data['female_total_water']?></td>
  <td><?=$data['female_total_construction']?></td>
  <td><?=$data['female_total_wholesale']?></td>
  <td><?=$data['female_total_transport']?></td>
  <td><?=$data['female_total_accomodation']?></td>
  <td><?=$data['female_total_information']?></td>
  <td><?=$data['female_total_financial']?></td>
  <td><?=$data['female_total_real_estate']?></td>
  <td><?=$data['female_total_professional']?></td>
  <td><?=$data['female_total_administration']?></td>
  <td><?=$data['female_total_public']?></td>
  <td><?=$data['female_total_education']?></td>
  <td><?=$data['female_total_human']?></td>
  <td><?=$data['female_total_arts']?></td>
  <td><?=$data['female_total_other_service']?></td>
  <td><?=$data['female_total_households']?></td>
  <td><?=$data['female_total_extraterritorial']?></td>
   
</tr>

<tr>
  <td>None</td>

  <td><?=$data['female_none_est']?></td>
  <td><?=$data['female_none_agri']?></td>
  <td><?=$data['female_none_mining']?></td>
  <td><?=$data['female_none_manufacturing']?></td>
  <td><?=$data['female_none_electricity']?></td>
  <td><?=$data['female_none_water']?></td>
  <td><?=$data['female_none_construction']?></td>
  <td><?=$data['female_none_wholesale']?></td>
  <td><?=$data['female_none_transport']?></td>
  <td><?=$data['female_none_accomodation']?></td>
  <td><?=$data['female_none_information']?></td>
  <td><?=$data['female_none_financial']?></td>
  <td><?=$data['female_none_real_estate']?></td>
  <td><?=$data['female_none_professional']?></td>
  <td><?=$data['female_none_administration']?></td>
  <td><?=$data['female_none_public']?></td>
  <td><?=$data['female_none_education']?></td>
  <td><?=$data['female_none_human']?></td>
  <td><?=$data['female_none_arts']?></td>
  <td><?=$data['female_none_other_service']?></td>
  <td><?=$data['female_none_households']?></td>
  <td><?=$data['female_none_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Primary</td>

  <td><?=$data['female_primary_est']?></td>
  <td><?=$data['female_primary_agri']?></td>
  <td><?=$data['female_primary_mining']?></td>
  <td><?=$data['female_primary_manufacturing']?></td>
  <td><?=$data['female_primary_electricity']?></td>
  <td><?=$data['female_primary_water']?></td>
  <td><?=$data['female_primary_construction']?></td>
  <td><?=$data['female_primary_wholesale']?></td>
  <td><?=$data['female_primary_transport']?></td>
  <td><?=$data['female_primary_accomodation']?></td>
  <td><?=$data['female_primary_information']?></td>
  <td><?=$data['female_primary_financial']?></td>
  <td><?=$data['female_primary_real_estate']?></td>
  <td><?=$data['female_primary_professional']?></td>
  <td><?=$data['female_primary_administration']?></td>
  <td><?=$data['female_primary_public']?></td>
  <td><?=$data['female_primary_education']?></td>
  <td><?=$data['female_primary_human']?></td>
  <td><?=$data['female_primary_arts']?></td>
  <td><?=$data['female_primary_other_service']?></td>
  <td><?=$data['female_primary_households']?></td>
  <td><?=$data['female_primary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Lower Secondary</td>

  <td><?=$data['female_lower_est']?></td>
  <td><?=$data['female_lower_agri']?></td>
  <td><?=$data['female_lower_mining']?></td>
  <td><?=$data['female_lower_manufacturing']?></td>
  <td><?=$data['female_lower_electricity']?></td>
  <td><?=$data['female_lower_water']?></td>
  <td><?=$data['female_lower_construction']?></td>
  <td><?=$data['female_lower_wholesale']?></td>
  <td><?=$data['female_lower_transport']?></td>
  <td><?=$data['female_lower_accomodation']?></td>
  <td><?=$data['female_lower_information']?></td>
  <td><?=$data['female_lower_financial']?></td>
  <td><?=$data['female_lower_real_estate']?></td>
  <td><?=$data['female_lower_professional']?></td>
  <td><?=$data['female_lower_administration']?></td>
  <td><?=$data['female_lower_public']?></td>
  <td><?=$data['female_lower_education']?></td>
  <td><?=$data['female_lower_human']?></td>
  <td><?=$data['female_lower_arts']?></td>
  <td><?=$data['female_lower_other_service']?></td>
  <td><?=$data['female_lower_households']?></td>
  <td><?=$data['female_lower_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Secondary</td>

  <td><?=$data['female_secondary_est']?></td>
  <td><?=$data['female_secondary_agri']?></td>
  <td><?=$data['female_secondary_mining']?></td>
  <td><?=$data['female_secondary_manufacturing']?></td>
  <td><?=$data['female_secondary_electricity']?></td>
  <td><?=$data['female_secondary_water']?></td>
  <td><?=$data['female_secondary_construction']?></td>
  <td><?=$data['female_secondary_wholesale']?></td>
  <td><?=$data['female_secondary_transport']?></td>
  <td><?=$data['female_secondary_accomodation']?></td>
  <td><?=$data['female_secondary_information']?></td>
  <td><?=$data['female_secondary_financial']?></td>
  <td><?=$data['female_secondary_real_estate']?></td>
  <td><?=$data['female_secondary_professional']?></td>
  <td><?=$data['female_secondary_administration']?></td>
  <td><?=$data['female_secondary_public']?></td>
  <td><?=$data['female_secondary_education']?></td>
  <td><?=$data['female_secondary_human']?></td>
  <td><?=$data['female_secondary_arts']?></td>
  <td><?=$data['female_secondary_other_service']?></td>
  <td><?=$data['female_secondary_households']?></td>
  <td><?=$data['female_secondary_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Higher Secondary</td>

  <td><?=$data['female_higher_secondary_est']?></td>
  <td><?=$data['female_higher_secondary_agri']?></td>
  <td><?=$data['female_higher_secondary_mining']?></td>
  <td><?=$data['female_higher_secondary_manufacturing']?></td>
  <td><?=$data['female_higher_secondary_electricity']?></td>
  <td><?=$data['female_higher_secondary_water']?></td>
  <td><?=$data['female_higher_secondary_construction']?></td>
  <td><?=$data['female_higher_secondary_wholesale']?></td>
  <td><?=$data['female_higher_secondary_transport']?></td>
  <td><?=$data['female_higher_secondary_accomodation']?></td>
  <td><?=$data['female_higher_secondary_information']?></td>
  <td><?=$data['female_higher_secondary_financial']?></td>
  <td><?=$data['female_higher_secondary_real_estate']?></td>
  <td><?=$data['female_higher_secondary_professional']?></td>
  <td><?=$data['female_higher_secondary_administration']?></td>
  <td><?=$data['female_higher_secondary_public']?></td>
  <td><?=$data['female_higher_secondary_education']?></td>
  <td><?=$data['female_higher_secondary_human']?></td>
  <td><?=$data['female_higher_secondary_arts']?></td>
  <td><?=$data['female_higher_secondary_other_service']?></td>
  <td><?=$data['female_higher_secondary_households']?></td>
  <td><?=$data['female_higher_secondary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Degree or Above </td>

  <td><?=$data['female_degree_est']?></td>
  <td><?=$data['female_degree_agri']?></td>
  <td><?=$data['female_degree_mining']?></td>
  <td><?=$data['female_degree_manufacturing']?></td>
  <td><?=$data['female_degree_electricity']?></td>
  <td><?=$data['female_degree_water']?></td>
  <td><?=$data['female_degree_construction']?></td>
  <td><?=$data['female_degree_wholesale']?></td>
  <td><?=$data['female_degree_transport']?></td>
  <td><?=$data['female_degree_accomodation']?></td>
  <td><?=$data['female_degree_information']?></td>
  <td><?=$data['female_degree_financial']?></td>
  <td><?=$data['female_degree_real_estate']?></td>
  <td><?=$data['female_degree_professional']?></td>
  <td><?=$data['female_degree_administration']?></td>
  <td><?=$data['female_degree_public']?></td>
  <td><?=$data['female_degree_education']?></td>
  <td><?=$data['female_degree_human']?></td>
  <td><?=$data['female_degree_arts']?></td>
  <td><?=$data['female_degree_other_service']?></td>
  <td><?=$data['female_degree_households']?></td>
  <td><?=$data['female_degree_extraterritorial']?></td>
   
</tr>   

<!-- OTHER -->


<tr>
  <td><strong>Other Estab.</strong></td>

  <td><?=$data['other_total_est']?></td>
  <td><?=$data['other_total_agri']?></td>
  <td><?=$data['other_total_mining']?></td>
  <td><?=$data['other_total_manufacturing']?></td>
  <td><?=$data['other_total_electricity']?></td>
  <td><?=$data['other_total_water']?></td>
  <td><?=$data['other_total_construction']?></td>
  <td><?=$data['other_total_wholesale']?></td>
  <td><?=$data['other_total_transport']?></td>
  <td><?=$data['other_total_accomodation']?></td>
  <td><?=$data['other_total_information']?></td>
  <td><?=$data['other_total_financial']?></td>
  <td><?=$data['other_total_real_estate']?></td>
  <td><?=$data['other_total_professional']?></td>
  <td><?=$data['other_total_administration']?></td>
  <td><?=$data['other_total_public']?></td>
  <td><?=$data['other_total_education']?></td>
  <td><?=$data['other_total_human']?></td>
  <td><?=$data['other_total_arts']?></td>
  <td><?=$data['other_total_other_service']?></td>
  <td><?=$data['other_total_households']?></td>
  <td><?=$data['other_total_extraterritorial']?></td>
   
</tr>

<tr>
  <td>None</td>

  <td><?=$data['other_none_est']?></td>
  <td><?=$data['other_none_agri']?></td>
  <td><?=$data['other_none_mining']?></td>
  <td><?=$data['other_none_manufacturing']?></td>
  <td><?=$data['other_none_electricity']?></td>
  <td><?=$data['other_none_water']?></td>
  <td><?=$data['other_none_construction']?></td>
  <td><?=$data['other_none_wholesale']?></td>
  <td><?=$data['other_none_transport']?></td>
  <td><?=$data['other_none_accomodation']?></td>
  <td><?=$data['other_none_information']?></td>
  <td><?=$data['other_none_financial']?></td>
  <td><?=$data['other_none_real_estate']?></td>
  <td><?=$data['other_none_professional']?></td>
  <td><?=$data['other_none_administration']?></td>
  <td><?=$data['other_none_public']?></td>
  <td><?=$data['other_none_education']?></td>
  <td><?=$data['other_none_human']?></td>
  <td><?=$data['other_none_arts']?></td>
  <td><?=$data['other_none_other_service']?></td>
  <td><?=$data['other_none_households']?></td>
  <td><?=$data['other_none_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Primary</td>

  <td><?=$data['other_primary_est']?></td>
  <td><?=$data['other_primary_agri']?></td>
  <td><?=$data['other_primary_mining']?></td>
  <td><?=$data['other_primary_manufacturing']?></td>
  <td><?=$data['other_primary_electricity']?></td>
  <td><?=$data['other_primary_water']?></td>
  <td><?=$data['other_primary_construction']?></td>
  <td><?=$data['other_primary_wholesale']?></td>
  <td><?=$data['other_primary_transport']?></td>
  <td><?=$data['other_primary_accomodation']?></td>
  <td><?=$data['other_primary_information']?></td>
  <td><?=$data['other_primary_financial']?></td>
  <td><?=$data['other_primary_real_estate']?></td>
  <td><?=$data['other_primary_professional']?></td>
  <td><?=$data['other_primary_administration']?></td>
  <td><?=$data['other_primary_public']?></td>
  <td><?=$data['other_primary_education']?></td>
  <td><?=$data['other_primary_human']?></td>
  <td><?=$data['other_primary_arts']?></td>
  <td><?=$data['other_primary_other_service']?></td>
  <td><?=$data['other_primary_households']?></td>
  <td><?=$data['other_primary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Lower Secondary</td>

  <td><?=$data['other_lower_est']?></td>
  <td><?=$data['other_lower_agri']?></td>
  <td><?=$data['other_lower_mining']?></td>
  <td><?=$data['other_lower_manufacturing']?></td>
  <td><?=$data['other_lower_electricity']?></td>
  <td><?=$data['other_lower_water']?></td>
  <td><?=$data['other_lower_construction']?></td>
  <td><?=$data['other_lower_wholesale']?></td>
  <td><?=$data['other_lower_transport']?></td>
  <td><?=$data['other_lower_accomodation']?></td>
  <td><?=$data['other_lower_information']?></td>
  <td><?=$data['other_lower_financial']?></td>
  <td><?=$data['other_lower_real_estate']?></td>
  <td><?=$data['other_lower_professional']?></td>
  <td><?=$data['other_lower_administration']?></td>
  <td><?=$data['other_lower_public']?></td>
  <td><?=$data['other_lower_education']?></td>
  <td><?=$data['other_lower_human']?></td>
  <td><?=$data['other_lower_arts']?></td>
  <td><?=$data['other_lower_other_service']?></td>
  <td><?=$data['other_lower_households']?></td>
  <td><?=$data['other_lower_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Secondary</td>

  <td><?=$data['other_secondary_est']?></td>
  <td><?=$data['other_secondary_agri']?></td>
  <td><?=$data['other_secondary_mining']?></td>
  <td><?=$data['other_secondary_manufacturing']?></td>
  <td><?=$data['other_secondary_electricity']?></td>
  <td><?=$data['other_secondary_water']?></td>
  <td><?=$data['other_secondary_construction']?></td>
  <td><?=$data['other_secondary_wholesale']?></td>
  <td><?=$data['other_secondary_transport']?></td>
  <td><?=$data['other_secondary_accomodation']?></td>
  <td><?=$data['other_secondary_information']?></td>
  <td><?=$data['other_secondary_financial']?></td>
  <td><?=$data['other_secondary_real_estate']?></td>
  <td><?=$data['other_secondary_professional']?></td>
  <td><?=$data['other_secondary_administration']?></td>
  <td><?=$data['other_secondary_public']?></td>
  <td><?=$data['other_secondary_education']?></td>
  <td><?=$data['other_secondary_human']?></td>
  <td><?=$data['other_secondary_arts']?></td>
  <td><?=$data['other_secondary_other_service']?></td>
  <td><?=$data['other_secondary_households']?></td>
  <td><?=$data['other_secondary_extraterritorial']?></td>
   
</tr> 


<tr>
  <td>Higher Secondary</td>

  <td><?=$data['other_higher_secondary_est']?></td>
  <td><?=$data['other_higher_secondary_agri']?></td>
  <td><?=$data['other_higher_secondary_mining']?></td>
  <td><?=$data['other_higher_secondary_manufacturing']?></td>
  <td><?=$data['other_higher_secondary_electricity']?></td>
  <td><?=$data['other_higher_secondary_water']?></td>
  <td><?=$data['other_higher_secondary_construction']?></td>
  <td><?=$data['other_higher_secondary_wholesale']?></td>
  <td><?=$data['other_higher_secondary_transport']?></td>
  <td><?=$data['other_higher_secondary_accomodation']?></td>
  <td><?=$data['other_higher_secondary_information']?></td>
  <td><?=$data['other_higher_secondary_financial']?></td>
  <td><?=$data['other_higher_secondary_real_estate']?></td>
  <td><?=$data['other_higher_secondary_professional']?></td>
  <td><?=$data['other_higher_secondary_administration']?></td>
  <td><?=$data['other_higher_secondary_public']?></td>
  <td><?=$data['other_higher_secondary_education']?></td>
  <td><?=$data['other_higher_secondary_human']?></td>
  <td><?=$data['other_higher_secondary_arts']?></td>
  <td><?=$data['other_higher_secondary_other_service']?></td>
  <td><?=$data['other_higher_secondary_households']?></td>
  <td><?=$data['other_higher_secondary_extraterritorial']?></td>
   
</tr> 

<tr>
  <td>Degree or Above </td>

  <td><?=$data['other_degree_est']?></td>
  <td><?=$data['other_degree_agri']?></td>
  <td><?=$data['other_degree_mining']?></td>
  <td><?=$data['other_degree_manufacturing']?></td>
  <td><?=$data['other_degree_electricity']?></td>
  <td><?=$data['other_degree_water']?></td>
  <td><?=$data['other_degree_construction']?></td>
  <td><?=$data['other_degree_wholesale']?></td>
  <td><?=$data['other_degree_transport']?></td>
  <td><?=$data['other_degree_accomodation']?></td>
  <td><?=$data['other_degree_information']?></td>
  <td><?=$data['other_degree_financial']?></td>
  <td><?=$data['other_degree_real_estate']?></td>
  <td><?=$data['other_degree_professional']?></td>
  <td><?=$data['other_degree_administration']?></td>
  <td><?=$data['other_degree_public']?></td>
  <td><?=$data['other_degree_education']?></td>
  <td><?=$data['other_degree_human']?></td>
  <td><?=$data['other_degree_arts']?></td>
  <td><?=$data['other_degree_other_service']?></td>
  <td><?=$data['other_degree_households']?></td>
  <td><?=$data['other_degree_extraterritorial']?></td>
   
</tr>   




</tbody>



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



