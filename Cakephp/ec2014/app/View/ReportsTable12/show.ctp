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
   <td colspan="17"><b>Table- 12: Number of Establishment by Mode of Sale, Accounting System, Wage & Salary Payment System, Economic Activity and Location in 2013.</b></td>
</tr>



 <tr >
  <td rowspan=3>Upazila</td>
  <td rowspan=3>Total Estab.</td>
  <td colspan=3>Mode of sales</td>
  <td colspan=5>Accounting System</td>
  <td colspan=7>Payment System</td>
 </tr>



 <tr>
  <td rowspan=2>Retail</td>
  <td rowspan=2>Whole sale</td>
  <td rowspan=2>Not applicable</td>
  <td colspan=4>Yes</td>
  <td rowspan=2>No</td>
  <td rowspan=2>Cheque</td>
  <td colspan=5>Cash</td>
  <td rowspan=2 >Others</td>
  
</tr>

 <tr>
  <td>Daily</td>
  <td>Monthly</td>
  <td>Annual</td>
  <td>Others</td>
  <td>Daily</td>
  <td>Weekly</td>
  <td>Monthly</td>
  <td>Others</td>
  <td>Not Applicable</td>
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

  </tr>

  <tr>
    <td><?=substr($zila, 0, -4); ?> </td>
    <td colspan= 16> </td>
  </tr>

<!-- A -->
<!-- <tr>
<td  align="left">Agriculture, forestry and fishing</td>

<td><?=(int)$A_total?></td>
<td><?=(int)$A_mode_retail?></td>
<td><?=(int)$A_mode_wholesale?></td>
<td><?=(int)$A_mode_not_applicable?></td>
<td><?=(int)$A_as_daily?></td>
<td><?=(int)$A_as_monthly?></td>
<td><?=(int)$A_as_annual?></td>
<td><?=(int)$A_as_others?></td>
<td><?=(int)$A_as_no?></td>
<td><?=(int)$A_ps_cheque?></td>
<td><?=(int)$A_ps_cash_daily?></td>
<td><?=(int)$A_ps_cash_weekly?></td>
<td><?=(int)$A_ps_cash_monthly?></td>
<td><?=(int)$A_ps_cash_others?></td>
<td><?=(int)$A_ps_cash_not_app?></td>
<td><?=(int)$A_ps_other?></td>
</tr>
 -->
<!-- B -->

<tr>
<td  align="left">Mining and quarrying</td>
<td><?=(int)$B_total?></td>
<td><?=(int)$B_mode_retail?></td>
<td><?=(int)$B_mode_wholesale?></td>
<td><?=(int)$B_mode_not_applicable?></td>
<td><?=(int)$B_as_daily?></td>
<td><?=(int)$B_as_monthly?></td>
<td><?=(int)$B_as_annual?></td>
<td><?=(int)$B_as_others?></td>
<td><?=(int)$B_as_no?></td>
<td><?=(int)$B_ps_cheque?></td>
<td><?=(int)$B_ps_cash_daily?></td>
<td><?=(int)$B_ps_cash_weekly?></td>
<td><?=(int)$B_ps_cash_monthly?></td>
<td><?=(int)$B_ps_cash_others?></td>
<td><?=(int)$B_ps_cash_not_app?></td>
<td><?=(int)$B_ps_other?></td>
</tr>

<!-- C -->
<tr>
  <td  align="left">Manufacturing</td>
  <td><?=(int)$C_total?></td>
  <td><?=(int)$C_mode_retail?></td>
  <td><?=(int)$C_mode_wholesale?></td>
  <td><?=(int)$C_mode_not_applicable?></td>
  <td><?=(int)$C_as_daily?></td>
  <td><?=(int)$C_as_monthly?></td>
  <td><?=(int)$C_as_annual?></td>
  <td><?=(int)$C_as_others?></td>
  <td><?=(int)$C_as_no?></td>
  <td><?=(int)$C_ps_cheque?></td>
  <td><?=(int)$C_ps_cash_daily?></td>
  <td><?=(int)$C_ps_cash_weekly?></td>
  <td><?=(int)$C_ps_cash_monthly?></td>
  <td><?=(int)$C_ps_cash_others?></td>
  <td><?=(int)$C_ps_cash_not_app?></td>
  <td><?=(int)$C_ps_other?></td>
</tr>

