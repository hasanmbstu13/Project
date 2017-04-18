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


<!--   <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?= $A_TOTAL ?></td>
  <td><?= $A_COTTAGE_TOTAL ?></td>
  <td><?= $A_COTTAGE_MALE ?></td>
  <td><?= $A_COTTAGE_FEMALE ?></td>
  <td><?= $A_MICRO_TOTAL ?></td>
  <td><?= $A_MICRO_MALE ?></td>
  <td><?= $A_MICRO_FEMALE ?></td>
  <td><?= $A_SMALL_TOTAL ?></td>
  <td><?= $A_SMALL_MALE ?></td>
  <td><?= $A_SMALL_FEMALE ?></td>
  <td><?= $A_MEDIUM_TOTAL ?></td>
  <td><?= $A_MEDIUM_MALE ?></td>
  <td><?= $A_MEDIUM_FEMALE ?></td>
  <td><?= $A_LARGE_TOTAL ?></td>
  <td><?= $A_LARGE_MALE ?></td>
  <td><?= $A_LARGE_FEMALE ?></td>

 </tr> -->

   <tr>
  <td>B</td>
  <td align="left">Mining and quarrying</td>
  <td><?= $B_TOTAL ?></td>
  <td><?= $B_COTTAGE_TOTAL ?></td>
  <td><?= $B_COTTAGE_MALE ?></td>
  <td><?= $B_COTTAGE_FEMALE ?></td>
  <td><?= $B_MICRO_TOTAL ?></td>
  <td><?= $B_MICRO_MALE ?></td>
  <td><?= $B_MICRO_FEMALE ?></td>
  <td><?= $B_SMALL_TOTAL ?></td>
  <td><?= $B_SMALL_MALE ?></td>
  <td><?= $B_SMALL_FEMALE ?></td>
  <td><?= $B_MEDIUM_TOTAL ?></td>
  <td><?= $B_MEDIUM_MALE ?></td>
  <td><?= $B_MEDIUM_FEMALE ?></td>
  <td><?= $B_LARGE_TOTAL ?></td>
  <td><?= $B_LARGE_MALE ?></td>
  <td><?= $B_LARGE_FEMALE ?></td>
 
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?= $C_TOTAL ?></td>
  <td><?= $C_COTTAGE_TOTAL ?></td>
  <td><?= $C_COTTAGE_MALE ?></td>
  <td><?= $C_COTTAGE_FEMALE ?></td>
  <td><?= $C_MICRO_TOTAL ?></td>
  <td><?= $C_MICRO_MALE ?></td>
  <td><?= $C_MICRO_FEMALE ?></td>
  <td><?= $C_SMALL_TOTAL ?></td>
  <td><?= $C_SMALL_MALE ?></td>
  <td><?= $C_SMALL_FEMALE ?></td>
  <td><?= $C_MEDIUM_TOTAL ?></td>
  <td><?= $C_MEDIUM_MALE ?></td>
  <td><?= $C_MEDIUM_FEMALE ?></td>
  <td><?= $C_LARGE_TOTAL ?></td>
  <td><?= $C_LARGE_MALE ?></td>
  <td><?= $C_LARGE_FEMALE ?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, gas, steam and air conditioning supply</td>
  <td><?= $D_TOTAL ?></td>
  <td><?= $D_COTTAGE_TOTAL ?></td>
  <td><?= $D_COTTAGE_MALE ?></td>
  <td><?= $D_COTTAGE_FEMALE ?></td>
  <td><?= $D_MICRO_TOTAL ?></td>
  <td><?= $D_MICRO_MALE ?></td>
  <td><?= $D_MICRO_FEMALE ?></td>
  <td><?= $D_SMALL_TOTAL ?></td>
  <td><?= $D_SMALL_MALE ?></td>
  <td><?= $D_SMALL_FEMALE ?></td>
  <td><?= $D_MEDIUM_TOTAL ?></td>
  <td><?= $D_MEDIUM_MALE ?></td>
  <td><?= $D_MEDIUM_FEMALE ?></td>
  <td><?= $D_LARGE_TOTAL ?></td>
  <td><?= $D_LARGE_MALE ?></td>
  <td><?= $D_LARGE_FEMALE ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water supply, sewerage, waste management and remediation activities</td>
  <td><?= $E_TOTAL ?></td>
  <td><?= $E_COTTAGE_TOTAL ?></td>
  <td><?= $E_COTTAGE_MALE ?></td>
  <td><?= $E_COTTAGE_FEMALE ?></td>
  <td><?= $E_MICRO_TOTAL ?></td>
  <td><?= $E_MICRO_MALE ?></td>
  <td><?= $E_MICRO_FEMALE ?></td>
  <td><?= $E_SMALL_TOTAL ?></td>
  <td><?= $E_SMALL_MALE ?></td>
  <td><?= $E_SMALL_FEMALE ?></td>
  <td><?= $E_MEDIUM_TOTAL ?></td>
  <td><?= $E_MEDIUM_MALE ?></td>
  <td><?= $E_MEDIUM_FEMALE ?></td>
  <td><?= $E_LARGE_TOTAL ?></td>
  <td><?= $E_LARGE_MALE ?></td>
  <td><?= $E_LARGE_FEMALE ?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?= $F_TOTAL ?></td>
  <td><?= $F_COTTAGE_TOTAL ?></td>
  <td><?= $F_COTTAGE_MALE ?></td>
  <td><?= $F_COTTAGE_FEMALE ?></td>
  <td><?= $F_MICRO_TOTAL ?></td>
  <td><?= $F_MICRO_MALE ?></td>
  <td><?= $F_MICRO_FEMALE ?></td>
  <td><?= $F_SMALL_TOTAL ?></td>
  <td><?= $F_SMALL_MALE ?></td>
  <td><?= $F_SMALL_FEMALE ?></td>
  <td><?= $F_MEDIUM_TOTAL ?></td>
  <td><?= $F_MEDIUM_MALE ?></td>
  <td><?= $F_MEDIUM_FEMALE ?></td>
  <td><?= $F_LARGE_TOTAL ?></td>
  <td><?= $F_LARGE_MALE ?></td>
  <td><?= $F_LARGE_FEMALE ?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and retail trade, repair of motor vehicles and motorcycles</td>
  <td><?= $G_TOTAL ?></td>
  <td><?= $G_COTTAGE_TOTAL ?></td>
  <td><?= $G_COTTAGE_MALE ?></td>
  <td><?= $G_COTTAGE_FEMALE ?></td>
  <td><?= $G_MICRO_TOTAL ?></td>
  <td><?= $G_MICRO_MALE ?></td>
  <td><?= $G_MICRO_FEMALE ?></td>
  <td><?= $G_SMALL_TOTAL ?></td>
  <td><?= $G_SMALL_MALE ?></td>
  <td><?= $G_SMALL_FEMALE ?></td>
  <td><?= $G_MEDIUM_TOTAL ?></td>
  <td><?= $G_MEDIUM_MALE ?></td>
  <td><?= $G_MEDIUM_FEMALE ?></td>
  <td><?= $G_LARGE_TOTAL ?></td>
  <td><?= $G_LARGE_MALE ?></td>
  <td><?= $G_LARGE_FEMALE ?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and storage</td>
  <td><?= $H_TOTAL ?></td>
  <td><?= $H_COTTAGE_TOTAL ?></td>
  <td><?= $H_COTTAGE_MALE ?></td>
  <td><?= $H_COTTAGE_FEMALE ?></td>
  <td><?= $H_MICRO_TOTAL ?></td>
  <td><?= $H_MICRO_MALE ?></td>
  <td><?= $H_MICRO_FEMALE ?></td>
  <td><?= $H_SMALL_TOTAL ?></td>
  <td><?= $H_SMALL_MALE ?></td>
  <td><?= $H_SMALL_FEMALE ?></td>
  <td><?= $H_MEDIUM_TOTAL ?></td>
  <td><?= $H_MEDIUM_MALE ?></td>
  <td><?= $H_MEDIUM_FEMALE ?></td>
  <td><?= $H_LARGE_TOTAL ?></td>
  <td><?= $H_LARGE_MALE ?></td>
  <td><?= $H_LARGE_FEMALE ?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and food service activities (Hotel and restaurants)</td>
  <td><?= $I_TOTAL ?></td>
  <td><?= $I_COTTAGE_TOTAL ?></td>
  <td><?= $I_COTTAGE_MALE ?></td>
  <td><?= $I_COTTAGE_FEMALE ?></td>
  <td><?= $I_MICRO_TOTAL ?></td>
  <td><?= $I_MICRO_MALE ?></td>
  <td><?= $I_MICRO_FEMALE ?></td>
  <td><?= $I_SMALL_TOTAL ?></td>
  <td><?= $I_SMALL_MALE ?></td>
  <td><?= $I_SMALL_FEMALE ?></td>
  <td><?= $I_MEDIUM_TOTAL ?></td>
  <td><?= $I_MEDIUM_MALE ?></td>
  <td><?= $I_MEDIUM_FEMALE ?></td>
  <td><?= $I_LARGE_TOTAL ?></td>
  <td><?= $I_LARGE_MALE ?></td>
  <td><?= $I_LARGE_FEMALE ?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and communication</td>
  <td><?= $J_TOTAL ?></td>
  <td><?= $J_COTTAGE_TOTAL ?></td>
  <td><?= $J_COTTAGE_MALE ?></td>
  <td><?= $J_COTTAGE_FEMALE ?></td>
  <td><?= $J_MICRO_TOTAL ?></td>
  <td><?= $J_MICRO_MALE ?></td>
  <td><?= $J_MICRO_FEMALE ?></td>
  <td><?= $J_SMALL_TOTAL ?></td>
  <td><?= $J_SMALL_MALE ?></td>
  <td><?= $J_SMALL_FEMALE ?></td>
  <td><?= $J_MEDIUM_TOTAL ?></td>
  <td><?= $J_MEDIUM_MALE ?></td>
  <td><?= $J_MEDIUM_FEMALE ?></td>
  <td><?= $J_LARGE_TOTAL ?></td>
  <td><?= $J_LARGE_MALE ?></td>
  <td><?= $J_LARGE_FEMALE ?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and insurance activities</td>
  <td><?= $K_TOTAL ?></td>
  <td><?= $K_COTTAGE_TOTAL ?></td>
  <td><?= $K_COTTAGE_MALE ?></td>
  <td><?= $K_COTTAGE_FEMALE ?></td>
  <td><?= $K_MICRO_TOTAL ?></td>
  <td><?= $K_MICRO_MALE ?></td>
  <td><?= $K_MICRO_FEMALE ?></td>
  <td><?= $K_SMALL_TOTAL ?></td>
  <td><?= $K_SMALL_MALE ?></td>
  <td><?= $K_SMALL_FEMALE ?></td>
  <td><?= $K_MEDIUM_TOTAL ?></td>
  <td><?= $K_MEDIUM_MALE ?></td>
  <td><?= $K_MEDIUM_FEMALE ?></td>
  <td><?= $K_LARGE_TOTAL ?></td>
  <td><?= $K_LARGE_MALE ?></td>
  <td><?= $K_LARGE_FEMALE ?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate activities</td>
  <td><?= $L_TOTAL ?></td>
  <td><?= $L_COTTAGE_TOTAL ?></td>
  <td><?= $L_COTTAGE_MALE ?></td>
  <td><?= $L_COTTAGE_FEMALE ?></td>
  <td><?= $L_MICRO_TOTAL ?></td>
  <td><?= $L_MICRO_MALE ?></td>
  <td><?= $L_MICRO_FEMALE ?></td>
  <td><?= $L_SMALL_TOTAL ?></td>
  <td><?= $L_SMALL_MALE ?></td>
  <td><?= $L_SMALL_FEMALE ?></td>
  <td><?= $L_MEDIUM_TOTAL ?></td>
  <td><?= $L_MEDIUM_MALE ?></td>
  <td><?= $L_MEDIUM_FEMALE ?></td>
  <td><?= $L_LARGE_TOTAL ?></td>
  <td><?= $L_LARGE_MALE ?></td>
  <td><?= $L_LARGE_FEMALE ?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, scientific and technical activities</td>
  <td><?= $M_TOTAL ?></td>
  <td><?= $M_COTTAGE_TOTAL ?></td>
  <td><?= $M_COTTAGE_MALE ?></td>
  <td><?= $M_COTTAGE_FEMALE ?></td>
  <td><?= $M_MICRO_TOTAL ?></td>
  <td><?= $M_MICRO_MALE ?></td>
  <td><?= $M_MICRO_FEMALE ?></td>
  <td><?= $M_SMALL_TOTAL ?></td>
  <td><?= $M_SMALL_MALE ?></td>
  <td><?= $M_SMALL_FEMALE ?></td>
  <td><?= $M_MEDIUM_TOTAL ?></td>
  <td><?= $M_MEDIUM_MALE ?></td>
  <td><?= $M_MEDIUM_FEMALE ?></td>
  <td><?= $M_LARGE_TOTAL ?></td>
  <td><?= $M_LARGE_MALE ?></td>
  <td><?= $M_LARGE_FEMALE ?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and support service activities</td>
  <td><?= $N_TOTAL ?></td>
  <td><?= $N_COTTAGE_TOTAL ?></td>
  <td><?= $N_COTTAGE_MALE ?></td>
  <td><?= $N_COTTAGE_FEMALE ?></td>
  <td><?= $N_MICRO_TOTAL ?></td>
  <td><?= $N_MICRO_MALE ?></td>
  <td><?= $N_MICRO_FEMALE ?></td>
  <td><?= $N_SMALL_TOTAL ?></td>
  <td><?= $N_SMALL_MALE ?></td>
  <td><?= $N_SMALL_FEMALE ?></td>
  <td><?= $N_MEDIUM_TOTAL ?></td>
  <td><?= $N_MEDIUM_MALE ?></td>
  <td><?= $N_MEDIUM_FEMALE ?></td>
  <td><?= $N_LARGE_TOTAL ?></td>
  <td><?= $N_LARGE_MALE ?></td>
  <td><?= $N_LARGE_FEMALE ?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public administration and defense, compulsory social security</td>
  <td><?= $O_TOTAL ?></td>
  <td><?= $O_COTTAGE_TOTAL ?></td>
  <td><?= $O_COTTAGE_MALE ?></td>
  <td><?= $O_COTTAGE_FEMALE ?></td>
  <td><?= $O_MICRO_TOTAL ?></td>
  <td><?= $O_MICRO_MALE ?></td>
  <td><?= $O_MICRO_FEMALE ?></td>
  <td><?= $O_SMALL_TOTAL ?></td>
  <td><?= $O_SMALL_MALE ?></td>
  <td><?= $O_SMALL_FEMALE ?></td>
  <td><?= $O_MEDIUM_TOTAL ?></td>
  <td><?= $O_MEDIUM_MALE ?></td>
  <td><?= $O_MEDIUM_FEMALE ?></td>
  <td><?= $O_LARGE_TOTAL ?></td>
  <td><?= $O_LARGE_MALE ?></td>
  <td><?= $O_LARGE_FEMALE ?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?= $P_TOTAL ?></td>
  <td><?= $P_COTTAGE_TOTAL ?></td>
  <td><?= $P_COTTAGE_MALE ?></td>
  <td><?= $P_COTTAGE_FEMALE ?></td>
  <td><?= $P_MICRO_TOTAL ?></td>
  <td><?= $P_MICRO_MALE ?></td>
  <td><?= $P_MICRO_FEMALE ?></td>
  <td><?= $P_SMALL_TOTAL ?></td>
  <td><?= $P_SMALL_MALE ?></td>
  <td><?= $P_SMALL_FEMALE ?></td>
  <td><?= $P_MEDIUM_TOTAL ?></td>
  <td><?= $P_MEDIUM_MALE ?></td>
  <td><?= $P_MEDIUM_FEMALE ?></td>
  <td><?= $P_LARGE_TOTAL ?></td>
  <td><?= $P_LARGE_MALE ?></td>
  <td><?= $P_LARGE_FEMALE ?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human health and social work activities</td>
  <td><?= $Q_TOTAL ?></td>
  <td><?= $Q_COTTAGE_TOTAL ?></td>
  <td><?= $Q_COTTAGE_MALE ?></td>
  <td><?= $Q_COTTAGE_FEMALE ?></td>
  <td><?= $Q_MICRO_TOTAL ?></td>
  <td><?= $Q_MICRO_MALE ?></td>
  <td><?= $Q_MICRO_FEMALE ?></td>
  <td><?= $Q_SMALL_TOTAL ?></td>
  <td><?= $Q_SMALL_MALE ?></td>
  <td><?= $Q_SMALL_FEMALE ?></td>
  <td><?= $Q_MEDIUM_TOTAL ?></td>
  <td><?= $Q_MEDIUM_MALE ?></td>
  <td><?= $Q_MEDIUM_FEMALE ?></td>
  <td><?= $Q_LARGE_TOTAL ?></td>
  <td><?= $Q_LARGE_MALE ?></td>
  <td><?= $Q_LARGE_FEMALE ?></td>


     <tr>
  <td>R</td>
  <td align="left">Art, entertainment and recreation</td>
  <td><?= $R_TOTAL ?></td>
  <td><?= $R_COTTAGE_TOTAL ?></td>
  <td><?= $R_COTTAGE_MALE ?></td>
  <td><?= $R_COTTAGE_FEMALE ?></td>
  <td><?= $R_MICRO_TOTAL ?></td>
  <td><?= $R_MICRO_MALE ?></td>
  <td><?= $R_MICRO_FEMALE ?></td>
  <td><?= $R_SMALL_TOTAL ?></td>
  <td><?= $R_SMALL_MALE ?></td>
  <td><?= $R_SMALL_FEMALE ?></td>
  <td><?= $R_MEDIUM_TOTAL ?></td>
  <td><?= $R_MEDIUM_MALE ?></td>
  <td><?= $R_MEDIUM_FEMALE ?></td>
  <td><?= $R_LARGE_TOTAL ?></td>
  <td><?= $R_LARGE_MALE ?></td>
  <td><?= $R_LARGE_FEMALE ?></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other service activities</td>
  <td><?= $S_TOTAL ?></td>
  <td><?= $S_COTTAGE_TOTAL ?></td>
  <td><?= $S_COTTAGE_MALE ?></td>
  <td><?= $S_COTTAGE_FEMALE ?></td>
  <td><?= $S_MICRO_TOTAL ?></td>
  <td><?= $S_MICRO_MALE ?></td>
  <td><?= $S_MICRO_FEMALE ?></td>
  <td><?= $S_SMALL_TOTAL ?></td>
  <td><?= $S_SMALL_MALE ?></td>
  <td><?= $S_SMALL_FEMALE ?></td>
  <td><?= $S_MEDIUM_TOTAL ?></td>
  <td><?= $S_MEDIUM_MALE ?></td>
  <td><?= $S_MEDIUM_FEMALE ?></td>
  <td><?= $S_LARGE_TOTAL ?></td>
  <td><?= $S_LARGE_MALE ?></td>
  <td><?= $S_LARGE_FEMALE ?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of households as employers, undifferentiated goods and services producing activities of households for own use</td>
  <td><?= $T_TOTAL ?></td>
  <td><?= $T_COTTAGE_TOTAL ?></td>
  <td><?= $T_COTTAGE_MALE ?></td>
  <td><?= $T_COTTAGE_FEMALE ?></td>
  <td><?= $T_MICRO_TOTAL ?></td>
  <td><?= $T_MICRO_MALE ?></td>
  <td><?= $T_MICRO_FEMALE ?></td>
  <td><?= $T_SMALL_TOTAL ?></td>
  <td><?= $T_SMALL_MALE ?></td>
  <td><?= $T_SMALL_FEMALE ?></td>
  <td><?= $T_MEDIUM_TOTAL ?></td>
  <td><?= $T_MEDIUM_MALE ?></td>
  <td><?= $T_MEDIUM_FEMALE ?></td>
  <td><?= $T_LARGE_TOTAL ?></td>
  <td><?= $T_LARGE_MALE ?></td>
  <td><?= $T_LARGE_FEMALE ?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of extraterritorial organizations and bodies</td>
  <td><?= $U_TOTAL ?></td>
  <td><?= $U_COTTAGE_TOTAL ?></td>
  <td><?= $U_COTTAGE_MALE ?></td>
  <td><?= $U_COTTAGE_FEMALE ?></td>
  <td><?= $U_MICRO_TOTAL ?></td>
  <td><?= $U_MICRO_MALE ?></td>
  <td><?= $U_MICRO_FEMALE ?></td>
  <td><?= $U_SMALL_TOTAL ?></td>
  <td><?= $U_SMALL_MALE ?></td>
  <td><?= $U_SMALL_FEMALE ?></td>
  <td><?= $U_MEDIUM_TOTAL ?></td>
  <td><?= $U_MEDIUM_MALE ?></td>
  <td><?= $U_MEDIUM_FEMALE ?></td>
  <td><?= $U_LARGE_TOTAL ?></td>
  <td><?= $U_LARGE_MALE ?></td>
  <td><?= $U_LARGE_FEMALE ?></td>
 </tr>


 <?php 



 $TOTAL = $A_TOTAL + $B_TOTAL + $C_TOTAL + $D_TOTAL + $E_TOTAL + $F_TOTAL+ $G_TOTAL + $H_TOTAL + $I_TOTAL + $J_TOTAL + $K_TOTAL +
      $L_TOTAL +$M_TOTAL + $N_TOTAL + $O_TOTAL + $P_TOTAL + $Q_TOTAL + $R_TOTAL + $S_TOTAL + $T_TOTAL + $U_TOTAL;

      $COTTAGE_TOTAL = $A_COTTAGE_TOTAL + $B_COTTAGE_TOTAL + $C_COTTAGE_TOTAL + $D_COTTAGE_TOTAL + $E_COTTAGE_TOTAL + $F_COTTAGE_TOTAL+ 
      $G_COTTAGE_TOTAL + $H_COTTAGE_TOTAL + $I_COTTAGE_TOTAL + $J_COTTAGE_TOTAL + $K_COTTAGE_TOTAL + $L_COTTAGE_TOTAL +$M_COTTAGE_TOTAL + 
      $N_COTTAGE_TOTAL + $O_COTTAGE_TOTAL + $P_COTTAGE_TOTAL + $Q_COTTAGE_TOTAL + $R_COTTAGE_TOTAL + $S_COTTAGE_TOTAL + $T_COTTAGE_TOTAL + 
      $U_COTTAGE_TOTAL;
  
      $COTTAGE_MALE = $A_COTTAGE_MALE + $B_COTTAGE_MALE + $C_COTTAGE_MALE + $D_COTTAGE_MALE + $E_COTTAGE_MALE + $F_COTTAGE_MALE+ 
      $G_COTTAGE_MALE + $H_COTTAGE_MALE + $I_COTTAGE_MALE + $J_COTTAGE_MALE + $K_COTTAGE_MALE + $L_COTTAGE_MALE +$M_COTTAGE_MALE + 
      $N_COTTAGE_MALE + $O_COTTAGE_MALE + $P_COTTAGE_MALE + $Q_COTTAGE_MALE + $R_COTTAGE_MALE + $S_COTTAGE_MALE + $T_COTTAGE_MALE + 
      $U_COTTAGE_MALE;

      $COTTAGE_FEMALE = $A_COTTAGE_FEMALE + $B_COTTAGE_FEMALE + $C_COTTAGE_FEMALE + $D_COTTAGE_FEMALE + $E_COTTAGE_FEMALE + $F_COTTAGE_FEMALE+ 
      $G_COTTAGE_FEMALE + $H_COTTAGE_FEMALE + $I_COTTAGE_FEMALE + $J_COTTAGE_FEMALE + $K_COTTAGE_FEMALE + $L_COTTAGE_FEMALE +$M_COTTAGE_FEMALE + 
      $N_COTTAGE_FEMALE + $O_COTTAGE_FEMALE + $P_COTTAGE_FEMALE + $Q_COTTAGE_FEMALE + $R_COTTAGE_FEMALE + $S_COTTAGE_FEMALE + $T_COTTAGE_FEMALE + 
      $U_COTTAGE_FEMALE;

      $MICRO_TOTAL = $A_MICRO_TOTAL + $B_MICRO_TOTAL + $C_MICRO_TOTAL + $D_MICRO_TOTAL + $E_MICRO_TOTAL + $F_MICRO_TOTAL+ $G_MICRO_TOTAL + 
      $H_MICRO_TOTAL + $I_MICRO_TOTAL + $J_MICRO_TOTAL + $K_MICRO_TOTAL + $L_MICRO_TOTAL +$M_MICRO_TOTAL + $N_MICRO_TOTAL + $O_MICRO_TOTAL + 
      $P_MICRO_TOTAL + $Q_MICRO_TOTAL + $R_MICRO_TOTAL + $S_MICRO_TOTAL + $T_MICRO_TOTAL + $U_MICRO_TOTAL;


      $MICRO_MALE = $A_MICRO_MALE + $B_MICRO_MALE + $C_MICRO_MALE + $D_MICRO_MALE + $E_MICRO_MALE + $F_MICRO_MALE+ $G_MICRO_MALE + 
      $H_MICRO_MALE + $I_MICRO_MALE + $J_MICRO_MALE + $K_MICRO_MALE + $L_MICRO_MALE +$M_MICRO_MALE + $N_MICRO_MALE + $O_MICRO_MALE + 
      $P_MICRO_MALE + $Q_MICRO_MALE + $R_MICRO_MALE + $S_MICRO_MALE + 
      $T_MICRO_MALE + $U_MICRO_MALE;

      $MICRO_FEMALE = $A_MICRO_FEMALE + $B_MICRO_FEMALE + $C_MICRO_FEMALE + $D_MICRO_FEMALE + $E_MICRO_FEMALE + $F_MICRO_FEMALE+ $G_MICRO_FEMALE + 
      $H_MICRO_FEMALE + $I_MICRO_FEMALE + $J_MICRO_FEMALE + $K_MICRO_FEMALE + $L_MICRO_FEMALE +$M_MICRO_FEMALE + $N_MICRO_FEMALE + $O_MICRO_FEMALE + 
      $P_MICRO_FEMALE + $Q_MICRO_FEMALE + $R_MICRO_FEMALE + $S_MICRO_FEMALE + $T_MICRO_FEMALE + $U_MICRO_FEMALE;


      $SMALL_TOTAL = $A_SMALL_TOTAL + $B_SMALL_TOTAL + $C_SMALL_TOTAL + $D_SMALL_TOTAL + $E_SMALL_TOTAL + $F_SMALL_TOTAL+ $G_SMALL_TOTAL + 
      $H_SMALL_TOTAL + $I_SMALL_TOTAL + $J_SMALL_TOTAL + $K_SMALL_TOTAL + $L_SMALL_TOTAL +$M_SMALL_TOTAL + $N_SMALL_TOTAL + $O_SMALL_TOTAL + 
      $P_SMALL_TOTAL + $Q_SMALL_TOTAL + $R_SMALL_TOTAL + $S_SMALL_TOTAL + $T_SMALL_TOTAL + $U_SMALL_TOTAL;


      $SMALL_MALE = $A_SMALL_MALE + $B_SMALL_MALE + $C_SMALL_MALE + $D_SMALL_MALE + $E_SMALL_MALE + $F_SMALL_MALE+ $G_SMALL_MALE + 
      $H_SMALL_MALE + $I_SMALL_MALE + $J_SMALL_MALE + $K_SMALL_MALE + $L_SMALL_MALE +$M_SMALL_MALE + $N_SMALL_MALE + $O_SMALL_MALE + 
      $P_SMALL_MALE + $Q_SMALL_MALE + $R_SMALL_MALE + $S_SMALL_MALE + $T_SMALL_MALE + $U_SMALL_MALE;


      $SMALL_FEMALE = $A_SMALL_FEMALE + $B_SMALL_FEMALE + $C_SMALL_FEMALE + $D_SMALL_FEMALE + $E_SMALL_FEMALE + $F_SMALL_FEMALE+ $G_SMALL_FEMALE + 
      $H_SMALL_FEMALE + $I_SMALL_FEMALE + $J_SMALL_FEMALE + $K_SMALL_FEMALE + $L_SMALL_FEMALE +$M_SMALL_FEMALE + $N_SMALL_FEMALE + $O_SMALL_FEMALE + 
      $P_SMALL_FEMALE + $Q_SMALL_FEMALE + $R_SMALL_FEMALE + $S_SMALL_FEMALE + $T_SMALL_FEMALE + $U_SMALL_FEMALE;


      $MEDIUM_TOTAL = $A_MEDIUM_TOTAL + $B_MEDIUM_TOTAL + $C_MEDIUM_TOTAL + $D_MEDIUM_TOTAL + $E_MEDIUM_TOTAL + $F_MEDIUM_TOTAL+ $G_MEDIUM_TOTAL + 
      $H_MEDIUM_TOTAL + $I_MEDIUM_TOTAL + $J_MEDIUM_TOTAL + $K_MEDIUM_TOTAL + $L_MEDIUM_TOTAL +$M_MEDIUM_TOTAL + $N_MEDIUM_TOTAL + $O_MEDIUM_TOTAL + $P_MEDIUM_TOTAL + $Q_MEDIUM_TOTAL + $R_MEDIUM_TOTAL + $S_MEDIUM_TOTAL + $T_MEDIUM_TOTAL + $U_MEDIUM_TOTAL;


      $MEDIUM_MALE = $A_MEDIUM_MALE + $B_MEDIUM_MALE + $C_MEDIUM_MALE + $D_MEDIUM_MALE + $E_MEDIUM_MALE + $F_MEDIUM_MALE+ $G_MEDIUM_MALE + 
      $H_MEDIUM_MALE + $I_MEDIUM_MALE + $J_MEDIUM_MALE + $K_MEDIUM_MALE +$L_MEDIUM_MALE +$M_MEDIUM_MALE + $N_MEDIUM_MALE + $O_MEDIUM_MALE + $P_MEDIUM_MALE + $Q_MEDIUM_MALE + $R_MEDIUM_MALE + $S_MEDIUM_MALE + $T_MEDIUM_MALE + $U_MEDIUM_MALE;



      $MEDIUM_FEMALE = $A_MEDIUM_FEMALE + $B_MEDIUM_FEMALE + $C_MEDIUM_FEMALE + $D_MEDIUM_FEMALE + $E_MEDIUM_FEMALE + $F_MEDIUM_FEMALE+ $G_MEDIUM_FEMALE + 
      $H_MEDIUM_FEMALE + $I_MEDIUM_FEMALE + $J_MEDIUM_FEMALE + $K_MEDIUM_FEMALE + $L_MEDIUM_FEMALE +$M_MEDIUM_FEMALE + $N_MEDIUM_FEMALE + $O_MEDIUM_FEMALE 
      + $P_MEDIUM_FEMALE + $Q_MEDIUM_FEMALE + $R_MEDIUM_FEMALE + $S_MEDIUM_FEMALE + $T_MEDIUM_FEMALE + $U_MEDIUM_FEMALE;


      $LARGE_TOTAL = $A_LARGE_TOTAL + $B_LARGE_TOTAL + $C_LARGE_TOTAL + $D_LARGE_TOTAL + $E_LARGE_TOTAL + $F_LARGE_TOTAL+ 
      $G_LARGE_TOTAL + 
      $H_LARGE_TOTAL + $I_LARGE_TOTAL + $J_LARGE_TOTAL + $K_LARGE_TOTAL + $L_LARGE_TOTAL +$M_LARGE_TOTAL + $N_LARGE_TOTAL + 
      $O_LARGE_TOTAL + 
      $P_LARGE_TOTAL + $Q_LARGE_TOTAL + $R_LARGE_TOTAL + $S_LARGE_TOTAL + $T_LARGE_TOTAL + $U_LARGE_TOTAL;
    

      $LARGE_MALE = $A_LARGE_MALE + $B_LARGE_MALE + $C_LARGE_MALE + $D_LARGE_MALE + $E_LARGE_MALE + $F_LARGE_MALE+ $G_LARGE_MALE + 
      $H_LARGE_MALE + $I_LARGE_MALE + $J_LARGE_MALE + $K_LARGE_MALE + $L_LARGE_MALE +$M_LARGE_MALE + $N_LARGE_MALE + $O_LARGE_MALE + 
      $P_LARGE_MALE + $Q_LARGE_MALE + $R_LARGE_MALE + $S_LARGE_MALE + $T_LARGE_MALE + $U_LARGE_MALE;


      $LARGE_FEMALE = $A_LARGE_FEMALE + $B_LARGE_FEMALE + $C_LARGE_FEMALE + $D_LARGE_FEMALE + $E_LARGE_FEMALE + $F_LARGE_FEMALE+ 
      $G_LARGE_FEMALE + $H_LARGE_FEMALE + $I_LARGE_FEMALE + $J_LARGE_FEMALE + $K_LARGE_FEMALE + $L_LARGE_FEMALE +$M_LARGE_FEMALE + 
      $N_LARGE_FEMALE + $O_LARGE_FEMALE + $P_LARGE_FEMALE + $Q_LARGE_FEMALE + $R_LARGE_FEMALE + $S_LARGE_FEMALE + $T_LARGE_FEMALE + 
      $U_LARGE_FEMALE;

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



