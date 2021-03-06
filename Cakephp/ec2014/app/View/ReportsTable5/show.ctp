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
   <td colspan="25"><b>Table- 5: Permanent Establishment by Major Economic Activity, Location and Total Person Engaged (TPE) in 2013.</b></td>
</tr>


<thead>


  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Geo Code</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Union, Upazila and Zila</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Data item </div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">All Sectors</div>
  </th>
  
<!--   <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Agriculture, forestry and fishing</div>
  </th> -->

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Mining and quarrying</div>
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
     -ms-transform: rotate(-90deg); /* IE 9 */">Electricity, Gas, steam and air conditioning supply</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Water supply, sewerage, waste management and remediation</div>
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
     -ms-transform: rotate(-90deg); /* IE 9 */">Wholesale &amp; retail trade, repair of motor vehicles &amp; motorcycles</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Transportation and storage</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Accommodation and food service activities (Hotel &amp; restaurants)</div>
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
     -ms-transform: rotate(-90deg); /* IE 9 */">Financial and insurance activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Real Estate activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Professional, scientific and technical activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Administration and support service activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Public Administration &amp; Defense, compulsory social security</div>
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
     -ms-transform: rotate(-90deg); /* IE 9 */">Human health and social work activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Arts,entertainment and recreation</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Other service activities</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 45px;text-align: left;">
    <div style=" margin-left: -75px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Activities of household as employers, undifferentiated goods and services producing activities of households for own use</div>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 20px;text-align: left;">
    <div style=" margin-left: -85px;position: absolute; width: 215px;transform: rotate(-90deg);
     -webkit-transform: rotate(-90deg); /* Safari/Chrome */
     -moz-transform: rotate(-90deg); /* Firefox */
     -o-transform: rotate(-90deg); /* Opera */
     -ms-transform: rotate(-90deg); /* IE 9 */">Activities of extraterritorial organizations and bodies</div>
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
   <td>24</td>
   <td>25</td>
 </tr>

<tr>
  <td>&nbsp;</td>
  <td><strong><?=substr($zila, 0, -4);  ?></strong></td>
  <td colspan = 23>&nbsp;</td>
</tr>

<?php

    $est_all_sector = 0;
    $est_mining_quarry = 0;
    $est_manufac_quarry = 0;
    $est_electricity_quarry = 0;
    $est_water_quarry = 0;
    $est_construction_quarry = 0;
    $est_wholesale_quarry = 0;
    $est_trasnportation_quarry = 0;
    $est_accomodation_quarry = 0;
    $est_information_quarry = 0;
    $est_financial_quarry = 0;
    $est_realestate_quarry = 0;
    $est_professional_quarry = 0;
    $est_administrative_quarry = 0;
    $est_public_administrative_quarry = 0;
    $est_education_quarry = 0;
    $est_human_quarry = 0;
    $est_art_quarry = 0;
    $est_other_service_quarry = 0;
    $est_activities_household_quarry = 0;
    $est_activities_extraterritorial_quarry = 0;

    $person_all_sector = 0;
    $person_mining_quarry = 0;
    $person_manufac_quarry = 0;
    $person_electricity_quarry = 0;
    $person_water_quarry = 0;
    $person_construction_quarry = 0;
    $person_wholesale_quarry = 0;
    $person_trasnportation_quarry = 0;
    $person_accomodation_quarry = 0;
    $person_information_quarry = 0;
    $person_financial_quarry = 0;
    $person_realestate_quarry = 0;
    $person_professional_quarry = 0;
    $person_administrative_quarry = 0;
    $person_public_administrative_quarry = 0;
    $person_education_quarry = 0;
    $person_human_quarry = 0;
    $person_art_quarry = 0;
    $person_other_service_quarry = 0;
    $person_activities_household_quarry = 0;
    $person_activities_extraterritorial_quarry = 0;

?>