<!-- D -->
<tr>
  <td  align="left">Electricity, gas, steam and air conditioning supply</td>
  <td><?=(int)$D_total?></td>
  <td><?=(int)$D_mode_retail?></td>
  <td><?=(int)$D_mode_wholesale?></td>
  <td><?=(int)$D_mode_not_applicable?></td>
  <td><?=(int)$D_as_daily?></td>
  <td><?=(int)$D_as_monthly?></td>
  <td><?=(int)$D_as_annual?></td>
  <td><?=(int)$D_as_others?></td>
  <td><?=(int)$D_as_no?></td>
  <td><?=(int)$D_ps_cheque?></td>
  <td><?=(int)$D_ps_cash_daily?></td>
  <td><?=(int)$D_ps_cash_weekly?></td>
  <td><?=(int)$D_ps_cash_monthly?></td>
  <td><?=(int)$D_ps_cash_others?></td>
  <td><?=(int)$D_ps_cash_not_app?></td>
  <td><?=(int)$D_ps_other?></td>
</tr>

<!-- E -->
<tr>
  <td  align="left">Water supply, sewerage, waste management and remediation activities</td>
  <td><?=(int)$E_total?></td>
  <td><?=(int)$E_mode_retail?></td>
  <td><?=(int)$E_mode_wholesale?></td>
  <td><?=(int)$E_mode_not_applicable?></td>
  <td><?=(int)$E_as_daily?></td>
  <td><?=(int)$E_as_monthly?></td>
  <td><?=(int)$E_as_annual?></td>
  <td><?=(int)$E_as_others?></td>
  <td><?=(int)$E_as_no?></td>
  <td><?=(int)$E_ps_cheque?></td>
  <td><?=(int)$E_ps_cash_daily?></td>
  <td><?=(int)$E_ps_cash_weekly?></td>
  <td><?=(int)$E_ps_cash_monthly?></td>
  <td><?=(int)$E_ps_cash_others?></td>
  <td><?=(int)$E_ps_cash_not_app?></td>
  <td><?=(int)$E_ps_other?></td>
</tr>

<!-- F -->
<tr>
  <td  align="left">Construction</td>
  <td><?=(int)$F_total?></td>
<td><?=(int)$F_mode_retail?></td>
<td><?=(int)$F_mode_wholesale?></td>
<td><?=(int)$F_mode_not_applicable?></td>
<td><?=(int)$F_as_daily?></td>
<td><?=(int)$F_as_monthly?></td>
<td><?=(int)$F_as_annual?></td>
<td><?=(int)$F_as_others?></td>
<td><?=(int)$F_as_no?></td>
<td><?=(int)$F_ps_cheque?></td>
<td><?=(int)$F_ps_cash_daily?></td>
<td><?=(int)$F_ps_cash_weekly?></td>
<td><?=(int)$F_ps_cash_monthly?></td>
<td><?=(int)$F_ps_cash_others?></td>
<td><?=(int)$F_ps_cash_not_app?></td>
<td><?=(int)$F_ps_other?></td>
</tr>

<!-- G -->
<tr>
  <td  align="left">Wholesale and retail trade, repair of motor vehicles and motorcycles</td>
  <td><?=(int)$G_total?></td>
<td><?=(int)$G_mode_retail?></td>
<td><?=(int)$G_mode_wholesale?></td>
<td><?=(int)$G_mode_not_applicable?></td>
<td><?=(int)$G_as_daily?></td>
<td><?=(int)$G_as_monthly?></td>
<td><?=(int)$G_as_annual?></td>
<td><?=(int)$G_as_others?></td>
<td><?=(int)$G_as_no?></td>
<td><?=(int)$G_ps_cheque?></td>
<td><?=(int)$G_ps_cash_daily?></td>
<td><?=(int)$G_ps_cash_weekly?></td>
<td><?=(int)$G_ps_cash_monthly?></td>
<td><?=(int)$G_ps_cash_others?></td>
<td><?=(int)$G_ps_cash_not_app?></td>
<td><?=(int)$G_ps_other?></td>
</tr>

<!-- H -->
<tr>
  <td  align="left">Transportation and storage</td>
  <td><?=(int)$H_total?></td>
