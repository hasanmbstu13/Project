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

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport" >
 <tr>
    <td colspan="18"><b>Table 8.1: Number of Establishments by Category, Location and Economic Activity, 2013</b></td>
  </tr>
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
  <td >Urban</td>
  <td >Rural</td>
  <td >Total</td>
  <td >Urban</td>
  <td >Rural</td>
  <td >Total</td>
  <td >Urban</td>
  <td >Rural</td>
  <td >Total</td>
  <td >Urban</td>
  <td >Rural</td>
  <td >Total</td>
  <td >Urban</td>
  <td >Rural</td>
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


<!--   <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?= $A_TOTAL ?></td>
  <td><?= $A_COTTAGE_TOTAL ?></td>
  <td><?= $A_COTTAGE_URBAN ?></td>
  <td><?= $A_COTTAGE_RURAL ?></td>
  <td><?= $A_MICRO_TOTAL ?></td>
  <td><?= $A_MICRO_URBAN ?></td>
  <td><?= $A_MICRO_RURAL ?></td>
  <td><?= $A_SMALL_TOTAL ?></td>
  <td><?= $A_SMALL_URBAN ?></td>
  <td><?= $A_SMALL_RURAL ?></td>
  <td><?= $A_MEDIUM_TOTAL ?></td>
  <td><?= $A_MEDIUM_URBAN ?></td>
  <td><?= $A_MEDIUM_RURAL ?></td>
  <td><?= $A_LARGE_TOTAL ?></td>
  <td><?= $A_LARGE_URBAN ?></td>
  <td><?= $A_LARGE_RURAL ?></td>

 </tr>
 -->
   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?= $B_TOTAL ?></td>
  <td><?= $B_COTTAGE_TOTAL ?></td>
  <td><?= $B_COTTAGE_URBAN ?></td>
  <td><?= $B_COTTAGE_RURAL ?></td>
  <td><?= $B_MICRO_TOTAL ?></td>
  <td><?= $B_MICRO_URBAN ?></td>
  <td><?= $B_MICRO_RURAL ?></td>
  <td><?= $B_SMALL_TOTAL ?></td>
  <td><?= $B_SMALL_URBAN ?></td>
  <td><?= $B_SMALL_RURAL ?></td>
  <td><?= $B_MEDIUM_TOTAL ?></td>
  <td><?= $B_MEDIUM_URBAN ?></td>
  <td><?= $B_MEDIUM_RURAL ?></td>
  <td><?= $B_LARGE_TOTAL ?></td>
  <td><?= $B_LARGE_URBAN ?></td>
  <td><?= $B_LARGE_RURAL ?></td>
 
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?= $C_TOTAL ?></td>
  <td><?= $C_COTTAGE_TOTAL ?></td>
  <td><?= $C_COTTAGE_URBAN ?></td>
  <td><?= $C_COTTAGE_RURAL ?></td>
  <td><?= $C_MICRO_TOTAL ?></td>
  <td><?= $C_MICRO_URBAN ?></td>
  <td><?= $C_MICRO_RURAL ?></td>
  <td><?= $C_SMALL_TOTAL ?></td>
  <td><?= $C_SMALL_URBAN ?></td>
  <td><?= $C_SMALL_RURAL ?></td>
  <td><?= $C_MEDIUM_TOTAL ?></td>
  <td><?= $C_MEDIUM_URBAN ?></td>
  <td><?= $C_MEDIUM_RURAL ?></td>
  <td><?= $C_LARGE_TOTAL ?></td>
  <td><?= $C_LARGE_URBAN ?></td>
  <td><?= $C_LARGE_RURAL ?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?= $D_TOTAL ?></td>
  <td><?= $D_COTTAGE_TOTAL ?></td>
  <td><?= $D_COTTAGE_URBAN ?></td>
  <td><?= $D_COTTAGE_RURAL ?></td>
  <td><?= $D_MICRO_TOTAL ?></td>
  <td><?= $D_MICRO_URBAN ?></td>
  <td><?= $D_MICRO_RURAL ?></td>
  <td><?= $D_SMALL_TOTAL ?></td>
  <td><?= $D_SMALL_URBAN ?></td>
  <td><?= $D_SMALL_RURAL ?></td>
  <td><?= $D_MEDIUM_TOTAL ?></td>
  <td><?= $D_MEDIUM_URBAN ?></td>
  <td><?= $D_MEDIUM_RURAL ?></td>
  <td><?= $D_LARGE_TOTAL ?></td>
  <td><?= $D_LARGE_URBAN ?></td>
  <td><?= $D_LARGE_RURAL ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation  Activities</td>
  <td><?= $E_TOTAL ?></td>
  <td><?= $E_COTTAGE_TOTAL ?></td>
  <td><?= $E_COTTAGE_URBAN ?></td>
  <td><?= $E_COTTAGE_RURAL ?></td>
  <td><?= $E_MICRO_TOTAL ?></td>
  <td><?= $E_MICRO_URBAN ?></td>
  <td><?= $E_MICRO_RURAL ?></td>
  <td><?= $E_SMALL_TOTAL ?></td>
  <td><?= $E_SMALL_URBAN ?></td>
  <td><?= $E_SMALL_RURAL ?></td>
  <td><?= $E_MEDIUM_TOTAL ?></td>
  <td><?= $E_MEDIUM_URBAN ?></td>
  <td><?= $E_MEDIUM_RURAL ?></td>
  <td><?= $E_LARGE_TOTAL ?></td>
  <td><?= $E_LARGE_URBAN ?></td>
  <td><?= $E_LARGE_RURAL ?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?= $F_TOTAL ?></td>
  <td><?= $F_COTTAGE_TOTAL ?></td>
  <td><?= $F_COTTAGE_URBAN ?></td>
  <td><?= $F_COTTAGE_RURAL ?></td>
  <td><?= $F_MICRO_TOTAL ?></td>
  <td><?= $F_MICRO_URBAN ?></td>
  <td><?= $F_MICRO_RURAL ?></td>
  <td><?= $F_SMALL_TOTAL ?></td>
  <td><?= $F_SMALL_URBAN ?></td>
  <td><?= $F_SMALL_RURAL ?></td>
  <td><?= $F_MEDIUM_TOTAL ?></td>
  <td><?= $F_MEDIUM_URBAN ?></td>
  <td><?= $F_MEDIUM_RURAL ?></td>
  <td><?= $F_LARGE_TOTAL ?></td>
  <td><?= $F_LARGE_URBAN ?></td>
  <td><?= $F_LARGE_RURAL ?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?= $G_TOTAL ?></td>
  <td><?= $G_COTTAGE_TOTAL ?></td>
  <td><?= $G_COTTAGE_URBAN ?></td>
  <td><?= $G_COTTAGE_RURAL ?></td>
  <td><?= $G_MICRO_TOTAL ?></td>
  <td><?= $G_MICRO_URBAN ?></td>
  <td><?= $G_MICRO_RURAL ?></td>
  <td><?= $G_SMALL_TOTAL ?></td>
  <td><?= $G_SMALL_URBAN ?></td>
  <td><?= $G_SMALL_RURAL ?></td>
  <td><?= $G_MEDIUM_TOTAL ?></td>
  <td><?= $G_MEDIUM_URBAN ?></td>
  <td><?= $G_MEDIUM_RURAL ?></td>
  <td><?= $G_LARGE_TOTAL ?></td>
  <td><?= $G_LARGE_URBAN ?></td>
  <td><?= $G_LARGE_RURAL ?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?= $H_TOTAL ?></td>
  <td><?= $H_COTTAGE_TOTAL ?></td>
  <td><?= $H_COTTAGE_URBAN ?></td>
  <td><?= $H_COTTAGE_RURAL ?></td>
  <td><?= $H_MICRO_TOTAL ?></td>
  <td><?= $H_MICRO_URBAN ?></td>
  <td><?= $H_MICRO_RURAL ?></td>
  <td><?= $H_SMALL_TOTAL ?></td>
  <td><?= $H_SMALL_URBAN ?></td>
  <td><?= $H_SMALL_RURAL ?></td>
  <td><?= $H_MEDIUM_TOTAL ?></td>
  <td><?= $H_MEDIUM_URBAN ?></td>
  <td><?= $H_MEDIUM_RURAL ?></td>
  <td><?= $H_LARGE_TOTAL ?></td>
  <td><?= $H_LARGE_URBAN ?></td>
  <td><?= $H_LARGE_RURAL ?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
  <td><?= $I_TOTAL ?></td>
  <td><?= $I_COTTAGE_TOTAL ?></td>
  <td><?= $I_COTTAGE_URBAN ?></td>
  <td><?= $I_COTTAGE_RURAL ?></td>
  <td><?= $I_MICRO_TOTAL ?></td>
  <td><?= $I_MICRO_URBAN ?></td>
  <td><?= $I_MICRO_RURAL ?></td>
  <td><?= $I_SMALL_TOTAL ?></td>
  <td><?= $I_SMALL_URBAN ?></td>
  <td><?= $I_SMALL_RURAL ?></td>
  <td><?= $I_MEDIUM_TOTAL ?></td>
  <td><?= $I_MEDIUM_URBAN ?></td>
  <td><?= $I_MEDIUM_RURAL ?></td>
  <td><?= $I_LARGE_TOTAL ?></td>
  <td><?= $I_LARGE_URBAN ?></td>
  <td><?= $I_LARGE_RURAL ?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?= $J_TOTAL ?></td>
  <td><?= $J_COTTAGE_TOTAL ?></td>
  <td><?= $J_COTTAGE_URBAN ?></td>
  <td><?= $J_COTTAGE_RURAL ?></td>
  <td><?= $J_MICRO_TOTAL ?></td>
  <td><?= $J_MICRO_URBAN ?></td>
  <td><?= $J_MICRO_RURAL ?></td>
  <td><?= $J_SMALL_TOTAL ?></td>
  <td><?= $J_SMALL_URBAN ?></td>
  <td><?= $J_SMALL_RURAL ?></td>
  <td><?= $J_MEDIUM_TOTAL ?></td>
  <td><?= $J_MEDIUM_URBAN ?></td>
  <td><?= $J_MEDIUM_RURAL ?></td>
  <td><?= $J_LARGE_TOTAL ?></td>
  <td><?= $J_LARGE_URBAN ?></td>
  <td><?= $J_LARGE_RURAL ?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?= $K_TOTAL ?></td>
  <td><?= $K_COTTAGE_TOTAL ?></td>
  <td><?= $K_COTTAGE_URBAN ?></td>
  <td><?= $K_COTTAGE_RURAL ?></td>
  <td><?= $K_MICRO_TOTAL ?></td>
  <td><?= $K_MICRO_URBAN ?></td>
  <td><?= $K_MICRO_RURAL ?></td>
  <td><?= $K_SMALL_TOTAL ?></td>
  <td><?= $K_SMALL_URBAN ?></td>
  <td><?= $K_SMALL_RURAL ?></td>
  <td><?= $K_MEDIUM_TOTAL ?></td>
  <td><?= $K_MEDIUM_URBAN ?></td>
  <td><?= $K_MEDIUM_RURAL ?></td>
  <td><?= $K_LARGE_TOTAL ?></td>
  <td><?= $K_LARGE_URBAN ?></td>
  <td><?= $K_LARGE_RURAL ?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate Activities</td>
  <td><?= $L_TOTAL ?></td>
  <td><?= $L_COTTAGE_TOTAL ?></td>
  <td><?= $L_COTTAGE_URBAN ?></td>
  <td><?= $L_COTTAGE_RURAL ?></td>
  <td><?= $L_MICRO_TOTAL ?></td>
  <td><?= $L_MICRO_URBAN ?></td>
  <td><?= $L_MICRO_RURAL ?></td>
  <td><?= $L_SMALL_TOTAL ?></td>
  <td><?= $L_SMALL_URBAN ?></td>
  <td><?= $L_SMALL_RURAL ?></td>
  <td><?= $L_MEDIUM_TOTAL ?></td>
  <td><?= $L_MEDIUM_URBAN ?></td>
  <td><?= $L_MEDIUM_RURAL ?></td>
  <td><?= $L_LARGE_TOTAL ?></td>
  <td><?= $L_LARGE_URBAN ?></td>
  <td><?= $L_LARGE_RURAL ?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?= $M_TOTAL ?></td>
  <td><?= $M_COTTAGE_TOTAL ?></td>
  <td><?= $M_COTTAGE_URBAN ?></td>
  <td><?= $M_COTTAGE_RURAL ?></td>
  <td><?= $M_MICRO_TOTAL ?></td>
  <td><?= $M_MICRO_URBAN ?></td>
  <td><?= $M_MICRO_RURAL ?></td>
  <td><?= $M_SMALL_TOTAL ?></td>
  <td><?= $M_SMALL_URBAN ?></td>
  <td><?= $M_SMALL_RURAL ?></td>
  <td><?= $M_MEDIUM_TOTAL ?></td>
  <td><?= $M_MEDIUM_URBAN ?></td>
  <td><?= $M_MEDIUM_RURAL ?></td>
  <td><?= $M_LARGE_TOTAL ?></td>
  <td><?= $M_LARGE_URBAN ?></td>
  <td><?= $M_LARGE_RURAL ?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?= $N_TOTAL ?></td>
  <td><?= $N_COTTAGE_TOTAL ?></td>
  <td><?= $N_COTTAGE_URBAN ?></td>
  <td><?= $N_COTTAGE_RURAL ?></td>
  <td><?= $N_MICRO_TOTAL ?></td>
  <td><?= $N_MICRO_URBAN ?></td>
  <td><?= $N_MICRO_RURAL ?></td>
  <td><?= $N_SMALL_TOTAL ?></td>
  <td><?= $N_SMALL_URBAN ?></td>
  <td><?= $N_SMALL_RURAL ?></td>
  <td><?= $N_MEDIUM_TOTAL ?></td>
  <td><?= $N_MEDIUM_URBAN ?></td>
  <td><?= $N_MEDIUM_RURAL ?></td>
  <td><?= $N_LARGE_TOTAL ?></td>
  <td><?= $N_LARGE_URBAN ?></td>
  <td><?= $N_LARGE_RURAL ?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defense, Compulsory Social Security</td>
  <td><?= $O_TOTAL ?></td>
  <td><?= $O_COTTAGE_TOTAL ?></td>
  <td><?= $O_COTTAGE_URBAN ?></td>
  <td><?= $O_COTTAGE_RURAL ?></td>
  <td><?= $O_MICRO_TOTAL ?></td>
  <td><?= $O_MICRO_URBAN ?></td>
  <td><?= $O_MICRO_RURAL ?></td>
  <td><?= $O_SMALL_TOTAL ?></td>
  <td><?= $O_SMALL_URBAN ?></td>
  <td><?= $O_SMALL_RURAL ?></td>
  <td><?= $O_MEDIUM_TOTAL ?></td>
  <td><?= $O_MEDIUM_URBAN ?></td>
  <td><?= $O_MEDIUM_RURAL ?></td>
  <td><?= $O_LARGE_TOTAL ?></td>
  <td><?= $O_LARGE_URBAN ?></td>
  <td><?= $O_LARGE_RURAL ?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?= $P_TOTAL ?></td>
  <td><?= $P_COTTAGE_TOTAL ?></td>
  <td><?= $P_COTTAGE_URBAN ?></td>
  <td><?= $P_COTTAGE_RURAL ?></td>
  <td><?= $P_MICRO_TOTAL ?></td>
  <td><?= $P_MICRO_URBAN ?></td>
  <td><?= $P_MICRO_RURAL ?></td>
  <td><?= $P_SMALL_TOTAL ?></td>
  <td><?= $P_SMALL_URBAN ?></td>
  <td><?= $P_SMALL_RURAL ?></td>
  <td><?= $P_MEDIUM_TOTAL ?></td>
  <td><?= $P_MEDIUM_URBAN ?></td>
  <td><?= $P_MEDIUM_RURAL ?></td>
  <td><?= $P_LARGE_TOTAL ?></td>
  <td><?= $P_LARGE_URBAN ?></td>
  <td><?= $P_LARGE_RURAL ?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?= $Q_TOTAL ?></td>
  <td><?= $Q_COTTAGE_TOTAL ?></td>
  <td><?= $Q_COTTAGE_URBAN ?></td>
  <td><?= $Q_COTTAGE_RURAL ?></td>
  <td><?= $Q_MICRO_TOTAL ?></td>
  <td><?= $Q_MICRO_URBAN ?></td>
  <td><?= $Q_MICRO_RURAL ?></td>
  <td><?= $Q_SMALL_TOTAL ?></td>
  <td><?= $Q_SMALL_URBAN ?></td>
  <td><?= $Q_SMALL_RURAL ?></td>
  <td><?= $Q_MEDIUM_TOTAL ?></td>
  <td><?= $Q_MEDIUM_URBAN ?></td>
  <td><?= $Q_MEDIUM_RURAL ?></td>
  <td><?= $Q_LARGE_TOTAL ?></td>
  <td><?= $Q_LARGE_URBAN ?></td>
  <td><?= $Q_LARGE_RURAL ?></td>


     <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
  <td><?= $R_TOTAL ?></td>
  <td><?= $R_COTTAGE_TOTAL ?></td>
  <td><?= $R_COTTAGE_URBAN ?></td>
  <td><?= $R_COTTAGE_RURAL ?></td>
  <td><?= $R_MICRO_TOTAL ?></td>
  <td><?= $R_MICRO_URBAN ?></td>
  <td><?= $R_MICRO_RURAL ?></td>
  <td><?= $R_SMALL_TOTAL ?></td>
  <td><?= $R_SMALL_URBAN ?></td>
  <td><?= $R_SMALL_RURAL ?></td>
  <td><?= $R_MEDIUM_TOTAL ?></td>
  <td><?= $R_MEDIUM_URBAN ?></td>
  <td><?= $R_MEDIUM_RURAL ?></td>
  <td><?= $R_LARGE_TOTAL ?></td>
  <td><?= $R_LARGE_URBAN ?></td>
  <td><?= $R_LARGE_RURAL ?></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?= $S_TOTAL ?></td>
  <td><?= $S_COTTAGE_TOTAL ?></td>
  <td><?= $S_COTTAGE_URBAN ?></td>
  <td><?= $S_COTTAGE_RURAL ?></td>
  <td><?= $S_MICRO_TOTAL ?></td>
  <td><?= $S_MICRO_URBAN ?></td>
  <td><?= $S_MICRO_RURAL ?></td>
  <td><?= $S_SMALL_TOTAL ?></td>
  <td><?= $S_SMALL_URBAN ?></td>
  <td><?= $S_SMALL_RURAL ?></td>
  <td><?= $S_MEDIUM_TOTAL ?></td>
  <td><?= $S_MEDIUM_URBAN ?></td>
  <td><?= $S_MEDIUM_RURAL ?></td>
  <td><?= $S_LARGE_TOTAL ?></td>
  <td><?= $S_LARGE_URBAN ?></td>
  <td><?= $S_LARGE_RURAL ?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?= $T_TOTAL ?></td>
  <td><?= $T_COTTAGE_TOTAL ?></td>
  <td><?= $T_COTTAGE_URBAN ?></td>
  <td><?= $T_COTTAGE_RURAL ?></td>
  <td><?= $T_MICRO_TOTAL ?></td>
  <td><?= $T_MICRO_URBAN ?></td>
  <td><?= $T_MICRO_RURAL ?></td>
  <td><?= $T_SMALL_TOTAL ?></td>
  <td><?= $T_SMALL_URBAN ?></td>
  <td><?= $T_SMALL_RURAL ?></td>
  <td><?= $T_MEDIUM_TOTAL ?></td>
  <td><?= $T_MEDIUM_URBAN ?></td>
  <td><?= $T_MEDIUM_RURAL ?></td>
  <td><?= $T_LARGE_TOTAL ?></td>
  <td><?= $T_LARGE_URBAN ?></td>
  <td><?= $T_LARGE_RURAL ?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?= $U_TOTAL ?></td>
  <td><?= $U_COTTAGE_TOTAL ?></td>
  <td><?= $U_COTTAGE_URBAN ?></td>
  <td><?= $U_COTTAGE_RURAL ?></td>
  <td><?= $U_MICRO_TOTAL ?></td>
  <td><?= $U_MICRO_URBAN ?></td>
  <td><?= $U_MICRO_RURAL ?></td>
  <td><?= $U_SMALL_TOTAL ?></td>
  <td><?= $U_SMALL_URBAN ?></td>
  <td><?= $U_SMALL_RURAL ?></td>
  <td><?= $U_MEDIUM_TOTAL ?></td>
  <td><?= $U_MEDIUM_URBAN ?></td>
  <td><?= $U_MEDIUM_RURAL ?></td>
  <td><?= $U_LARGE_TOTAL ?></td>
  <td><?= $U_LARGE_URBAN ?></td>
  <td><?= $U_LARGE_RURAL ?></td>
 </tr>


 <?php 


      $TOTAL = $A_TOTAL + $B_TOTAL + $C_TOTAL + $D_TOTAL + $E_TOTAL + $F_TOTAL+ $G_TOTAL + $H_TOTAL + $I_TOTAL + $J_TOTAL + $K_TOTAL +
      $L_TOTAL +$M_TOTAL + $N_TOTAL + $O_TOTAL + $P_TOTAL + $Q_TOTAL + $R_TOTAL + $S_TOTAL + $T_TOTAL + $U_TOTAL;

      $COTTAGE_TOTAL = $A_COTTAGE_TOTAL + $B_COTTAGE_TOTAL + $C_COTTAGE_TOTAL + $D_COTTAGE_TOTAL + $E_COTTAGE_TOTAL + $F_COTTAGE_TOTAL+ 
      $G_COTTAGE_TOTAL + $H_COTTAGE_TOTAL + $I_COTTAGE_TOTAL + $J_COTTAGE_TOTAL + $K_COTTAGE_TOTAL + $L_COTTAGE_TOTAL +$M_COTTAGE_TOTAL + 
      $N_COTTAGE_TOTAL + $O_COTTAGE_TOTAL + $P_COTTAGE_TOTAL + $Q_COTTAGE_TOTAL + $R_COTTAGE_TOTAL + $S_COTTAGE_TOTAL + $T_COTTAGE_TOTAL + 
      $U_COTTAGE_TOTAL;
  
      $COTTAGE_URBAN = $A_COTTAGE_URBAN + $B_COTTAGE_URBAN + $C_COTTAGE_URBAN + $D_COTTAGE_URBAN + $E_COTTAGE_URBAN + $F_COTTAGE_URBAN+ 
      $G_COTTAGE_URBAN + $H_COTTAGE_URBAN + $I_COTTAGE_URBAN + $J_COTTAGE_URBAN + $K_COTTAGE_URBAN + $L_COTTAGE_URBAN +$M_COTTAGE_URBAN + 
      $N_COTTAGE_URBAN + $O_COTTAGE_URBAN + $P_COTTAGE_URBAN + $Q_COTTAGE_URBAN + $R_COTTAGE_URBAN + $S_COTTAGE_URBAN + $T_COTTAGE_URBAN + 
      $U_COTTAGE_URBAN;

      $COTTAGE_RURAL = $A_COTTAGE_RURAL + $B_COTTAGE_RURAL + $C_COTTAGE_RURAL + $D_COTTAGE_RURAL + $E_COTTAGE_RURAL + $F_COTTAGE_RURAL+ 
      $G_COTTAGE_RURAL + $H_COTTAGE_RURAL + $I_COTTAGE_RURAL + $J_COTTAGE_RURAL + $K_COTTAGE_RURAL + $L_COTTAGE_RURAL +$M_COTTAGE_RURAL + 
      $N_COTTAGE_RURAL + $O_COTTAGE_RURAL + $P_COTTAGE_RURAL + $Q_COTTAGE_RURAL + $R_COTTAGE_RURAL + $S_COTTAGE_RURAL + $T_COTTAGE_RURAL + 
      $U_COTTAGE_RURAL;

      $MICRO_TOTAL = $A_MICRO_TOTAL + $B_MICRO_TOTAL + $C_MICRO_TOTAL + $D_MICRO_TOTAL + $E_MICRO_TOTAL + $F_MICRO_TOTAL+ $G_MICRO_TOTAL + 
      $H_MICRO_TOTAL + $I_MICRO_TOTAL + $J_MICRO_TOTAL + $K_MICRO_TOTAL + $L_MICRO_TOTAL +$M_MICRO_TOTAL + $N_MICRO_TOTAL + $O_MICRO_TOTAL + 
      $P_MICRO_TOTAL + $Q_MICRO_TOTAL + $R_MICRO_TOTAL + $S_MICRO_TOTAL + $T_MICRO_TOTAL + $U_MICRO_TOTAL;


      $MICRO_URBAN = $A_MICRO_URBAN + $B_MICRO_URBAN + $C_MICRO_URBAN + $D_MICRO_URBAN + $E_MICRO_URBAN + $F_MICRO_URBAN+ $G_MICRO_URBAN + 
      $H_MICRO_URBAN + $I_MICRO_URBAN + $J_MICRO_URBAN + $K_MICRO_URBAN + $L_MICRO_URBAN +$M_MICRO_URBAN + $N_MICRO_URBAN + $O_MICRO_URBAN + 
      $P_MICRO_URBAN + $Q_MICRO_URBAN + $R_MICRO_URBAN + $S_MICRO_URBAN + 
      $T_MICRO_URBAN + $U_MICRO_URBAN;

      $MICRO_RURAL = $A_MICRO_RURAL + $B_MICRO_RURAL + $C_MICRO_RURAL + $D_MICRO_RURAL + $E_MICRO_RURAL + $F_MICRO_RURAL+ $G_MICRO_RURAL + 
      $H_MICRO_RURAL + $I_MICRO_RURAL + $J_MICRO_RURAL + $K_MICRO_RURAL + $L_MICRO_RURAL +$M_MICRO_RURAL + $N_MICRO_RURAL + $O_MICRO_RURAL + 
      $P_MICRO_RURAL + $Q_MICRO_RURAL + $R_MICRO_RURAL + $S_MICRO_RURAL + $T_MICRO_RURAL + $U_MICRO_RURAL;


      $SMALL_TOTAL = $A_SMALL_TOTAL + $B_SMALL_TOTAL + $C_SMALL_TOTAL + $D_SMALL_TOTAL + $E_SMALL_TOTAL + $F_SMALL_TOTAL+ $G_SMALL_TOTAL + 
      $H_SMALL_TOTAL + $I_SMALL_TOTAL + $J_SMALL_TOTAL + $K_SMALL_TOTAL + $L_SMALL_TOTAL +$M_SMALL_TOTAL + $N_SMALL_TOTAL + $O_SMALL_TOTAL + 
      $P_SMALL_TOTAL + $Q_SMALL_TOTAL + $R_SMALL_TOTAL + $S_SMALL_TOTAL + $T_SMALL_TOTAL + $U_SMALL_TOTAL;


      $SMALL_URBAN = $A_SMALL_URBAN + $B_SMALL_URBAN + $C_SMALL_URBAN + $D_SMALL_URBAN + $E_SMALL_URBAN + $F_SMALL_URBAN+ $G_SMALL_URBAN + 
      $H_SMALL_URBAN + $I_SMALL_URBAN + $J_SMALL_URBAN + $K_SMALL_URBAN + $L_SMALL_URBAN +$M_SMALL_URBAN + $N_SMALL_URBAN + $O_SMALL_URBAN + 
      $P_SMALL_URBAN + $Q_SMALL_URBAN + $R_SMALL_URBAN + $S_SMALL_URBAN + $T_SMALL_URBAN + $U_SMALL_URBAN;


      $SMALL_RURAL = $A_SMALL_RURAL + $B_SMALL_RURAL + $C_SMALL_RURAL + $D_SMALL_RURAL + $E_SMALL_RURAL + $F_SMALL_RURAL+ $G_SMALL_RURAL + 
      $H_SMALL_RURAL + $I_SMALL_RURAL + $J_SMALL_RURAL + $K_SMALL_RURAL + $L_SMALL_RURAL +$M_SMALL_RURAL + $N_SMALL_RURAL + $O_SMALL_RURAL + 
      $P_SMALL_RURAL + $Q_SMALL_RURAL + $R_SMALL_RURAL + $S_SMALL_RURAL + $T_SMALL_RURAL + $U_SMALL_RURAL;


      $MEDIUM_TOTAL = $A_MEDIUM_TOTAL + $B_MEDIUM_TOTAL + $C_MEDIUM_TOTAL + $D_MEDIUM_TOTAL + $E_MEDIUM_TOTAL + $F_MEDIUM_TOTAL+ $G_MEDIUM_TOTAL + 
      $H_MEDIUM_TOTAL + $I_MEDIUM_TOTAL + $J_MEDIUM_TOTAL + $K_MEDIUM_TOTAL + $L_MEDIUM_TOTAL +$M_MEDIUM_TOTAL + $N_MEDIUM_TOTAL + $O_MEDIUM_TOTAL + $P_MEDIUM_TOTAL + $Q_MEDIUM_TOTAL + $R_MEDIUM_TOTAL + $S_MEDIUM_TOTAL + $T_MEDIUM_TOTAL + $U_MEDIUM_TOTAL;


      $MEDIUM_URBAN = $A_MEDIUM_URBAN + $B_MEDIUM_URBAN + $C_MEDIUM_URBAN + $D_MEDIUM_URBAN + $E_MEDIUM_URBAN + $F_MEDIUM_URBAN+ $G_MEDIUM_URBAN + 
      $H_MEDIUM_URBAN + $I_MEDIUM_URBAN + $J_MEDIUM_URBAN + $K_MEDIUM_URBAN +$L_MEDIUM_URBAN +$M_MEDIUM_URBAN + $N_MEDIUM_URBAN + $O_MEDIUM_URBAN + $P_MEDIUM_URBAN + $Q_MEDIUM_URBAN + $R_MEDIUM_URBAN + $S_MEDIUM_URBAN + $T_MEDIUM_URBAN + $U_MEDIUM_URBAN;



      $MEDIUM_RURAL = $A_MEDIUM_RURAL + $B_MEDIUM_RURAL + $C_MEDIUM_RURAL + $D_MEDIUM_RURAL + $E_MEDIUM_RURAL + $F_MEDIUM_RURAL+ $G_MEDIUM_RURAL + 
      $H_MEDIUM_RURAL + $I_MEDIUM_RURAL + $J_MEDIUM_RURAL + $K_MEDIUM_RURAL + $L_MEDIUM_RURAL +$M_MEDIUM_RURAL + $N_MEDIUM_RURAL + $O_MEDIUM_RURAL 
      + $P_MEDIUM_RURAL + $Q_MEDIUM_RURAL + $R_MEDIUM_RURAL + $S_MEDIUM_RURAL + $T_MEDIUM_RURAL + $U_MEDIUM_RURAL;


      $LARGE_TOTAL = $A_LARGE_TOTAL + $B_LARGE_TOTAL + $C_LARGE_TOTAL + $D_LARGE_TOTAL + $E_LARGE_TOTAL + $F_LARGE_TOTAL+ $G_LARGE_TOTAL + 
      $H_LARGE_TOTAL + $I_LARGE_TOTAL + $J_LARGE_TOTAL + $K_LARGE_TOTAL + $L_LARGE_TOTAL +$M_LARGE_TOTAL + $N_LARGE_TOTAL + $O_LARGE_TOTAL + 
      $P_LARGE_TOTAL + $Q_LARGE_TOTAL + $R_LARGE_TOTAL + $S_LARGE_TOTAL + $T_LARGE_TOTAL + $U_LARGE_TOTAL;
    

      $LARGE_URBAN = $A_LARGE_URBAN + $B_LARGE_URBAN + $C_LARGE_URBAN + $D_LARGE_URBAN + $E_LARGE_URBAN + $F_LARGE_URBAN+ $G_LARGE_URBAN + 
      $H_LARGE_URBAN + $I_LARGE_URBAN + $J_LARGE_URBAN + $K_LARGE_URBAN + $L_LARGE_URBAN +$M_LARGE_URBAN + $N_LARGE_URBAN + $O_LARGE_URBAN + 
      $P_LARGE_URBAN + $Q_LARGE_URBAN + $R_LARGE_URBAN + $S_LARGE_URBAN + $T_LARGE_URBAN + $U_LARGE_URBAN;


      $LARGE_RURAL = $A_LARGE_RURAL + $B_LARGE_RURAL + $C_LARGE_RURAL + $D_LARGE_RURAL + $E_LARGE_RURAL + $F_LARGE_RURAL+ $G_LARGE_RURAL + 
      $H_LARGE_RURAL + $I_LARGE_RURAL + $J_LARGE_RURAL + $K_LARGE_RURAL + $L_LARGE_RURAL +$M_LARGE_RURAL + $N_LARGE_RURAL + $O_LARGE_RURAL + 
      $P_LARGE_RURAL + $Q_LARGE_RURAL + $R_LARGE_RURAL + $S_LARGE_RURAL + $T_LARGE_RURAL + $U_LARGE_RURAL;

 ?>


 <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?= $TOTAL ?></td>
  <td><?= $COTTAGE_TOTAL ?></td>
  <td><?= $COTTAGE_URBAN ?></td>
  <td><?= $COTTAGE_RURAL ?></td>
  <td><?= $MICRO_TOTAL ?></td>
  <td><?= $MICRO_URBAN ?></td>
  <td><?= $MICRO_RURAL ?></td>
  <td><?= $SMALL_TOTAL ?></td>
  <td><?= $SMALL_URBAN ?></td>
  <td><?= $SMALL_RURAL ?></td>
  <td><?= $MEDIUM_TOTAL ?></td>
  <td><?= $MEDIUM_URBAN ?></td>
  <td><?= $MEDIUM_RURAL ?></td>
  <td><?= $LARGE_TOTAL ?></td>
  <td><?= $LARGE_URBAN ?></td>
  <td><?= $LARGE_RURAL ?></td>
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



