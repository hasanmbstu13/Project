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
// if($this -> request -> is('post'))
// {
?>

<div id="table_for_print">

  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
   

<thead>


  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    line-height:14px;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Geo Code</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Union, Upazila and Zila</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Data item </span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">All Sectors</span>
  </th>
  
  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Agriculture, forestry and fishing</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Mining and quarrying</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Manufacturing</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Electricity, Gas, steam and air conditioning supply</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Water supply, sewerage, waste management and remediation</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Construction</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Wholesale &amp; retail trade, repair of motor vehicles &amp; motorcycles</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Transportation and storage</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Accommodation and food service activities (Hotel &amp; restaurants)</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Information and Communication </span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Financial and insurance activities</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Real Estate activities</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Professional, scientific and technical activities</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Administration and support service activities</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Public Administration &amp; Defense, compulsory social security</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Education</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Human health and social work activities</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Arts,entertainment and recreation</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Other service activities</span>
  </th>

  <th style ="height: 220px;line-height: 14px; padding-bottom: 45px;text-align: justify;">
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Activities of household as employers, undifferentiated goods and services producing activities of households for own use</span>
  </th>

  <th >
    <span style="
    display: inline-block;
    height: auto;
    width:auto;
    text-align: justify;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3);
    ">Activities of extraterritorial organizations and bodies</span>
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
  <td><strong>Zila:<?=$zila?></strong></td>
  <td colspan = 23>&nbsp;</td>
</tr>


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
      
      <tr>
      <td  rowspan = "2"><?= $res['upzila_code']; ?> &nbsp; <?= $res['union_code']; ?></td>
      <td rowspan = "2" ><?= $res['union_name']; ?></td>

      <td>Estab.</td>
            <td><?=$res['est_all_sector']?></td>
            <td><?=$res['est_agri_quarry']?></td>       
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
            <td><?=$res['person_agri_quarry']?></td>       
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



</table>

<br><div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php 

// } 

?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>