<td><?=(int)$H_mode_retail?></td>
<td><?=(int)$H_mode_wholesale?></td>
<td><?=(int)$H_mode_not_applicable?></td>
<td><?=(int)$H_as_daily?></td>
<td><?=(int)$H_as_monthly?></td>
<td><?=(int)$H_as_annual?></td>
<td><?=(int)$H_as_others?></td>
<td><?=(int)$H_as_no?></td>
<td><?=(int)$H_ps_cheque?></td>
<td><?=(int)$H_ps_cash_daily?></td>
<td><?=(int)$H_ps_cash_weekly?></td>
<td><?=(int)$H_ps_cash_monthly?></td>
<td><?=(int)$H_ps_cash_others?></td>
<td><?=(int)$H_ps_cash_not_app?></td>
<td><?=(int)$H_ps_other?></td>
</tr>

<!-- I -->
<tr>
  <td  align="left">Accommodation and food service activities (Hotel and restaurents)</td>
  <td><?=(int)$I_total?></td>
<td><?=(int)$I_mode_retail?></td>
<td><?=(int)$I_mode_wholesale?></td>
<td><?=(int)$I_mode_not_applicable?></td>
<td><?=(int)$I_as_daily?></td>
<td><?=(int)$I_as_monthly?></td>
<td><?=(int)$I_as_annual?></td>
<td><?=(int)$I_as_others?></td>
<td><?=(int)$I_as_no?></td>
<td><?=(int)$I_ps_cheque?></td>
<td><?=(int)$I_ps_cash_daily?></td>
<td><?=(int)$I_ps_cash_weekly?></td>
<td><?=(int)$I_ps_cash_monthly?></td>
<td><?=(int)$I_ps_cash_others?></td>
<td><?=(int)$I_ps_cash_not_app?></td>
<td><?=(int)$I_ps_other?></td>
</tr>

<!-- J -->
<tr>
  <td  align="left">Information and communication</td>
  <td><?=(int)$J_total?></td>
<td><?=(int)$J_mode_retail?></td>
<td><?=(int)$J_mode_wholesale?></td>
<td><?=(int)$J_mode_not_applicable?></td>
<td><?=(int)$J_as_daily?></td>
<td><?=(int)$J_as_monthly?></td>
<td><?=(int)$J_as_annual?></td>
<td><?=(int)$J_as_others?></td>
<td><?=(int)$J_as_no?></td>
<td><?=(int)$J_ps_cheque?></td>
<td><?=(int)$J_ps_cash_daily?></td>
<td><?=(int)$J_ps_cash_weekly?></td>
<td><?=(int)$J_ps_cash_monthly?></td>
<td><?=(int)$J_ps_cash_others?></td>
<td><?=(int)$J_ps_cash_not_app?></td>
<td><?=(int)$J_ps_other?></td>
</tr>


<!-- K -->
<tr>
  <td  align="left">Financial and insurance activities</td>
  <td><?=(int)$K_total?></td>
<td><?=(int)$K_mode_retail?></td>
<td><?=(int)$K_mode_wholesale?></td>
<td><?=(int)$K_mode_not_applicable?></td>
<td><?=(int)$K_as_daily?></td>
<td><?=(int)$K_as_monthly?></td>
<td><?=(int)$K_as_annual?></td>
<td><?=(int)$K_as_others?></td>
<td><?=(int)$K_as_no?></td>
<td><?=(int)$K_ps_cheque?></td>
<td><?=(int)$K_ps_cash_daily?></td>
<td><?=(int)$K_ps_cash_weekly?></td>
<td><?=(int)$K_ps_cash_monthly?></td>
<td><?=(int)$K_ps_cash_others?></td>
<td><?=(int)$K_ps_cash_not_app?></td>
<td><?=(int)$K_ps_other?></td>
</tr>

<!-- L -->
<tr>
  <td  align="left">Real state activities</td>
  <td><?=(int)$L_total?></td>
<td><?=(int)$L_mode_retail?></td>
<td><?=(int)$L_mode_wholesale?></td>
<td><?=(int)$L_mode_not_applicable?></td>
<td><?=(int)$L_as_daily?></td>
<td><?=(int)$L_as_monthly?></td>
<td><?=(int)$L_as_annual?></td>
<td><?=(int)$L_as_others?></td>
<td><?=(int)$L_as_no?></td>
<td><?=(int)$L_ps_cheque?></td>
<td><?=(int)$L_ps_cash_daily?></td>
<td><?=(int)$L_ps_cash_weekly?></td>
<td><?=(int)$L_ps_cash_monthly?></td>
<td><?=(int)$L_ps_cash_others?></td>
<td><?=(int)$L_ps_cash_not_app?></td>
<td><?=(int)$L_ps_other?></td>
</tr>

