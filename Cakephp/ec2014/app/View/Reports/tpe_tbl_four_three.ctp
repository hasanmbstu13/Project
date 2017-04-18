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
          <td colspan="8"><b>Table 4.3: Percentage Distribution of Establishment & Total Persons Engaged (TPE) by Location & Economic Activity in 2013</b></td>
  </tr>
 <tr>
  <td rowspan=2 >
  Section
  </td>
  <td rowspan=2 >Economic Activity</td>
  <td colspan=3 >Establishment</td>
  <td colspan=3>Total Persons Engaged (TPE)</td>
 </tr>

 <tr >
  <td >Total</td>
  <td>Urban</td>
  <td >Rural</td>
  <td>Total</td>
  <td >Urban</td>
  <td >Rural</td>
 </tr>

 <tr>
  <td >1</td>
  <td>2</td>
  <td >3</td>
  <td >4</td>
  <td>5</td>
  <td >6</td>
  <td >7</td>
  <td >8</td>
 </tr>

<!-- Eastablishment Total -->
<?php

$Total_Estab = $A_Total_Estab+$B_Total_Estab+$C_Total_Estab+$D_Total_Estab+$E_Total_Estab+$F_Total_Estab+$G_Total_Estab+$H_Total_Estab+$I_Total_Estab+$J_Total_Estab+$K_Total_Estab+$L_Total_Estab+$M_Total_Estab+$N_Total_Estab+$O_Total_Estab+$P_Total_Estab+$Q_Total_Estab+$R_Total_Estab+$S_Total_Estab+$T_Total_Estab+$U_Total_Estab; 

$Total_Person =$A_Total_Person+$B_Total_Person+$C_Total_Person+$D_Total_Person+$E_Total_Person+$F_Total_Person+$G_Total_Person+$H_Total_Person+$I_Total_Person+$J_Total_Person+$K_Total_Person+$L_Total_Person+$M_Total_Person+$N_Total_Person+$O_Total_Person+$P_Total_Person+$Q_Total_Person+$R_Total_Person+$S_Total_Person+$T_Total_Person+$U_Total_Person;

# Total Calc

$A_percent_Estab = round((($A_Total_Estab / $Total_Estab) * 100), 2);
$B_percent_Estab = round((($B_Total_Estab / $Total_Estab) * 100), 2);
$C_percent_Estab = round((($C_Total_Estab / $Total_Estab) * 100), 2);
$D_percent_Estab = round((($D_Total_Estab / $Total_Estab) * 100), 2);
$E_percent_Estab = round((($E_Total_Estab / $Total_Estab) * 100), 2);
$F_percent_Estab = round((($F_Total_Estab / $Total_Estab) * 100), 2);
$G_percent_Estab = round((($G_Total_Estab / $Total_Estab) * 100), 2);
$H_percent_Estab = round((($H_Total_Estab / $Total_Estab) * 100), 2);
$I_percent_Estab = round((($I_Total_Estab / $Total_Estab) * 100), 2);
$J_percent_Estab = round((($J_Total_Estab / $Total_Estab) * 100), 2);
$K_percent_Estab = round((($K_Total_Estab / $Total_Estab) * 100), 2);
$L_percent_Estab = round((($L_Total_Estab / $Total_Estab) * 100), 2);
$M_percent_Estab = round((($M_Total_Estab / $Total_Estab) * 100), 2);
$N_percent_Estab = round((($N_Total_Estab / $Total_Estab) * 100), 2);
$O_percent_Estab = round((($O_Total_Estab / $Total_Estab) * 100), 2);
$P_percent_Estab = round((($P_Total_Estab / $Total_Estab) * 100), 2);
$Q_percent_Estab = round((($Q_Total_Estab / $Total_Estab) * 100), 2);
$R_percent_Estab = round((($R_Total_Estab / $Total_Estab) * 100), 2);
$S_percent_Estab = round((($S_Total_Estab / $Total_Estab) * 100), 2);
$T_percent_Estab = round((($T_Total_Estab / $Total_Estab) * 100), 2);
$U_percent_Estab = round((($U_Total_Estab / $Total_Estab) * 100), 2);

