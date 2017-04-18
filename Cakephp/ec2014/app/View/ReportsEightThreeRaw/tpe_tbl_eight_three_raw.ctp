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

  <div class="notice"></div><br>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport" >
 <tr>
    <td colspan="18"><b>Table 8.3: Total Persons Engaged (TPE) by Sex, Category, and Economic Activity, 2013</b></td>
  </tr>
 <tr>
 <tr>
  <td  rowspan=2>Section</td>
  <td  rowspan=2>Economic Activity</td>
  <td  rowspan=2>Total</td>
  <td  colspan=3>Cottage</td>
  <td  colspan=3>Micro</td>
  <td  colspan=3>Small</td>
  <td  colspan=3>Medium</td>
  <td  colspan=3>Large</td>
</tr>

 <tr >
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
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
  <td>11</td>
  <td>12</td>
  <td>13</td>
  <td>14</td>
  <td>15</td>
  <td>16</td>
  <td>17</td>
  <td>18</td>


   <tr>
  <td>B</td>
<td align="left"><?= $result_B['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_B['TOTAL_TPE'] ?></td>
<td><?= (int)$result_B['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_B['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_B['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_B['MICRO_TPE'] ?></td>
<td><?= (int)$result_B['MICRO_MALE'] ?></td>
<td><?= (int)$result_B['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_B['SMALL_TPE'] ?></td>
<td><?= (int)$result_B['SMALL_MALE'] ?></td>
<td><?= (int)$result_B['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_B['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_B['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_B['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_B['LARGE_TPE'] ?></td>
<td><?= (int)$result_B['LARGE_MALE'] ?></td>
<td><?= (int)$result_B['LARGE_FEMALE'] ?></td>
 
 </tr>

  <tr>
  <td>C</td>
  <td align="left"><?= $result_C['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_C['TOTAL_TPE'] ?></td>
<td><?= (int)$result_C['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_C['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_C['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_C['MICRO_TPE'] ?></td>
<td><?= (int)$result_C['MICRO_MALE'] ?></td>
<td><?= (int)$result_C['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_C['SMALL_TPE'] ?></td>
<td><?= (int)$result_C['SMALL_MALE'] ?></td>
<td><?= (int)$result_C['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_C['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_C['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_C['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_C['LARGE_TPE'] ?></td>
<td><?= (int)$result_C['LARGE_MALE'] ?></td>
<td><?= (int)$result_C['LARGE_FEMALE'] ?></td>
 </tr>

 <tr>
  <td>D</td>
<td align="left"><?= $result_D['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_D['TOTAL_TPE'] ?></td>
<td><?= (int)$result_D['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_D['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_D['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_D['MICRO_TPE'] ?></td>
<td><?= (int)$result_D['MICRO_MALE'] ?></td>
<td><?= (int)$result_D['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_D['SMALL_TPE'] ?></td>
<td><?= (int)$result_D['SMALL_MALE'] ?></td>
<td><?= (int)$result_D['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_D['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_D['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_D['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_D['LARGE_TPE'] ?></td>
<td><?= (int)$result_D['LARGE_MALE'] ?></td>
<td><?= (int)$result_D['LARGE_FEMALE'] ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left"><?= $result_E['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_E['TOTAL_TPE'] ?></td>
<td><?= (int)$result_E['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_E['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_E['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_E['MICRO_TPE'] ?></td>
<td><?= (int)$result_E['MICRO_MALE'] ?></td>
<td><?= (int)$result_E['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_E['SMALL_TPE'] ?></td>
<td><?= (int)$result_E['SMALL_MALE'] ?></td>
<td><?= (int)$result_E['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_E['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_E['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_E['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_E['LARGE_TPE'] ?></td>
<td><?= (int)$result_E['LARGE_MALE'] ?></td>
<td><?= (int)$result_E['LARGE_FEMALE'] ?></td
 </tr>


<tr>
  <td>F</td>
  <td align="left"><?= $result_F['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_F['TOTAL_TPE'] ?></td>
<td><?= (int)$result_F['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_F['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_F['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_F['MICRO_TPE'] ?></td>
<td><?= (int)$result_F['MICRO_MALE'] ?></td>
<td><?= (int)$result_F['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_F['SMALL_TPE'] ?></td>
<td><?= (int)$result_F['SMALL_MALE'] ?></td>
<td><?= (int)$result_F['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_F['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_F['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_F['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_F['LARGE_TPE'] ?></td>
<td><?= (int)$result_F['LARGE_MALE'] ?></td>
<td><?= (int)$result_F['LARGE_FEMALE'] ?></td
 </tr>


<tr>
  <td>G</td>
  <td align="left"><?= $result_G['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_G['TOTAL_TPE'] ?></td>
<td><?= (int)$result_G['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_G['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_G['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_G['MICRO_TPE'] ?></td>
<td><?= (int)$result_G['MICRO_MALE'] ?></td>
<td><?= (int)$result_G['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_G['SMALL_TPE'] ?></td>
<td><?= (int)$result_G['SMALL_MALE'] ?></td>
<td><?= (int)$result_G['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_G['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_G['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_G['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_G['LARGE_TPE'] ?></td>
<td><?= (int)$result_G['LARGE_MALE'] ?></td>
<td><?= (int)$result_G['LARGE_FEMALE'] ?></td
 </tr>

 <tr>
  <td>H</td>
  <td align="left"><?= $result_H['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_H['TOTAL_TPE'] ?></td>
<td><?= (int)$result_H['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_H['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_H['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_H['MICRO_TPE'] ?></td>
<td><?= (int)$result_H['MICRO_MALE'] ?></td>
<td><?= (int)$result_H['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_H['SMALL_TPE'] ?></td>
<td><?= (int)$result_H['SMALL_MALE'] ?></td>
<td><?= (int)$result_H['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_H['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_H['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_H['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_H['LARGE_TPE'] ?></td>
<td><?= (int)$result_H['LARGE_MALE'] ?></td>
<td><?= (int)$result_H['LARGE_FEMALE'] ?></td
 </tr>


  <tr>
  <td>I</td>
  <td align="left"><?= $result_I['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_I['TOTAL_TPE'] ?></td>
<td><?= (int)$result_I['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_I['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_I['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_I['MICRO_TPE'] ?></td>
<td><?= (int)$result_I['MICRO_MALE'] ?></td>
<td><?= (int)$result_I['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_I['SMALL_TPE'] ?></td>
<td><?= (int)$result_I['SMALL_MALE'] ?></td>
<td><?= (int)$result_I['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_I['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_I['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_I['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_I['LARGE_TPE'] ?></td>
<td><?= (int)$result_I['LARGE_MALE'] ?></td>
<td><?= (int)$result_I['LARGE_FEMALE'] ?></td
 </tr>


   <tr>
  <td>J</td>
  <td align="left"><?= $result_J['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_J['TOTAL_TPE'] ?></td>
<td><?= (int)$result_J['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_J['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_J['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_J['MICRO_TPE'] ?></td>
<td><?= (int)$result_J['MICRO_MALE'] ?></td>
<td><?= (int)$result_J['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_J['SMALL_TPE'] ?></td>
<td><?= (int)$result_J['SMALL_MALE'] ?></td>
<td><?= (int)$result_J['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_J['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_J['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_J['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_J['LARGE_TPE'] ?></td>
<td><?= (int)$result_J['LARGE_MALE'] ?></td>
<td><?= (int)$result_J['LARGE_FEMALE'] ?></td
 </tr>


  <tr>
  <td>K</td>
  <td align="left"><?= $result_K['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_K['TOTAL_TPE'] ?></td>
<td><?= (int)$result_K['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_K['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_K['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_K['MICRO_TPE'] ?></td>
<td><?= (int)$result_K['MICRO_MALE'] ?></td>
<td><?= (int)$result_K['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_K['SMALL_TPE'] ?></td>
<td><?= (int)$result_K['SMALL_MALE'] ?></td>
<td><?= (int)$result_K['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_K['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_K['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_K['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_K['LARGE_TPE'] ?></td>
<td><?= (int)$result_K['LARGE_MALE'] ?></td>
<td><?= (int)$result_K['LARGE_FEMALE'] ?></td
 </tr>


    <tr>
  <td>L</td>
  <td align="left"><?= $result_L['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_L['TOTAL_TPE'] ?></td>
<td><?= (int)$result_L['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_L['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_L['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_L['MICRO_TPE'] ?></td>
<td><?= (int)$result_L['MICRO_MALE'] ?></td>
<td><?= (int)$result_L['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_L['SMALL_TPE'] ?></td>
<td><?= (int)$result_L['SMALL_MALE'] ?></td>
<td><?= (int)$result_L['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_L['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_L['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_L['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_L['LARGE_TPE'] ?></td>
<td><?= (int)$result_L['LARGE_MALE'] ?></td>
<td><?= (int)$result_L['LARGE_FEMALE'] ?></td
 </tr>


   <tr>
  <td>M</td>
  <td align="left"><?= $result_M['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_M['TOTAL_TPE'] ?></td>
<td><?= (int)$result_M['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_M['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_M['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_M['MICRO_TPE'] ?></td>
<td><?= (int)$result_M['MICRO_MALE'] ?></td>
<td><?= (int)$result_M['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_M['SMALL_TPE'] ?></td>
<td><?= (int)$result_M['SMALL_MALE'] ?></td>
<td><?= (int)$result_M['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_M['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_M['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_M['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_M['LARGE_TPE'] ?></td>
<td><?= (int)$result_M['LARGE_MALE'] ?></td>
<td><?= (int)$result_M['LARGE_FEMALE'] ?></td
 </tr>


  <tr>
  <td>N</td>
  <td align="left"><?= $result_N['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_N['TOTAL_TPE'] ?></td>
<td><?= (int)$result_N['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_N['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_N['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_N['MICRO_TPE'] ?></td>
<td><?= (int)$result_N['MICRO_MALE'] ?></td>
<td><?= (int)$result_N['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_N['SMALL_TPE'] ?></td>
<td><?= (int)$result_N['SMALL_MALE'] ?></td>
<td><?= (int)$result_N['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_N['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_N['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_N['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_N['LARGE_TPE'] ?></td>
<td><?= (int)$result_N['LARGE_MALE'] ?></td>
<td><?= (int)$result_N['LARGE_FEMALE'] ?></td
 </tr>


   <tr>
  <td>O</td>
  <td align="left"><?= $result_O['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_O['TOTAL_TPE'] ?></td>
<td><?= (int)$result_O['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_O['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_O['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_O['MICRO_TPE'] ?></td>
<td><?= (int)$result_O['MICRO_MALE'] ?></td>
<td><?= (int)$result_O['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_O['SMALL_TPE'] ?></td>
<td><?= (int)$result_O['SMALL_MALE'] ?></td>
<td><?= (int)$result_O['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_O['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_O['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_O['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_O['LARGE_TPE'] ?></td>
<td><?= (int)$result_O['LARGE_MALE'] ?></td>
<td><?= (int)$result_O['LARGE_FEMALE'] ?></td
 </tr>


     <tr>
  <td>P</td>
  <td align="left"><?= $result_P['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_P['TOTAL_TPE'] ?></td>
<td><?= (int)$result_P['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_P['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_P['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_P['MICRO_TPE'] ?></td>
<td><?= (int)$result_P['MICRO_MALE'] ?></td>
<td><?= (int)$result_P['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_P['SMALL_TPE'] ?></td>
<td><?= (int)$result_P['SMALL_MALE'] ?></td>
<td><?= (int)$result_P['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_P['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_P['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_P['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_P['LARGE_TPE'] ?></td>
<td><?= (int)$result_P['LARGE_MALE'] ?></td>
<td><?= (int)$result_P['LARGE_FEMALE'] ?></td
 </tr>


     <tr>
  <td>Q</td>
  <td align="left"><?= $result_Q['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_Q['TOTAL_TPE'] ?></td>
<td><?= (int)$result_Q['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_Q['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_Q['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_Q['MICRO_TPE'] ?></td>
<td><?= (int)$result_Q['MICRO_MALE'] ?></td>
<td><?= (int)$result_Q['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_Q['SMALL_TPE'] ?></td>
<td><?= (int)$result_Q['SMALL_MALE'] ?></td>
<td><?= (int)$result_Q['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_Q['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_Q['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_Q['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_Q['LARGE_TPE'] ?></td>
<td><?= (int)$result_Q['LARGE_MALE'] ?></td>
<td><?= (int)$result_Q['LARGE_FEMALE'] ?></td>
</tr>

     <tr>
  <td>R</td>
  <td align="left"><?= $result_R['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_R['TOTAL_TPE'] ?></td>
<td><?= (int)$result_R['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_R['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_R['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_R['MICRO_TPE'] ?></td>
<td><?= (int)$result_R['MICRO_MALE'] ?></td>
<td><?= (int)$result_R['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_R['SMALL_TPE'] ?></td>
<td><?= (int)$result_R['SMALL_MALE'] ?></td>
<td><?= (int)$result_R['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_R['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_R['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_R['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_R['LARGE_TPE'] ?></td>
<td><?= (int)$result_R['LARGE_MALE'] ?></td>
<td><?= (int)$result_R['LARGE_FEMALE'] ?></td
 </tr>



     <tr>
  <td>S</td>
  <td align="left"><?= $result_S['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_S['TOTAL_TPE'] ?></td>
<td><?= (int)$result_S['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_S['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_S['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_S['MICRO_TPE'] ?></td>
<td><?= (int)$result_S['MICRO_MALE'] ?></td>
<td><?= (int)$result_S['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_S['SMALL_TPE'] ?></td>
<td><?= (int)$result_S['SMALL_MALE'] ?></td>
<td><?= (int)$result_S['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_S['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_S['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_S['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_S['LARGE_TPE'] ?></td>
<td><?= (int)$result_S['LARGE_MALE'] ?></td>
<td><?= (int)$result_S['LARGE_FEMALE'] ?></td
 </tr>



   <tr>
  <td>T</td>
  <td align="left"><?= $result_T['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_T['TOTAL_TPE'] ?></td>
<td><?= (int)$result_T['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_T['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_T['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_T['MICRO_TPE'] ?></td>
<td><?= (int)$result_T['MICRO_MALE'] ?></td>
<td><?= (int)$result_T['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_T['SMALL_TPE'] ?></td>
<td><?= (int)$result_T['SMALL_MALE'] ?></td>
<td><?= (int)$result_T['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_T['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_T['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_T['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_T['LARGE_TPE'] ?></td>
<td><?= (int)$result_T['LARGE_MALE'] ?></td>
<td><?= (int)$result_T['LARGE_FEMALE'] ?></td
 </tr>


  <tr>
  <td>U</td>
  <td align="left"><?= $result_U['BSIC_DESCRIPTION'] ?></td>
<td><?= (int)$result_U['TOTAL_TPE'] ?></td>
<td><?= (int)$result_U['COTTAGE_TPE'] ?></td>
<td><?= (int)$result_U['COTTAGE_MALE'] ?></td>
<td><?= (int)$result_U['COTTAGE_FEMALE'] ?></td>
<td><?= (int)$result_U['MICRO_TPE'] ?></td>
<td><?= (int)$result_U['MICRO_MALE'] ?></td>
<td><?= (int)$result_U['MICRO_FEMALE'] ?></td>
<td><?= (int)$result_U['SMALL_TPE'] ?></td>
<td><?= (int)$result_U['SMALL_MALE'] ?></td>
<td><?= (int)$result_U['SMALL_FEMALE'] ?></td>
<td><?= (int)$result_U['MEDIUM_TPE'] ?></td>
<td><?= (int)$result_U['MEDIUM_MALE'] ?></td>
<td><?= (int)$result_U['MEDIUM_FEMALE'] ?></td>
<td><?= (int)$result_U['LARGE_TPE'] ?></td>
<td><?= (int)$result_U['LARGE_MALE'] ?></td>
<td><?= (int)$result_U['LARGE_FEMALE'] ?></td
 </tr>


<?php 



 $TOTAL = (int)$result_B['TOTAL_TPE'] + (int)$result_C['TOTAL_TPE'] + (int)$result_D['TOTAL_TPE'] + 
          (int)$result_E['TOTAL_TPE'] + (int)$result_F['TOTAL_TPE'] + (int)$result_G['TOTAL_TPE'] + 
          (int)$result_H['TOTAL_TPE'] + (int)$result_I['TOTAL_TPE'] + (int)$result_J['TOTAL_TPE'] + 
          (int)$result_K['TOTAL_TPE'] + (int)$result_L['TOTAL_TPE'] + (int)$result_M['TOTAL_TPE'] +
          (int)$result_N['TOTAL_TPE'] + (int)$result_O['TOTAL_TPE'] + (int)$result_P['TOTAL_TPE'] + 
          (int)$result_Q['TOTAL_TPE'] + (int)$result_R['TOTAL_TPE'] + (int)$result_S['TOTAL_TPE'] + 
          (int)$result_T['TOTAL_TPE'] + (int)$result_U['TOTAL_TPE'] ;

 $COTTAGE_TOTAL = (int)$result_B['COTTAGE_TPE'] + (int)$result_C['COTTAGE_TPE'] + (int)$result_D['COTTAGE_TPE'] + 
          (int)$result_E['COTTAGE_TPE'] + (int)$result_F['COTTAGE_TPE'] + (int)$result_G['COTTAGE_TPE'] + 
          (int)$result_H['COTTAGE_TPE'] + (int)$result_I['COTTAGE_TPE'] + (int)$result_J['COTTAGE_TPE'] + 
          (int)$result_K['COTTAGE_TPE'] + (int)$result_L['COTTAGE_TPE'] + (int)$result_M['COTTAGE_TPE'] +
          (int)$result_N['COTTAGE_TPE'] + (int)$result_O['COTTAGE_TPE'] + (int)$result_P['COTTAGE_TPE'] + 
          (int)$result_Q['COTTAGE_TPE'] + (int)$result_R['COTTAGE_TPE'] + (int)$result_S['COTTAGE_TPE'] + 
          (int)$result_T['COTTAGE_TPE'] + (int)$result_U['COTTAGE_TPE'] ;

 $COTTAGE_MALE = (int)$result_B['COTTAGE_MALE'] + (int)$result_C['COTTAGE_MALE'] + (int)$result_D['COTTAGE_MALE'] + 
          (int)$result_E['COTTAGE_MALE'] + (int)$result_F['COTTAGE_MALE'] + (int)$result_G['COTTAGE_MALE'] + 
          (int)$result_H['COTTAGE_MALE'] + (int)$result_I['COTTAGE_MALE'] + (int)$result_J['COTTAGE_MALE'] + 
          (int)$result_K['COTTAGE_MALE'] + (int)$result_L['COTTAGE_MALE'] + (int)$result_M['COTTAGE_MALE'] +
          (int)$result_N['COTTAGE_MALE'] + (int)$result_O['COTTAGE_MALE'] + (int)$result_P['COTTAGE_MALE'] + 
          (int)$result_Q['COTTAGE_MALE'] + (int)$result_R['COTTAGE_MALE'] + (int)$result_S['COTTAGE_MALE'] + 
          (int)$result_T['COTTAGE_MALE'] + (int)$result_U['COTTAGE_MALE'] ;

 $COTTAGE_FEMALE = (int)$result_B['COTTAGE_FEMALE'] + (int)$result_C['COTTAGE_FEMALE'] + (int)$result_D['COTTAGE_FEMALE'] + 
          (int)$result_E['COTTAGE_FEMALE'] + (int)$result_F['COTTAGE_FEMALE'] + (int)$result_G['COTTAGE_FEMALE'] + 
          (int)$result_H['COTTAGE_FEMALE'] + (int)$result_I['COTTAGE_FEMALE'] + (int)$result_J['COTTAGE_FEMALE'] + 
          (int)$result_K['COTTAGE_FEMALE'] + (int)$result_L['COTTAGE_FEMALE'] + (int)$result_M['COTTAGE_FEMALE'] +
          (int)$result_N['COTTAGE_FEMALE'] + (int)$result_O['COTTAGE_FEMALE'] + (int)$result_P['COTTAGE_FEMALE'] + 
          (int)$result_Q['COTTAGE_FEMALE'] + (int)$result_R['COTTAGE_FEMALE'] + (int)$result_S['COTTAGE_FEMALE'] + 
          (int)$result_T['COTTAGE_FEMALE'] + (int)$result_U['COTTAGE_FEMALE'] ;




 $MICRO_TOTAL = (int)$result_B['MICRO_TPE'] + (int)$result_C['MICRO_TPE'] + (int)$result_D['MICRO_TPE'] + 
          (int)$result_E['MICRO_TPE'] + (int)$result_F['MICRO_TPE'] + (int)$result_G['MICRO_TPE'] + 
          (int)$result_H['MICRO_TPE'] + (int)$result_I['MICRO_TPE'] + (int)$result_J['MICRO_TPE'] + 
          (int)$result_K['MICRO_TPE'] + (int)$result_L['MICRO_TPE'] + (int)$result_M['MICRO_TPE'] +
          (int)$result_N['MICRO_TPE'] + (int)$result_O['MICRO_TPE'] + (int)$result_P['MICRO_TPE'] + 
          (int)$result_Q['MICRO_TPE'] + (int)$result_R['MICRO_TPE'] + (int)$result_S['MICRO_TPE'] + 
          (int)$result_T['MICRO_TPE'] + (int)$result_U['MICRO_TPE'] ;

 $MICRO_MALE = (int)$result_B['MICRO_MALE'] + (int)$result_C['MICRO_MALE'] + (int)$result_D['MICRO_MALE'] + 
          (int)$result_E['MICRO_MALE'] + (int)$result_F['MICRO_MALE'] + (int)$result_G['MICRO_MALE'] + 
          (int)$result_H['MICRO_MALE'] + (int)$result_I['MICRO_MALE'] + (int)$result_J['MICRO_MALE'] + 
          (int)$result_K['MICRO_MALE'] + (int)$result_L['MICRO_MALE'] + (int)$result_M['MICRO_MALE'] +
          (int)$result_N['MICRO_MALE'] + (int)$result_O['MICRO_MALE'] + (int)$result_P['MICRO_MALE'] + 
          (int)$result_Q['MICRO_MALE'] + (int)$result_R['MICRO_MALE'] + (int)$result_S['MICRO_MALE'] + 
          (int)$result_T['MICRO_MALE'] + (int)$result_U['MICRO_MALE'] ;

 $MICRO_FEMALE = (int)$result_B['MICRO_FEMALE'] + (int)$result_C['MICRO_FEMALE'] + (int)$result_D['MICRO_FEMALE'] + 
          (int)$result_E['MICRO_FEMALE'] + (int)$result_F['MICRO_FEMALE'] + (int)$result_G['MICRO_FEMALE'] + 
          (int)$result_H['MICRO_FEMALE'] + (int)$result_I['MICRO_FEMALE'] + (int)$result_J['MICRO_FEMALE'] + 
          (int)$result_K['MICRO_FEMALE'] + (int)$result_L['MICRO_FEMALE'] + (int)$result_M['MICRO_FEMALE'] +
          (int)$result_N['MICRO_FEMALE'] + (int)$result_O['MICRO_FEMALE'] + (int)$result_P['MICRO_FEMALE'] + 
          (int)$result_Q['MICRO_FEMALE'] + (int)$result_R['MICRO_FEMALE'] + (int)$result_S['MICRO_FEMALE'] + 
          (int)$result_T['MICRO_FEMALE'] + (int)$result_U['MICRO_FEMALE'] ;



 $SMALL_TOTAL = (int)$result_B['SMALL_TPE'] + (int)$result_C['SMALL_TPE'] + (int)$result_D['SMALL_TPE'] + 
          (int)$result_E['SMALL_TPE'] + (int)$result_F['SMALL_TPE'] + (int)$result_G['SMALL_TPE'] + 
          (int)$result_H['SMALL_TPE'] + (int)$result_I['SMALL_TPE'] + (int)$result_J['SMALL_TPE'] + 
          (int)$result_K['SMALL_TPE'] + (int)$result_L['SMALL_TPE'] + (int)$result_M['SMALL_TPE'] +
          (int)$result_N['SMALL_TPE'] + (int)$result_O['SMALL_TPE'] + (int)$result_P['SMALL_TPE'] + 
          (int)$result_Q['SMALL_TPE'] + (int)$result_R['SMALL_TPE'] + (int)$result_S['SMALL_TPE'] + 
          (int)$result_T['SMALL_TPE'] + (int)$result_U['SMALL_TPE'] ;

 $SMALL_MALE = (int)$result_B['SMALL_MALE'] + (int)$result_C['SMALL_MALE'] + (int)$result_D['SMALL_MALE'] + 
          (int)$result_E['SMALL_MALE'] + (int)$result_F['SMALL_MALE'] + (int)$result_G['SMALL_MALE'] + 
          (int)$result_H['SMALL_MALE'] + (int)$result_I['SMALL_MALE'] + (int)$result_J['SMALL_MALE'] + 
          (int)$result_K['SMALL_MALE'] + (int)$result_L['SMALL_MALE'] + (int)$result_M['SMALL_MALE'] +
          (int)$result_N['SMALL_MALE'] + (int)$result_O['SMALL_MALE'] + (int)$result_P['SMALL_MALE'] + 
          (int)$result_Q['SMALL_MALE'] + (int)$result_R['SMALL_MALE'] + (int)$result_S['SMALL_MALE'] + 
          (int)$result_T['SMALL_MALE'] + (int)$result_U['SMALL_MALE'] ;

 $SMALL_FEMALE = (int)$result_B['SMALL_FEMALE'] + (int)$result_C['SMALL_FEMALE'] + (int)$result_D['SMALL_FEMALE'] + 
          (int)$result_E['SMALL_FEMALE'] + (int)$result_F['SMALL_FEMALE'] + (int)$result_G['SMALL_FEMALE'] + 
          (int)$result_H['SMALL_FEMALE'] + (int)$result_I['SMALL_FEMALE'] + (int)$result_J['SMALL_FEMALE'] + 
          (int)$result_K['SMALL_FEMALE'] + (int)$result_L['SMALL_FEMALE'] + (int)$result_M['SMALL_FEMALE'] +
          (int)$result_N['SMALL_FEMALE'] + (int)$result_O['SMALL_FEMALE'] + (int)$result_P['SMALL_FEMALE'] + 
          (int)$result_Q['SMALL_FEMALE'] + (int)$result_R['SMALL_FEMALE'] + (int)$result_S['SMALL_FEMALE'] + 
          (int)$result_T['SMALL_FEMALE'] + (int)$result_U['SMALL_FEMALE'] ;


 $MEDIUM_TOTAL = (int)$result_B['MEDIUM_TPE'] + (int)$result_C['MEDIUM_TPE'] + (int)$result_D['MEDIUM_TPE'] + 
          (int)$result_E['MEDIUM_TPE'] + (int)$result_F['MEDIUM_TPE'] + (int)$result_G['MEDIUM_TPE'] + 
          (int)$result_H['MEDIUM_TPE'] + (int)$result_I['MEDIUM_TPE'] + (int)$result_J['MEDIUM_TPE'] + 
          (int)$result_K['MEDIUM_TPE'] + (int)$result_L['MEDIUM_TPE'] + (int)$result_M['MEDIUM_TPE'] +
          (int)$result_N['MEDIUM_TPE'] + (int)$result_O['MEDIUM_TPE'] + (int)$result_P['MEDIUM_TPE'] + 
          (int)$result_Q['MEDIUM_TPE'] + (int)$result_R['MEDIUM_TPE'] + (int)$result_S['MEDIUM_TPE'] + 
          (int)$result_T['MEDIUM_TPE'] + (int)$result_U['MEDIUM_TPE'] ;

 $MEDIUM_MALE = (int)$result_B['MEDIUM_MALE'] + (int)$result_C['MEDIUM_MALE'] + (int)$result_D['MEDIUM_MALE'] + 
          (int)$result_E['MEDIUM_MALE'] + (int)$result_F['MEDIUM_MALE'] + (int)$result_G['MEDIUM_MALE'] + 
          (int)$result_H['MEDIUM_MALE'] + (int)$result_I['MEDIUM_MALE'] + (int)$result_J['MEDIUM_MALE'] + 
          (int)$result_K['MEDIUM_MALE'] + (int)$result_L['MEDIUM_MALE'] + (int)$result_M['MEDIUM_MALE'] +
          (int)$result_N['MEDIUM_MALE'] + (int)$result_O['MEDIUM_MALE'] + (int)$result_P['MEDIUM_MALE'] + 
          (int)$result_Q['MEDIUM_MALE'] + (int)$result_R['MEDIUM_MALE'] + (int)$result_S['MEDIUM_MALE'] + 
          (int)$result_T['MEDIUM_MALE'] + (int)$result_U['MEDIUM_MALE'] ;

 $MEDIUM_FEMALE = (int)$result_B['MEDIUM_FEMALE'] + (int)$result_C['MEDIUM_FEMALE'] + (int)$result_D['MEDIUM_FEMALE'] + 
          (int)$result_E['MEDIUM_FEMALE'] + (int)$result_F['MEDIUM_FEMALE'] + (int)$result_G['MEDIUM_FEMALE'] + 
          (int)$result_H['MEDIUM_FEMALE'] + (int)$result_I['MEDIUM_FEMALE'] + (int)$result_J['MEDIUM_FEMALE'] + 
          (int)$result_K['MEDIUM_FEMALE'] + (int)$result_L['MEDIUM_FEMALE'] + (int)$result_M['MEDIUM_FEMALE'] +
          (int)$result_N['MEDIUM_FEMALE'] + (int)$result_O['MEDIUM_FEMALE'] + (int)$result_P['MEDIUM_FEMALE'] + 
          (int)$result_Q['MEDIUM_FEMALE'] + (int)$result_R['MEDIUM_FEMALE'] + (int)$result_S['MEDIUM_FEMALE'] + 
          (int)$result_T['MEDIUM_FEMALE'] + (int)$result_U['MEDIUM_FEMALE'] ;


 $LARGE_TOTAL = (int)$result_B['LARGE_TPE'] + (int)$result_C['LARGE_TPE'] + (int)$result_D['LARGE_TPE'] + 
          (int)$result_E['LARGE_TPE'] + (int)$result_F['LARGE_TPE'] + (int)$result_G['LARGE_TPE'] + 
          (int)$result_H['LARGE_TPE'] + (int)$result_I['LARGE_TPE'] + (int)$result_J['LARGE_TPE'] + 
          (int)$result_K['LARGE_TPE'] + (int)$result_L['LARGE_TPE'] + (int)$result_M['LARGE_TPE'] +
          (int)$result_N['LARGE_TPE'] + (int)$result_O['LARGE_TPE'] + (int)$result_P['LARGE_TPE'] + 
          (int)$result_Q['LARGE_TPE'] + (int)$result_R['LARGE_TPE'] + (int)$result_S['LARGE_TPE'] + 
          (int)$result_T['LARGE_TPE'] + (int)$result_U['LARGE_TPE'] ;

 $LARGE_MALE = (int)$result_B['LARGE_MALE'] + (int)$result_C['LARGE_MALE'] + (int)$result_D['LARGE_MALE'] + 
          (int)$result_E['LARGE_MALE'] + (int)$result_F['LARGE_MALE'] + (int)$result_G['LARGE_MALE'] + 
          (int)$result_H['LARGE_MALE'] + (int)$result_I['LARGE_MALE'] + (int)$result_J['LARGE_MALE'] + 
          (int)$result_K['LARGE_MALE'] + (int)$result_L['LARGE_MALE'] + (int)$result_M['LARGE_MALE'] +
          (int)$result_N['LARGE_MALE'] + (int)$result_O['LARGE_MALE'] + (int)$result_P['LARGE_MALE'] + 
          (int)$result_Q['LARGE_MALE'] + (int)$result_R['LARGE_MALE'] + (int)$result_S['LARGE_MALE'] + 
          (int)$result_T['LARGE_MALE'] + (int)$result_U['LARGE_MALE'] ;

 $LARGE_FEMALE = (int)$result_B['LARGE_FEMALE'] + (int)$result_C['LARGE_FEMALE'] + (int)$result_D['LARGE_FEMALE'] + 
          (int)$result_E['LARGE_FEMALE'] + (int)$result_F['LARGE_FEMALE'] + (int)$result_G['LARGE_FEMALE'] + 
          (int)$result_H['LARGE_FEMALE'] + (int)$result_I['LARGE_FEMALE'] + (int)$result_J['LARGE_FEMALE'] + 
          (int)$result_K['LARGE_FEMALE'] + (int)$result_L['LARGE_FEMALE'] + (int)$result_M['LARGE_FEMALE'] +
          (int)$result_N['LARGE_FEMALE'] + (int)$result_O['LARGE_FEMALE'] + (int)$result_P['LARGE_FEMALE'] + 
          (int)$result_Q['LARGE_FEMALE'] + (int)$result_R['LARGE_FEMALE'] + (int)$result_S['LARGE_FEMALE'] + 
          (int)$result_T['LARGE_FEMALE'] + (int)$result_U['LARGE_FEMALE'] ;


 ?>


 <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?= $TOTAL ?></td>
  <td><?= $COTTAGE_TOTAL ?></td>
  <td><?= $COTTAGE_MALE ?></td>
  <td><?= $COTTAGE_FEMALE ?></td>
  <td><?= $MICRO_TOTAL ?></td>
  <td><?= $MICRO_MALE ?></td>
  <td><?= $MICRO_FEMALE ?></td>
  <td><?= $SMALL_TOTAL ?></td>
  <td><?= $SMALL_MALE ?></td>
  <td><?= $SMALL_FEMALE ?></td>
  <td><?= $MEDIUM_TOTAL ?></td>
  <td><?= $MEDIUM_MALE ?></td>
  <td><?= $MEDIUM_FEMALE ?></td>
  <td><?= $LARGE_TOTAL ?></td>
  <td><?= $LARGE_MALE ?></td>
  <td><?= $LARGE_FEMALE ?></td>
 </tr> 



 
</table>

<br><div class="notice"> </div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php } ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>