<!-- M -->
<tr>
  <td  align="left">Professional, scientific and technical activities</td>
  <td><?=(int)$M_total?></td>
<td><?=(int)$M_mode_retail?></td>
<td><?=(int)$M_mode_wholesale?></td>
<td><?=(int)$M_mode_not_applicable?></td>
<td><?=(int)$M_as_daily?></td>
<td><?=(int)$M_as_monthly?></td>
<td><?=(int)$M_as_annual?></td>
<td><?=(int)$M_as_others?></td>
<td><?=(int)$M_as_no?></td>
<td><?=(int)$M_ps_cheque?></td>
<td><?=(int)$M_ps_cash_daily?></td>
<td><?=(int)$M_ps_cash_weekly?></td>
<td><?=(int)$M_ps_cash_monthly?></td>
<td><?=(int)$M_ps_cash_others?></td>
<td><?=(int)$M_ps_cash_not_app?></td>
<td><?=(int)$M_ps_other?></td>
</tr>

<!-- N -->
<tr>
  <td  align="left">Administrative and support service activities</td>

  <td><?=(int)$N_total?></td>
<td><?=(int)$N_mode_retail?></td>
<td><?=(int)$N_mode_wholesale?></td>
<td><?=(int)$N_mode_not_applicable?></td>
<td><?=(int)$N_as_daily?></td>
<td><?=(int)$N_as_monthly?></td>
<td><?=(int)$N_as_annual?></td>
<td><?=(int)$N_as_others?></td>
<td><?=(int)$N_as_no?></td>
<td><?=(int)$N_ps_cheque?></td>
<td><?=(int)$N_ps_cash_daily?></td>
<td><?=(int)$N_ps_cash_weekly?></td>
<td><?=(int)$N_ps_cash_monthly?></td>
<td><?=(int)$N_ps_cash_others?></td>
<td><?=(int)$N_ps_cash_not_app?></td>
<td><?=(int)$N_ps_other?></td>
</tr>


<!-- O -->
<tr>
  <td  align="left">Public administration and defence, compulsory social security</td>
  <td><?=(int)$O_total?></td>
<td><?=(int)$O_mode_retail?></td>
<td><?=(int)$O_mode_wholesale?></td>
<td><?=(int)$O_mode_not_applicable?></td>
<td><?=(int)$O_as_daily?></td>
<td><?=(int)$O_as_monthly?></td>
<td><?=(int)$O_as_annual?></td>
<td><?=(int)$O_as_others?></td>
<td><?=(int)$O_as_no?></td>
<td><?=(int)$O_ps_cheque?></td>
<td><?=(int)$O_ps_cash_daily?></td>
<td><?=(int)$O_ps_cash_weekly?></td>
<td><?=(int)$O_ps_cash_monthly?></td>
<td><?=(int)$O_ps_cash_others?></td>
<td><?=(int)$O_ps_cash_not_app?></td>
<td><?=(int)$O_ps_other?></td>
</tr>

<!-- P -->
<tr>
  <td  align="left">Education</td>
  <td><?=(int)$P_total?></td>
<td><?=(int)$P_mode_retail?></td>
<td><?=(int)$P_mode_wholesale?></td>
<td><?=(int)$P_mode_not_applicable?></td>
<td><?=(int)$P_as_daily?></td>
<td><?=(int)$P_as_monthly?></td>
<td><?=(int)$P_as_annual?></td>
<td><?=(int)$P_as_others?></td>
<td><?=(int)$P_as_no?></td>
<td><?=(int)$P_ps_cheque?></td>
<td><?=(int)$P_ps_cash_daily?></td>
<td><?=(int)$P_ps_cash_weekly?></td>
<td><?=(int)$P_ps_cash_monthly?></td>
<td><?=(int)$P_ps_cash_others?></td>
<td><?=(int)$P_ps_cash_not_app?></td>
<td><?=(int)$P_ps_other?></td>
</tr>


<!-- Q -->
<tr>
  <td  align="left">Human health and social work activities</td>
  <td><?=(int)$Q_total?></td>
