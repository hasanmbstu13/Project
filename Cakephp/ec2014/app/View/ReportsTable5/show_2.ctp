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
<style>
/* .verticalTableHeader {
    text-align:center;
    white-space:nowrap;
    transform-origin:50% 50%;
    -webkit-transform: rotate(-90deg);
    -moz-transform: rotate(-90deg);
    -ms-transform: rotate(-90deg);
    -o-transform: rotate(-90deg);
    transform: rotate(-90deg);
    
}
.verticalTableHeader:before {
    content:'';
    padding-top:110%;
    display:inline-block;
    vertical-align:middle;
} */
</style>
  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">
   

<thead>

<tr>
  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Geo Code</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Union, Upazila and Zila</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Data item </div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">All Sectors</div></th>
  
  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Agriculture, forestry and fishing</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Mining and quarrying</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Manufacturing</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Electricity, Gas, steam and air conditioning supply</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Water supply, sewerage, waste management and remediation</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Construction</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Wholesale &amp; retail trade, repair of motor vehicles &amp; motorcycles</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Transportation and storage</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Accommodation and food service activities (Hotel &amp; restaurants)</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Information and Communication </div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Financial and insurance activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Real Estate activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Professional, scientific and technical activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Administration and support service activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Public Administration &amp; Defense, compulsory social security</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Education</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Human health and social work activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Arts,entertainment and recreation</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Other service activities</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Activities of household as employers, undifferentiated goods and services producing activities of households for own use</div></th>

  <th><div style="text-align:center; white-space:nowrap; transform-origin:50% 50%; -webkit-transform: rotate(-90deg); -moz-transform: rotate(-90deg); -ms-transform: rotate(-90deg); -o-transform: rotate(-90deg); transform: rotate(-90deg); before { content:''; padding-top:110%; display:inline-block; vertical-align:middle; }">Activities of extraterritorial organizations and bodies</div></th>

</tr>
  
 
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

} 

?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>