$Total_percent_Estab = $A_percent_Estab+$B_percent_Estab+$C_percent_Estab+$D_percent_Estab+$E_percent_Estab+$F_percent_Estab+$G_percent_Estab+$H_percent_Estab+$I_percent_Estab+$J_percent_Estab+$K_percent_Estab+$L_percent_Estab+$M_percent_Estab+$N_percent_Estab+$O_percent_Estab+$P_percent_Estab+$Q_percent_Estab+$R_percent_Estab+$S_percent_Estab+$T_percent_Estab+$U_percent_Estab ;

#Urban Calc-------------------------------------------------------------------------------------

$A_percent_Estab_Urban = round((($A_Total_Estab_Urban / $Total_Estab) * 100), 2);
$B_percent_Estab_Urban = round((($B_Total_Estab_Urban / $Total_Estab) * 100), 2);
$C_percent_Estab_Urban = round((($C_Total_Estab_Urban / $Total_Estab) * 100), 2);
$D_percent_Estab_Urban = round((($D_Total_Estab_Urban / $Total_Estab) * 100), 2);
$E_percent_Estab_Urban = round((($E_Total_Estab_Urban / $Total_Estab) * 100), 2);
$F_percent_Estab_Urban = round((($F_Total_Estab_Urban / $Total_Estab) * 100), 2);
$G_percent_Estab_Urban = round((($G_Total_Estab_Urban / $Total_Estab) * 100), 2);
$H_percent_Estab_Urban = round((($H_Total_Estab_Urban / $Total_Estab) * 100), 2);
$I_percent_Estab_Urban = round((($I_Total_Estab_Urban / $Total_Estab) * 100), 2);
$J_percent_Estab_Urban = round((($J_Total_Estab_Urban / $Total_Estab) * 100), 2);
$K_percent_Estab_Urban = round((($K_Total_Estab_Urban / $Total_Estab) * 100), 2);
$L_percent_Estab_Urban = round((($L_Total_Estab_Urban / $Total_Estab) * 100), 2);
$M_percent_Estab_Urban = round((($M_Total_Estab_Urban / $Total_Estab) * 100), 2);
$N_percent_Estab_Urban = round((($N_Total_Estab_Urban / $Total_Estab) * 100), 2);
$O_percent_Estab_Urban = round((($O_Total_Estab_Urban / $Total_Estab) * 100), 2);
$P_percent_Estab_Urban = round((($P_Total_Estab_Urban / $Total_Estab) * 100), 2);
$Q_percent_Estab_Urban = round((($Q_Total_Estab_Urban / $Total_Estab) * 100), 2);
$R_percent_Estab_Urban = round((($R_Total_Estab_Urban / $Total_Estab) * 100), 2);
$S_percent_Estab_Urban = round((($S_Total_Estab_Urban / $Total_Estab) * 100), 2);
$T_percent_Estab_Urban = round((($T_Total_Estab_Urban / $Total_Estab) * 100), 2);
$U_percent_Estab_Urban = round((($U_Total_Estab_Urban / $Total_Estab) * 100), 2);

$Total_percent_Estab_Urban = $A_percent_Estab_Urban+$B_percent_Estab_Urban+$C_percent_Estab_Urban+$D_percent_Estab_Urban+$E_percent_Estab_Urban+$F_percent_Estab_Urban+$G_percent_Estab_Urban+$H_percent_Estab_Urban+$I_percent_Estab_Urban+$J_percent_Estab_Urban+$K_percent_Estab_Urban+$L_percent_Estab_Urban+$M_percent_Estab_Urban+$N_percent_Estab_Urban+$O_percent_Estab_Urban+$P_percent_Estab_Urban+$Q_percent_Estab_Urban+$R_percent_Estab_Urban+$S_percent_Estab_Urban+$T_percent_Estab_Urban+$U_percent_Estab_Urban ;


