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
    <td colspan="5"><b>Table 6.11: Number of Establishments by Status of VAT Registration and Economic Activity in 2013</b></td>
  </tr>

 <tr>
  <td>Code</td>
  <td>Economic Activity</td>
  <td>Total Establishments</td>
  <td>Having  VAT Registration</td>
  <td>Having no VAT Registration</td>
 </tr>

 <tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
</tr>

<!--  <tr>

  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?=(int)$result_A['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_A['F_A_1'] ;?></td>
  <td><?=(int)$result_A['F_A_2'] ;?></td>
  
 </tr> -->

 <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?=(int)$result_B['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_B['F_A_1'] ;?></td>
  <td><?=(int)$result_B['F_A_2'] ;?></td>
 
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?=(int)$result_C['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_C['F_A_1'] ;?></td>
  <td><?=(int)$result_C['F_A_2'] ;?></td>
  
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?=(int)$result_D['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_D['F_A_1'] ;?></td>
  <td><?=(int)$result_D['F_A_2'] ;?></td>
  
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?=(int)$result_E['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_E['F_A_1'] ;?></td>
  <td><?=(int)$result_E['F_A_2'] ;?></td>
  
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?=(int)$result_F['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_F['F_A_1'] ;?></td>
  <td><?=(int)$result_F['F_A_2'] ;?></td>
 
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?=(int)$result_G['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_G['F_A_1'] ;?></td>
  <td><?=(int)$result_G['F_A_2'] ;?></td>
  
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?=(int)$result_H['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_H['F_A_1'] ;?></td>
  <td><?=(int)$result_H['F_A_2'] ;?></td>
  
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurents)</td>
  <td><?=(int)$result_I['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_I['F_A_1'] ;?></td>
  <td><?=(int)$result_I['F_A_2'] ;?></td>
  
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?=(int)$result_J['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_J['F_A_1'] ;?></td>
  <td><?=(int)$result_J['F_A_2'] ;?></td>
  
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?=(int)$result_K['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_K['F_A_1'] ;?></td>
  <td><?=(int)$result_K['F_A_2'] ;?></td>
  
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real State Activities</td>
  <td><?=(int)$result_L['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_L['F_A_1'] ;?></td>
  <td><?=(int)$result_L['F_A_2'] ;?></td>
  
 </tr>


 <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?=(int)$result_M['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_M['F_A_1'] ;?></td>
  <td><?=(int)$result_M['F_A_2'] ;?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?=(int)$result_N['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_N['F_A_1'] ;?></td>
  <td><?=(int)$result_N['F_A_2'] ;?></td>
  
 </tr>


<tr>
  <td>O</td>
  <td align="left">Public Administration and Defence, Compulsory Social Security</td>
  <td><?=(int)$result_O['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_O['F_A_1'] ;?></td>
  <td><?=(int)$result_O['F_A_2'] ;?></td>
 </tr>


  <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?=(int)$result_P['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_P['F_A_1'] ;?></td>
  <td><?=(int)$result_P['F_A_2'] ;?></td>
 </tr>


  <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?=(int)$result_Q['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_Q['F_A_1'] ;?></td>
  <td><?=(int)$result_Q['F_A_2'] ;?></td>
 </tr>



  <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
  <td><?=(int)$result_R['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_R['F_A_1'] ;?></td>
  <td><?=(int)$result_R['F_A_2'] ;?></td>
 </tr>



  <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?=(int)$result_S['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_S['F_A_1'] ;?></td>
  <td><?=(int)$result_S['F_A_2'] ;?></td>
 </tr>



  <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?=(int)$result_T['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_T['F_A_1'] ;?></td>
  <td><?=(int)$result_T['F_A_2'] ;?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?=(int)$result_U['TOTAL_EST'] ;?></td>
  <td><?=(int)$result_U['F_A_1'] ;?></td>
  <td><?=(int)$result_U['F_A_2'] ;?></td>
 </tr>



<?php  

  $total_est = (int)$result_A['TOTAL_EST']+ (int)$result_B['TOTAL_EST']+(int)$result_C['TOTAL_EST']+ (int)$result_D['TOTAL_EST'] + (int)$result_E['TOTAL_EST']+ (int)$result_F['TOTAL_EST']+(int)$result_G['TOTAL_EST']+ (int)$result_H['TOTAL_EST'] + (int)$result_I['TOTAL_EST']+ (int)$result_J['TOTAL_EST']+(int)$result_K['TOTAL_EST']+ (int)$result_L['TOTAL_EST']+(int)$result_M['TOTAL_EST']+ (int)$result_N['TOTAL_EST']+(int)$result_O['TOTAL_EST']+ (int)$result_P['TOTAL_EST']+ (int)$result_Q['TOTAL_EST']+ (int)$result_R['TOTAL_EST']+(int)$result_S['TOTAL_EST']+ (int)$result_T['TOTAL_EST'] + + (int)$result_U['TOTAL_EST'];

  $total_reg =  (int)$result_A['F_A_1']+ (int)$result_B['F_A_1']+(int)$result_C['F_A_1']+ (int)$result_D['F_A_1'] + (int)$result_E['F_A_1']+ (int)$result_F['F_A_1']+(int)$result_G['F_A_1']+ (int)$result_H['F_A_1'] + (int)$result_I['F_A_1']+ (int)$result_J['F_A_1']+(int)$result_K['F_A_1']+ (int)$result_L['F_A_1']+(int)$result_M['F_A_1']+ (int)$result_N['F_A_1']+(int)$result_O['F_A_1']+ (int)$result_P['F_A_1']+ (int)$result_Q['F_A_1']+ (int)$result_R['F_A_1']+(int)$result_S['F_A_1']+ (int)$result_T['F_A_1'] + + (int)$result_U['F_A_1'];


  $total_non_reg = (int)$result_A['F_A_2']+ (int)$result_B['F_A_2']+(int)$result_C['F_A_2']+ (int)$result_D['F_A_2'] + (int)$result_E['F_A_2']+ (int)$result_F['F_A_2']+(int)$result_G['F_A_2']+ (int)$result_H['F_A_2'] + (int)$result_I['F_A_2']+ (int)$result_J['F_A_2']+(int)$result_K['F_A_2']+ (int)$result_L['F_A_2']+(int)$result_M['F_A_2']+ (int)$result_N['F_A_2']+(int)$result_O['F_A_2']+ (int)$result_P['F_A_2']+ (int)$result_Q['F_A_2']+ (int)$result_R['F_A_2']+(int)$result_S['F_A_2']+ (int)$result_T['F_A_2'] + + (int)$result_U['F_A_2'];

?>

  <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?= $total_est ;?></td>
  <td><?= $total_reg ;?></td>
  <td><?= $total_non_reg ;?></td>
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