<td><?=(int)$Q_mode_retail?></td>
<td><?=(int)$Q_mode_wholesale?></td>
<td><?=(int)$Q_mode_not_applicable?></td>
<td><?=(int)$Q_as_daily?></td>
<td><?=(int)$Q_as_monthly?></td>
<td><?=(int)$Q_as_annual?></td>
<td><?=(int)$Q_as_others?></td>
<td><?=(int)$Q_as_no?></td>
<td><?=(int)$Q_ps_cheque?></td>
<td><?=(int)$Q_ps_cash_daily?></td>
<td><?=(int)$Q_ps_cash_weekly?></td>
<td><?=(int)$Q_ps_cash_monthly?></td>
<td><?=(int)$Q_ps_cash_others?></td>
<td><?=(int)$Q_ps_cash_not_app?></td>
<td><?=(int)$Q_ps_other?></td>
</tr>


<!-- R -->
<tr>
  <td  align="left">Art, entertainment and recreation</td>
  <td><?=(int)$R_total?></td>
<td><?=(int)$R_mode_retail?></td>
<td><?=(int)$R_mode_wholesale?></td>
<td><?=(int)$R_mode_not_applicable?></td>
<td><?=(int)$R_as_daily?></td>
<td><?=(int)$R_as_monthly?></td>
<td><?=(int)$R_as_annual?></td>
<td><?=(int)$R_as_others?></td>
<td><?=(int)$R_as_no?></td>
<td><?=(int)$R_ps_cheque?></td>
<td><?=(int)$R_ps_cash_daily?></td>
<td><?=(int)$R_ps_cash_weekly?></td>
<td><?=(int)$R_ps_cash_monthly?></td>
<td><?=(int)$R_ps_cash_others?></td>
<td><?=(int)$R_ps_cash_not_app?></td>
<td><?=(int)$R_ps_other?></td>
</tr>


<!-- S -->
<tr>
  <td  align="left">Other service activities</td>
  <td><?=(int)$S_total?></td>
<td><?=(int)$S_mode_retail?></td>
<td><?=(int)$S_mode_wholesale?></td>
<td><?=(int)$S_mode_not_applicable?></td>
<td><?=(int)$S_as_daily?></td>
<td><?=(int)$S_as_monthly?></td>
<td><?=(int)$S_as_annual?></td>
<td><?=(int)$S_as_others?></td>
<td><?=(int)$S_as_no?></td>
<td><?=(int)$S_ps_cheque?></td>
<td><?=(int)$S_ps_cash_daily?></td>
<td><?=(int)$S_ps_cash_weekly?></td>
<td><?=(int)$S_ps_cash_monthly?></td>
<td><?=(int)$S_ps_cash_others?></td>
<td><?=(int)$S_ps_cash_not_app?></td>
<td><?=(int)$S_ps_other?></td>
</tr>

<!-- T -->
<tr>
  <td  align="left">Activities of households as employers, undifferentiated goods and services producing activities of households for own use</td>
  <td><?=(int)$T_total?></td>
<td><?=(int)$T_mode_retail?></td>
<td><?=(int)$T_mode_wholesale?></td>
<td><?=(int)$T_mode_not_applicable?></td>
<td><?=(int)$T_as_daily?></td>
<td><?=(int)$T_as_monthly?></td>
<td><?=(int)$T_as_annual?></td>
<td><?=(int)$T_as_others?></td>
<td><?=(int)$T_as_no?></td>
<td><?=(int)$T_ps_cheque?></td>
<td><?=(int)$T_ps_cash_daily?></td>
<td><?=(int)$T_ps_cash_weekly?></td>
<td><?=(int)$T_ps_cash_monthly?></td>
<td><?=(int)$T_ps_cash_others?></td>
<td><?=(int)$T_ps_cash_not_app?></td>
<td><?=(int)$T_ps_other?></td>
</tr>

<!-- U -->
<tr>
  <td  align="left">Activities of extraterritorial organizations and bodies</td>
<td><?=(int)$U_total?></td>
<td><?=(int)$U_mode_retail?></td>
<td><?=(int)$U_mode_wholesale?></td>
<td><?=(int)$U_mode_not_applicable?></td>
<td><?=(int)$U_as_daily?></td>
<td><?=(int)$U_as_monthly?></td> 
<td><?=(int)$U_as_annual?></td>
<td><?=(int)$U_as_others?></td>
<td><?=(int)$U_as_no?></td>
<td><?=(int)$U_ps_cheque?></td>
<td><?=(int)$U_ps_cash_daily?></td>
<td><?=(int)$U_ps_cash_weekly?></td>
<td><?=(int)$U_ps_cash_monthly?></td>
<td><?=(int)$U_ps_cash_others?></td>
<td><?=(int)$U_ps_cash_not_app?></td>
<td><?=(int)$U_ps_other?></td>
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