#Rural calc

$A_percent_Estab_Rural = round((($A_Total_Estab_Rural / $Total_Estab) * 100), 2);
$B_percent_Estab_Rural = round((($B_Total_Estab_Rural / $Total_Estab) * 100), 2);
$C_percent_Estab_Rural = round((($C_Total_Estab_Rural / $Total_Estab) * 100), 2);
$D_percent_Estab_Rural = round((($D_Total_Estab_Rural / $Total_Estab) * 100), 2);
$E_percent_Estab_Rural = round((($E_Total_Estab_Rural / $Total_Estab) * 100), 2);
$F_percent_Estab_Rural = round((($F_Total_Estab_Rural / $Total_Estab) * 100), 2);
$G_percent_Estab_Rural = round((($G_Total_Estab_Rural / $Total_Estab) * 100), 2);
$H_percent_Estab_Rural = round((($H_Total_Estab_Rural / $Total_Estab) * 100), 2);
$I_percent_Estab_Rural = round((($I_Total_Estab_Rural / $Total_Estab) * 100), 2);
$J_percent_Estab_Rural = round((($J_Total_Estab_Rural / $Total_Estab) * 100), 2);
$K_percent_Estab_Rural = round((($K_Total_Estab_Rural / $Total_Estab) * 100), 2);
$L_percent_Estab_Rural = round((($L_Total_Estab_Rural / $Total_Estab) * 100), 2);
$M_percent_Estab_Rural = round((($M_Total_Estab_Rural / $Total_Estab) * 100), 2);
$N_percent_Estab_Rural = round((($N_Total_Estab_Rural / $Total_Estab) * 100), 2);
$O_percent_Estab_Rural = round((($O_Total_Estab_Rural / $Total_Estab) * 100), 2);
$P_percent_Estab_Rural = round((($P_Total_Estab_Rural / $Total_Estab) * 100), 2);
$Q_percent_Estab_Rural = round((($Q_Total_Estab_Rural / $Total_Estab) * 100), 2);
$R_percent_Estab_Rural = round((($R_Total_Estab_Rural / $Total_Estab) * 100), 2);
$S_percent_Estab_Rural = round((($S_Total_Estab_Rural / $Total_Estab) * 100), 2);
$T_percent_Estab_Rural = round((($T_Total_Estab_Rural / $Total_Estab) * 100), 2);
$U_percent_Estab_Rural = round((($U_Total_Estab_Rural / $Total_Estab) * 100), 2);

$Total_percent_Estab_Rural = $A_percent_Estab_Rural+$B_percent_Estab_Rural+$C_percent_Estab_Rural+$D_percent_Estab_Rural+$E_percent_Estab_Rural+$F_percent_Estab_Rural+$G_percent_Estab_Rural+$H_percent_Estab_Rural+$I_percent_Estab_Rural+$J_percent_Estab_Rural+$K_percent_Estab_Rural+$L_percent_Estab_Rural+$M_percent_Estab_Rural+$N_percent_Estab_Rural+$O_percent_Estab_Rural+$P_percent_Estab_Rural+$Q_percent_Estab_Rural+$R_percent_Estab_Rural+$S_percent_Estab_Rural+$T_percent_Estab_Rural+$U_percent_Estab_Rural ;




#Person calc