<?php 
    #debug($data);
    foreach ($data as $res)  
    { 

      if(isset($res['upazila_name'])) { 
?>


        <tr>
          <td><?=$res['zila_code']?> &nbsp; <?=$res['upzila_code']?></td>
          <td><strong>Upazila:<?= $data[0]['upazila_name']?></strong></td>
          <td colspan = 23>&nbsp;</td>
        </tr>
      <?php } else { ?>


<?php 

    $est_all_sector += $res['est_all_sector'];
    $est_mining_quarry += $res['est_mining_quarry'];
    $est_manufac_quarry += $res['est_manufac_quarry'];
    $est_electricity_quarry += $res['est_electricity_quarry'];
    $est_water_quarry += $res['est_water_quarry'];
    $est_construction_quarry += $res['est_construction_quarry'];
    $est_wholesale_quarry += $res['est_wholesale_quarry'];
    $est_trasnportation_quarry += $res['est_trasnportation_quarry'];
    $est_accomodation_quarry += $res['est_accomodation_quarry'];
    $est_information_quarry += $res['est_information_quarry'];
    $est_financial_quarry += $res['est_financial_quarry'];
    $est_realestate_quarry += $res['est_realestate_quarry'];
    $est_professional_quarry += $res['est_professional_quarry'];
    $est_administrative_quarry += $res['est_administrative_quarry'];
    $est_public_administrative_quarry += $res['est_public_administrative_quarry'];
    $est_education_quarry += $res['est_education_quarry'];
    $est_human_quarry += $res['est_human_quarry'];
    $est_art_quarry += $res['est_art_quarry'];
    $est_other_service_quarry += $res['est_other_service_quarry'];
    $est_activities_household_quarry += $res['est_activities_household_quarry'];
    $est_activities_extraterritorial_quarry += $res['est_activities_extraterritorial_quarry'];

    $person_all_sector += $res['person_all_sector'];
    $person_mining_quarry += $res['person_mining_quarry'];
    $person_manufac_quarry += $res['person_manufac_quarry'];
    $person_electricity_quarry += $res['person_electricity_quarry'];
    $person_water_quarry += $res['person_water_quarry'];
    $person_construction_quarry += $res['person_construction_quarry'];
    $person_wholesale_quarry += $res['person_wholesale_quarry'];
    $person_trasnportation_quarry += $res['person_trasnportation_quarry'];
    $person_accomodation_quarry += $res['person_accomodation_quarry'];
    $person_information_quarry += $res['person_information_quarry'];
    $person_financial_quarry += $res['person_financial_quarry'];
    $person_realestate_quarry += $res['person_realestate_quarry'];
    $person_professional_quarry += $res['person_professional_quarry'];
    $person_administrative_quarry += $res['person_administrative_quarry'];
    $person_public_administrative_quarry += $res['person_public_administrative_quarry'];
    $person_education_quarry += $res['person_education_quarry'];
    $person_human_quarry += $res['person_human_quarry'];
    $person_art_quarry += $res['person_art_quarry'];
    $person_other_service_quarry += $res['person_other_service_quarry'];
    $person_activities_household_quarry += $res['person_activities_household_quarry'];
    $person_activities_extraterritorial_quarry += $res['person_activities_extraterritorial_quarry'];

?>



      
      <tr>
      <td  rowspan = "2"><?= $res['upzila_code']; ?> &nbsp; <?= $res['union_code']; ?></td>
      <td rowspan = "2" ><?= $res['union_name']; ?></td>

      <td>Estab.</td>
            <td><?=$res['est_all_sector']?></td>     
            <td><?=$res['est_mining_quarry']?></td>  
            <td><?=$res['est_manufac_quarry']?></td>
            <td><?=$res['est_electricity_quarry']?></td>
            <td><?=$res['est_water_quarry']?></td>
            <td><?=$res['est_construction_quarry']?></td>
            <td><?=$res['est_wholesale_quarry']?></td>
            <td><?=$res['est_trasnportation_quarry']?></td>
            <td><?=$res['est_accomodation_quarry']?></td>
            <td><?=$res['est_information_quarry']?></td>
            <td><?=$res['est_financial_quarry']?></td>
            <td><?=$res['est_realestate_quarry']?></td>
            <td><?=$res['est_professional_quarry']?></td>
            <td><?=$res['est_administrative_quarry']?></td>
            <td><?=$res['est_public_administrative_quarry']?></td>            
            <td><?=$res['est_education_quarry']?></td>
            <td><?=$res['est_human_quarry']?></td>
            <td><?=$res['est_art_quarry']?></td>
            <td><?=$res['est_other_service_quarry']?></td>
            <td><?=$res['est_activities_household_quarry']?></td>
            <td><?=$res['est_activities_extraterritorial_quarry']?></td>    
</tr>

<tr>
   <td>Persons</td>
            <td><?=$res['person_all_sector']?></td>    
            <td><?=$res['person_mining_quarry']?></td>  
            <td><?=$res['person_manufac_quarry']?></td>
            <td><?=$res['person_electricity_quarry']?></td>
            <td><?=$res['person_water_quarry']?></td>
            <td><?=$res['person_construction_quarry']?></td>
            <td><?=$res['person_wholesale_quarry']?></td>
            <td><?=$res['person_trasnportation_quarry']?></td>
            <td><?=$res['person_accomodation_quarry']?></td>
            <td><?=$res['person_information_quarry']?></td>
            <td><?=$res['person_financial_quarry']?></td>
            <td><?=$res['person_realestate_quarry']?></td>
            <td><?=$res['person_professional_quarry']?></td>
            <td><?=$res['person_administrative_quarry']?></td>
            <td><?=$res['person_public_administrative_quarry']?></td>            
            <td><?=$res['person_education_quarry']?></td>
            <td><?=$res['person_human_quarry']?></td>
            <td><?=$res['person_art_quarry']?></td>
            <td><?=$res['person_other_service_quarry']?></td>
            <td><?=$res['person_activities_household_quarry']?></td>
            <td><?=$res['person_activities_extraterritorial_quarry']?></td>
</tr>

   <?php  
    }
  }