$A_percent_Person = round((($A_Total_Person / $Total_Person) * 100), 2);
$B_percent_Person = round((($B_Total_Person / $Total_Person) * 100), 2);
$C_percent_Person = round((($C_Total_Person / $Total_Person) * 100), 2);
$D_percent_Person = round((($D_Total_Person / $Total_Person) * 100), 2);
$E_percent_Person = round((($E_Total_Person / $Total_Person) * 100), 2);
$F_percent_Person = round((($F_Total_Person / $Total_Person) * 100), 2);
$G_percent_Person = round((($G_Total_Person / $Total_Person) * 100), 2);
$H_percent_Person = round((($H_Total_Person / $Total_Person) * 100), 2);
$I_percent_Person = round((($I_Total_Person / $Total_Person) * 100), 2);
$J_percent_Person = round((($J_Total_Person / $Total_Person) * 100), 2);
$K_percent_Person = round((($K_Total_Person / $Total_Person) * 100), 2);
$L_percent_Person = round((($L_Total_Person / $Total_Person) * 100), 2);
$M_percent_Person = round((($M_Total_Person / $Total_Person) * 100), 2);
$N_percent_Person = round((($N_Total_Person / $Total_Person) * 100), 2);
$O_percent_Person = round((($O_Total_Person / $Total_Person) * 100), 2);
$P_percent_Person = round((($P_Total_Person / $Total_Person) * 100), 2);
$Q_percent_Person = round((($Q_Total_Person / $Total_Person) * 100), 2);
$R_percent_Person = round((($R_Total_Person / $Total_Person) * 100), 2);
$S_percent_Person = round((($S_Total_Person / $Total_Person) * 100), 2);
$T_percent_Person = round((($T_Total_Person / $Total_Person) * 100), 2);
$U_percent_Person = round((($U_Total_Person / $Total_Person) * 100), 2);

$Total_percent_Person = $A_percent_Person+$B_percent_Person+$C_percent_Person+$D_percent_Person+$E_percent_Person+$F_percent_Person+$G_percent_Person+$H_percent_Person+$I_percent_Person+$J_percent_Person+$K_percent_Person+$L_percent_Person+$M_percent_Person+$N_percent_Person+$O_percent_Person+$P_percent_Person+$Q_percent_Person+$R_percent_Person+$S_percent_Person+$T_percent_Person+$U_percent_Person ;



#Person Urban

$A_percent_Person_Urban = round((($A_Total_Person_Urban / $Total_Person) * 100), 2);
$B_percent_Person_Urban = round((($B_Total_Person_Urban / $Total_Person) * 100), 2);
$C_percent_Person_Urban = round((($C_Total_Person_Urban / $Total_Person) * 100), 2);
$D_percent_Person_Urban = round((($D_Total_Person_Urban / $Total_Person) * 100), 2);
$E_percent_Person_Urban = round((($E_Total_Person_Urban / $Total_Person) * 100), 2);
$F_percent_Person_Urban = round((($F_Total_Person_Urban / $Total_Person) * 100), 2);
$G_percent_Person_Urban = round((($G_Total_Person_Urban / $Total_Person) * 100), 2);
$H_percent_Person_Urban = round((($H_Total_Person_Urban / $Total_Person) * 100), 2);
$I_percent_Person_Urban = round((($I_Total_Person_Urban / $Total_Person) * 100), 2);
$J_percent_Person_Urban = round((($J_Total_Person_Urban / $Total_Person) * 100), 2);
$K_percent_Person_Urban = round((($K_Total_Person_Urban / $Total_Person) * 100), 2);
$L_percent_Person_Urban = round((($L_Total_Person_Urban / $Total_Person) * 100), 2);
$M_percent_Person_Urban = round((($M_Total_Person_Urban / $Total_Person) * 100), 2);
$N_percent_Person_Urban = round((($N_Total_Person_Urban / $Total_Person) * 100), 2);
$O_percent_Person_Urban = round((($O_Total_Person_Urban / $Total_Person) * 100), 2);
$P_percent_Person_Urban = round((($P_Total_Person_Urban / $Total_Person) * 100), 2);
$Q_percent_Person_Urban = round((($Q_Total_Person_Urban / $Total_Person) * 100), 2);
$R_percent_Person_Urban = round((($R_Total_Person_Urban / $Total_Person) * 100), 2);
$S_percent_Person_Urban = round((($S_Total_Person_Urban / $Total_Person) * 100), 2);
$T_percent_Person_Urban = round((($T_Total_Person_Urban / $Total_Person) * 100), 2);
$U_percent_Person_Urban = round((($U_Total_Person_Urban / $Total_Person) * 100), 2);

$Total_percent_Person_Urban = $A_percent_Person_Urban+$B_percent_Person_Urban+$C_percent_Person_Urban+$D_percent_Person_Urban+$E_percent_Person_Urban+$F_percent_Person_Urban+$G_percent_Person_Urban+$H_percent_Person_Urban+$I_percent_Person_Urban+$J_percent_Person_Urban+$K_percent_Person_Urban+$L_percent_Person_Urban+$M_percent_Person_Urban+$N_percent_Person_Urban+$O_percent_Person_Urban+$P_percent_Person_Urban+$Q_percent_Person_Urban+$R_percent_Person_Urban+$S_percent_Person_Urban+$T_percent_Person_Urban+$U_percent_Person_Urban;

#Person rural


$A_percent_Person_Rural = round((($A_Total_Person_Rural / $Total_Person) * 100), 2);
$B_percent_Person_Rural = round((($B_Total_Person_Rural / $Total_Person) * 100), 2);
$C_percent_Person_Rural = round((($C_Total_Person_Rural / $Total_Person) * 100), 2);
$D_percent_Person_Rural = round((($D_Total_Person_Rural / $Total_Person) * 100), 2);
$E_percent_Person_Rural = round((($E_Total_Person_Rural / $Total_Person) * 100), 2);
$F_percent_Person_Rural = round((($F_Total_Person_Rural / $Total_Person) * 100), 2);
$G_percent_Person_Rural = round((($G_Total_Person_Rural / $Total_Person) * 100), 2);
$H_percent_Person_Rural = round((($H_Total_Person_Rural / $Total_Person) * 100), 2);
$I_percent_Person_Rural = round((($I_Total_Person_Rural / $Total_Person) * 100), 2);
$J_percent_Person_Rural = round((($J_Total_Person_Rural / $Total_Person) * 100), 2);
$K_percent_Person_Rural = round((($K_Total_Person_Rural / $Total_Person) * 100), 2);
$L_percent_Person_Rural = round((($L_Total_Person_Rural / $Total_Person) * 100), 2);
$M_percent_Person_Rural = round((($M_Total_Person_Rural / $Total_Person) * 100), 2);
$N_percent_Person_Rural = round((($N_Total_Person_Rural / $Total_Person) * 100), 2);
$O_percent_Person_Rural = round((($O_Total_Person_Rural / $Total_Person) * 100), 2);
$P_percent_Person_Rural = round((($P_Total_Person_Rural / $Total_Person) * 100), 2);
$Q_percent_Person_Rural = round((($Q_Total_Person_Rural / $Total_Person) * 100), 2);
$R_percent_Person_Rural = round((($R_Total_Person_Rural / $Total_Person) * 100), 2);
$S_percent_Person_Rural = round((($S_Total_Person_Rural / $Total_Person) * 100), 2);
$T_percent_Person_Rural = round((($T_Total_Person_Rural / $Total_Person) * 100), 2);
$U_percent_Person_Rural = round((($U_Total_Person_Rural / $Total_Person) * 100), 2);

$Total_percent_Person_Rural = $A_percent_Person_Rural+$B_percent_Person_Rural+$C_percent_Person_Rural+$D_percent_Person_Rural+$E_percent_Person_Rural+$F_percent_Person_Rural+$G_percent_Person_Rural+$H_percent_Person_Rural+$I_percent_Person_Rural+$J_percent_Person_Rural+$K_percent_Person_Rural+$L_percent_Person_Rural+$M_percent_Person_Rural+$N_percent_Person_Rural+$O_percent_Person_Rural+$P_percent_Person_Rural+$Q_percent_Person_Rural+$R_percent_Person_Rural+$S_percent_Person_Rural+$T_percent_Person_Rural+$U_percent_Person_Rural ;