?>

</tbody>

  <tr>
        <td rowspan = "2" colspan="2" style="text-align:center;"><strong>Zila Total</strong></td>

          <td>Estab.</td>
          <td><?=$est_all_sector?></td>      
          <td><?=$est_mining_quarry?></td>  
          <td><?=$est_manufac_quarry?></td>
          <td><?=$est_electricity_quarry?></td>
          <td><?=$est_water_quarry?></td>
          <td><?=$est_construction_quarry?></td>
          <td><?=$est_wholesale_quarry?></td>
          <td><?=$est_trasnportation_quarry?></td>
          <td><?=$est_accomodation_quarry?></td>
          <td><?=$est_information_quarry?></td>
          <td><?=$est_financial_quarry?></td>
          <td><?=$est_realestate_quarry?></td>
          <td><?=$est_professional_quarry?></td>
          <td><?=$est_administrative_quarry?></td>
          <td><?=$est_public_administrative_quarry?></td>            
          <td><?=$est_education_quarry?></td>
          <td><?=$est_human_quarry?></td>
          <td><?=$est_art_quarry?></td>
          <td><?=$est_other_service_quarry?></td>
          <td><?=$est_activities_household_quarry?></td>
          <td><?=$est_activities_extraterritorial_quarry?></td>    
  </tr>

  <tr>
            <td>Persons</td>
            <td><?=$person_all_sector?></td>    
            <td><?=$person_mining_quarry?></td>  
            <td><?=$person_manufac_quarry?></td>
            <td><?=$person_electricity_quarry?></td>
            <td><?=$person_water_quarry?></td>
            <td><?=$person_construction_quarry?></td>
            <td><?=$person_wholesale_quarry?></td>
            <td><?=$person_trasnportation_quarry?></td>
            <td><?=$person_accomodation_quarry?></td>
            <td><?=$person_information_quarry?></td>
            <td><?=$person_financial_quarry?></td>
            <td><?=$person_realestate_quarry?></td>
            <td><?=$person_professional_quarry?></td>
            <td><?=$person_administrative_quarry?></td>
            <td><?=$person_public_administrative_quarry?></td>            
            <td><?=$person_education_quarry?></td>
            <td><?=$person_human_quarry?></td>
            <td><?=$person_art_quarry?></td>
            <td><?=$person_other_service_quarry?></td>
            <td><?=$person_activities_household_quarry?></td>
            <td><?=$person_activities_extraterritorial_quarry?></td>
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