?>

  <!-- <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?=$A_percent_Estab ; ?></td>
  <td><?=$A_percent_Estab_Urban ;?></td>
  <td><?=$A_percent_Estab_Rural ;?></td>
  <td><?=$A_percent_Person ;?></td>
  <td><?=$A_percent_Person_Urban ;?></td>
  <td><?=$A_percent_Person_Rural ;?></td>
   </tr> -->

   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?=$B_percent_Estab; ?></td>
  <td><?=$B_percent_Estab_Urban ;?></td>
  <td><?=$B_percent_Estab_Rural ;?></td>
  <td><?=$B_percent_Person ;?></td>
  <td><?=$B_percent_Person_Urban ;?></td>
  <td><?=$B_percent_Person_Rural ;?></td>
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?=$C_percent_Estab; ?></td>
  <td><?=$C_percent_Estab_Urban;?></td>
  <td><?=$C_percent_Estab_Rural ;?></td>
  <td><?=$C_percent_Person ;?></td>
  <td><?=$C_percent_Person_Urban ;?></td>
  <td><?=$C_percent_Person_Rural ;?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?=$D_percent_Estab; ?></td>
  <td><?=$D_percent_Estab_Urban;?></td>
  <td><?=$D_percent_Estab_Rural;?></td>
  <td><?=$D_percent_Person ;?></td>
  <td><?=$D_percent_Person_Urban ;?></td>
  <td><?=$D_percent_Person_Rural ;?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?=$E_percent_Estab; ?></td>
  <td><?=$E_percent_Estab_Urban;?></td>
  <td><?=$E_percent_Estab_Rural ;?></td>
  <td><?=$E_percent_Person ;?></td>
  <td><?=$E_percent_Person_Urban ;?></td>
  <td><?=$E_percent_Person_Rural ;?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?=$F_percent_Estab; ?></td>
  <td><?=$F_percent_Estab_Urban;?></td>
  <td><?=$F_percent_Estab_Rural ;?></td>
  <td><?=$F_percent_Person ;?></td>
  <td><?=$F_percent_Person_Urban ;?></td>
  <td><?=$F_percent_Person_Rural ;?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?=$G_percent_Estab; ?></td>
  <td><?=$G_percent_Estab_Urban;?></td>
  <td><?=$G_percent_Estab_Rural ;?></td>
  <td><?=$G_percent_Person ;?></td>
  <td><?=$G_percent_Person_Urban ;?></td>
  <td><?=$G_percent_Person_Rural ;?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?=$H_percent_Estab; ?></td>
  <td><?=$H_percent_Estab_Urban;?></td>
  <td><?=$H_percent_Estab_Rural ;?></td>
  <td><?=$H_percent_Person;?></td>
  <td><?=$H_percent_Person_Urban;?></td>
  <td><?=$H_percent_Person_Rural;?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
  <td><?=$I_percent_Estab; ?></td>
  <td><?=$I_percent_Estab_Urban ;?></td>
  <td><?=$I_percent_Estab_Rural ;?></td>
  <td><?=$I_percent_Person ;?></td>
  <td><?=$I_percent_Person_Urban ;?></td>
  <td><?=$I_percent_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?=$J_percent_Estab ; ?></td>
  <td><?=$J_percent_Estab_Urban ;?></td>
  <td><?=$J_percent_Estab_Rural ;?></td>
  <td><?=$J_percent_Person ;?></td>
  <td><?=$J_percent_Person_Urban ;?></td>
  <td><?=$J_percent_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?=$K_percent_Estab; ?></td>
  <td><?=$K_percent_Estab_Urban ;?></td>
  <td><?=$K_percent_Estab_Rural ;?></td>
  <td><?=$K_percent_Person ;?></td>
  <td><?=$K_percent_Person_Urban ;?></td>
  <td><?=$K_percent_Person_Rural ;?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate Activities</td>
  <td><?=$L_percent_Estab; ?></td>
  <td><?=$L_percent_Estab_Urban ;?></td>
  <td><?=$L_percent_Estab_Rural ;?></td>
  <td><?=$L_percent_Person ;?></td>
  <td><?=$L_percent_Person_Urban ;?></td>
  <td><?=$L_percent_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?=$M_percent_Estab; ?></td>
  <td><?=$M_percent_Estab_Urban ;?></td>
  <td><?=$M_percent_Estab_Rural ;?></td>
  <td><?=$M_percent_Person ;?></td>
  <td><?=$M_percent_Person_Urban ;?></td>
  <td><?=$M_percent_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?=$N_percent_Estab ; ?></td>
  <td><?=$N_percent_Estab_Urban ;?></td>
  <td><?=$N_percent_Estab_Rural ;?></td>
  <td><?=$N_percent_Person ;?></td>
  <td><?=$N_percent_Person_Urban ;?></td>
  <td><?=$N_percent_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defense, Compulsory Social Security</td>
  <td><?=$O_percent_Estab; ?></td>
  <td><?=$O_percent_Estab_Urban ;?></td>
  <td><?=$O_percent_Estab_Rural ;?></td>
  <td><?=$O_percent_Person ;?></td>
  <td><?=$O_percent_Person_Urban ;?></td>
  <td><?=$O_percent_Person_Rural ;?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?=$P_percent_Estab; ?></td>
  <td><?=$P_percent_Estab_Urban ;?></td>
  <td><?=$P_percent_Estab_Rural ;?></td>
  <td><?=$P_percent_Person ;?></td>
  <td><?=$P_percent_Person_Urban ;?></td>
  <td><?=$P_percent_Person_Rural ;?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?=$Q_percent_Estab; ?></td>
  <td><?=$Q_percent_Estab_Urban ;?></td>
  <td><?=$Q_percent_Estab_Rural ;?></td>
  <td><?=$Q_percent_Person ;?></td>
  <td><?=$Q_percent_Person_Urban ;?></td>
  <td><?=$Q_percent_Person_Rural ;?></td>
 </tr>



     <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
  <td><?=$R_percent_Estab; ?></td>
  <td><?=$R_percent_Estab_Urban ;?></td>
  <td><?=$R_percent_Estab_Rural ;?></td>
  <td><?=$R_percent_Person ;?></td>
  <td><?=$R_percent_Person_Urban ;?></td>
  <td><?=$R_percent_Person_Rural ;?></td>
 </tr>



  <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?=$S_percent_Estab; ?></td>
  <td><?=$S_percent_Estab_Urban ;?></td>
  <td><?=$S_percent_Estab_Rural ;?></td>
  <td><?=$S_percent_Person ;?></td>
  <td><?=$S_percent_Person_Urban ;?></td>
  <td><?=$S_percent_Person_Rural ;?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?=$T_percent_Estab; ?></td>
  <td><?=$T_percent_Estab_Urban ;?></td>
  <td><?=$T_percent_Estab_Rural ;?></td>
  <td><?=$T_percent_Person ;?></td>
  <td><?=$T_percent_Person_Urban ;?></td>
  <td><?=$T_percent_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?=$U_percent_Estab ; ?></td>
  <td><?=$U_percent_Estab_Urban ;?></td>
  <td><?=$U_percent_Estab_Rural ;?></td>
  <td><?=$U_percent_Person ;?></td>
  <td><?=$U_percent_Person_Urban ;?></td>
  <td><?=$U_percent_Person_Rural ;?></td>
 </tr>


  <tr>
  <td></td>
  <td align="left">TOTAL</td>
  <td><?=$Total_percent_Estab;?></td>

  <td><?=$Total_percent_Estab_Urban;?></td>

  <td><?=$Total_percent_Estab_Rural; ?></td>

  <td><?=$Total_percent_Person; ?></td>

  <td><?=$Total_percent_Person_Urban;?></td>

  <td><?=$Total_percent_Person_Rural;?></td>
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





