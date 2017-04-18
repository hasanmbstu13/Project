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
    <td colspan="10"><b>Table 4.6: Total Establishment and Total Persons Engaged (TPE) by Type of Establishment & Economic Activity in 2013</b></td>
  </tr>
<tr>
  <td  rowspan=2 >Section</td>
  <td  rowspan=2 >Economic Activity</td>
  <td  colspan=4>Estab.</td>
  <td  colspan=4 >Total Persons Engaged (TPE)</td>
</tr>

 <tr >
  <td >Total</td>
  <td >Permanent</td>
  <td >Temporary</td>
  <td >Economic Household</td>
  <td >Total</td>
  <td >Permanent</td>
  <td >Temporary</td>
  <td >Economic household</td>
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
 </tr>


 <?php

 $Total_Unit = $A_Total_unit + $B_Total_unit + $C_Total_unit + $D_Total_unit + $E_Total_unit + $F_Total_unit + 
 $G_Total_unit + $H_Total_unit + $I_Total_unit + $J_Total_unit + $K_Total_unit + $L_Total_unit + $M_Total_unit + 
 $N_Total_unit + $O_Total_unit + $P_Total_unit + $Q_Total_unit + $R_Total_unit + $S_Total_unit + $T_Total_unit +
 $U_Total_unit;
 
  $Total_Unit_Parmanent = $A_Total_Unit_Parmanent + $B_Total_Unit_Parmanent + $C_Total_Unit_Parmanent + $D_Total_Unit_Parmanent + $E_Total_Unit_Parmanent + $F_Total_Unit_Parmanent + 
 $G_Total_Unit_Parmanent + $H_Total_Unit_Parmanent + $I_Total_Unit_Parmanent + $J_Total_Unit_Parmanent + $K_Total_Unit_Parmanent + $L_Total_Unit_Parmanent + $M_Total_Unit_Parmanent + 
 $N_Total_Unit_Parmanent + $O_Total_Unit_Parmanent + $P_Total_Unit_Parmanent + $Q_Total_Unit_Parmanent + $R_Total_Unit_Parmanent + $S_Total_Unit_Parmanent + $T_Total_Unit_Parmanent +
 $U_Total_Unit_Parmanent;
 
 $Total_Unit_Temporary = $A_Total_Unit_Temporary + $B_Total_Unit_Temporary + $C_Total_Unit_Temporary + $D_Total_Unit_Temporary + $E_Total_Unit_Temporary + $F_Total_Unit_Temporary + 
 $G_Total_Unit_Temporary + $H_Total_Unit_Temporary + $I_Total_Unit_Temporary + $J_Total_Unit_Temporary + $K_Total_Unit_Temporary + $L_Total_Unit_Temporary + $M_Total_Unit_Temporary + 
 $N_Total_Unit_Temporary + $O_Total_Unit_Temporary + $P_Total_Unit_Temporary + $Q_Total_Unit_Temporary + $R_Total_Unit_Temporary + $S_Total_Unit_Temporary + $T_Total_Unit_Temporary +
 $U_Total_Unit_Temporary;
 
 $Total_Unit_Household= $A_Total_Unit_Household + $B_Total_Unit_Household + $C_Total_Unit_Household + $D_Total_Unit_Household + $E_Total_Unit_Household + $F_Total_Unit_Household + 
 $G_Total_Unit_Household + $H_Total_Unit_Household + $I_Total_Unit_Household + $J_Total_Unit_Household + $K_Total_Unit_Household + $L_Total_Unit_Household + $M_Total_Unit_Household + 
 $N_Total_Unit_Household + $O_Total_Unit_Household + $P_Total_Unit_Household + $Q_Total_Unit_Household + $R_Total_Unit_Household + $S_Total_Unit_Household + $T_Total_Unit_Household +
 $U_Total_Unit_Household;
 
 $Total_Person= $A_Total_Person + $B_Total_Person + $C_Total_Person + $D_Total_Person + $E_Total_Person + $F_Total_Person + 
 $G_Total_Person + $H_Total_Person + $I_Total_Person + $J_Total_Person + $K_Total_Person + $L_Total_Person + 
 $M_Total_Person + $N_Total_Person + $O_Total_Person + $P_Total_Person + $Q_Total_Person + $R_Total_Person + 
 $S_Total_Person+ $T_Total_Person + $U_Total_Person;
 
 $Total_Person_Parmanent= $A_Total_Person_Parmanent + $B_Total_Person_Parmanent + $C_Total_Person_Parmanent + $D_Total_Person_Parmanent + $E_Total_Person_Parmanent + $F_Total_Person_Parmanent + 
 $G_Total_Person_Parmanent + $H_Total_Person_Parmanent + $I_Total_Person_Parmanent + $J_Total_Person_Parmanent + $K_Total_Person_Parmanent + $L_Total_Person_Parmanent + $M_Total_Person_Parmanent + 
 $N_Total_Person_Parmanent + $O_Total_Person_Parmanent + $P_Total_Person_Parmanent + $Q_Total_Person_Parmanent + $R_Total_Person_Parmanent + $S_Total_Person_Parmanent + $T_Total_Person_Parmanent +
 $U_Total_Person_Parmanent;
 
 $Total_Person_Temporary = $A_Total_Person_Temporary + $B_Total_Person_Temporary + $C_Total_Person_Temporary + $D_Total_Person_Temporary + $E_Total_Person_Temporary + $F_Total_Person_Temporary + 
 $G_Total_Person_Temporary + $H_Total_Person_Temporary + $I_Total_Person_Temporary + $J_Total_Person_Temporary + $K_Total_Person_Temporary + $L_Total_Person_Temporary + $M_Total_Person_Temporary + 
 $N_Total_Person_Temporary + $O_Total_Person_Temporary + $P_Total_Person_Temporary + $Q_Total_Person_Temporary + $R_Total_Person_Temporary + $S_Total_Person_Temporary + $T_Total_Person_Temporary +
 $U_Total_Person_Temporary;
 
 $Total_Person_Household = $A_Total_Person_Household + $B_Total_Person_Household + $C_Total_Person_Household + $D_Total_Person_Household + $E_Total_Person_Household + $F_Total_Person_Household + 
 $G_Total_Person_Household + $H_Total_Person_Household + $I_Total_Person_Household + $J_Total_Person_Household + $K_Total_Person_Household + $L_Total_Person_Household + $M_Total_Person_Household + 
 $N_Total_Person_Household + $O_Total_Person_Household + $P_Total_Person_Household + $Q_Total_Person_Household + $R_Total_Person_Household + $S_Total_Person_Household + $T_Total_Person_Household +
 $U_Total_Person_Household;


 ?>




<!--  <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?=$A_Total_unit ?></td>
  <td><?=$A_Total_Unit_Parmanent ?></td>
  <td><?=$A_Total_Unit_Temporary ?></td>
  <td><?=$A_Total_Unit_Household ?></td>
  <td><?=$A_Total_Person ?></td>
  <td><?=$A_Total_Person_Parmanent ?></td>
  <td><?=$A_Total_Person_Temporary ?></td>
  <td><?=$A_Total_Person_Household ?></td>
 </tr> -->

   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
   <td><?=$B_Total_unit ?></td>
  <td><?=$B_Total_Unit_Parmanent ?></td>
  <td><?=$B_Total_Unit_Temporary ?></td>
  <td><?=$B_Total_Unit_Household ?></td>
  <td><?=$B_Total_Person ?></td>
  <td><?=$B_Total_Person_Parmanent ?></td>
  <td><?=$B_Total_Person_Temporary ?></td>
  <td><?=$B_Total_Person_Household ?></td>
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?=$C_Total_unit ?></td>
  <td><?=$C_Total_Unit_Parmanent ?></td>
  <td><?=$C_Total_Unit_Temporary ?></td>
  <td><?=$C_Total_Unit_Household ?></td>
  <td><?=$C_Total_Person ?></td>
  <td><?=$C_Total_Person_Parmanent ?></td>
  <td><?=$C_Total_Person_Temporary ?></td>
  <td><?=$C_Total_Person_Household ?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?=$D_Total_unit ?></td>
  <td><?=$D_Total_Unit_Parmanent ?></td>
  <td><?=$D_Total_Unit_Temporary ?></td>
  <td><?=$D_Total_Unit_Household ?></td>
  <td><?=$D_Total_Person ?></td>
  <td><?=$D_Total_Person_Parmanent ?></td>
  <td><?=$D_Total_Person_Temporary ?></td>
  <td><?=$D_Total_Person_Household ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?=$E_Total_unit ?></td>
  <td><?=$E_Total_Unit_Parmanent ?></td>
  <td><?=$E_Total_Unit_Temporary ?></td>
  <td><?=$E_Total_Unit_Household ?></td>
  <td><?=$E_Total_Person ?></td>
  <td><?=$E_Total_Person_Parmanent ?></td>
  <td><?=$E_Total_Person_Temporary ?></td>
  <td><?=$E_Total_Person_Household ?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
   <td><?=$F_Total_unit ?></td>
  <td><?=$F_Total_Unit_Parmanent ?></td>
  <td><?=$F_Total_Unit_Temporary ?></td>
  <td><?=$F_Total_Unit_Household ?></td>
  <td><?=$F_Total_Person ?></td>
  <td><?=$F_Total_Person_Parmanent ?></td>
  <td><?=$F_Total_Person_Temporary ?></td>
  <td><?=$F_Total_Person_Household ?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?=$G_Total_unit ?></td>
  <td><?=$G_Total_Unit_Parmanent ?></td>
  <td><?=$G_Total_Unit_Temporary ?></td>
  <td><?=$G_Total_Unit_Household ?></td>
  <td><?=$G_Total_Person ?></td>
  <td><?=$G_Total_Person_Parmanent ?></td>
  <td><?=$G_Total_Person_Temporary ?></td>
  <td><?=$G_Total_Person_Household ?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?=$H_Total_unit ?></td>
  <td><?=$H_Total_Unit_Parmanent ?></td>
  <td><?=$H_Total_Unit_Temporary ?></td>
  <td><?=$H_Total_Unit_Household ?></td>
  <td><?=$H_Total_Person ?></td>
  <td><?=$H_Total_Person_Parmanent ?></td>
  <td><?=$H_Total_Person_Temporary ?></td>
  <td><?=$H_Total_Person_Household ?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
    <td><?=$I_Total_unit ?></td>
  <td><?=$I_Total_Unit_Parmanent ?></td>
  <td><?=$I_Total_Unit_Temporary ?></td>
  <td><?=$I_Total_Unit_Household ?></td>
  <td><?=$I_Total_Person ?></td>
  <td><?=$I_Total_Person_Parmanent ?></td>
  <td><?=$I_Total_Person_Temporary ?></td>
  <td><?=$I_Total_Person_Household ?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?=$J_Total_unit ?></td>
  <td><?=$J_Total_Unit_Parmanent ?></td>
  <td><?=$J_Total_Unit_Temporary ?></td>
  <td><?=$J_Total_Unit_Household ?></td>
  <td><?=$J_Total_Person ?></td>
  <td><?=$J_Total_Person_Parmanent ?></td>
  <td><?=$J_Total_Person_Temporary ?></td>
  <td><?=$J_Total_Person_Household ?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?=$K_Total_unit ?></td>
  <td><?=$K_Total_Unit_Parmanent ?></td>
  <td><?=$K_Total_Unit_Temporary ?></td>
  <td><?=$K_Total_Unit_Household ?></td>
  <td><?=$K_Total_Person ?></td>
  <td><?=$K_Total_Person_Parmanent ?></td>
  <td><?=$K_Total_Person_Temporary ?></td>
  <td><?=$K_Total_Person_Household ?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate Activities</td>
  <td><?=$L_Total_unit ?></td>
  <td><?=$L_Total_Unit_Parmanent ?></td>
  <td><?=$L_Total_Unit_Temporary ?></td>
  <td><?=$L_Total_Unit_Household ?></td>
  <td><?=$L_Total_Person ?></td>
  <td><?=$L_Total_Person_Parmanent ?></td>
  <td><?=$L_Total_Person_Temporary ?></td>
  <td><?=$L_Total_Person_Household ?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
   <td><?=$M_Total_unit ?></td>
  <td><?=$M_Total_Unit_Parmanent ?></td>
  <td><?=$M_Total_Unit_Temporary ?></td>
  <td><?=$M_Total_Unit_Household ?></td>
  <td><?=$M_Total_Person ?></td>
  <td><?=$M_Total_Person_Parmanent ?></td>
  <td><?=$M_Total_Person_Temporary ?></td>
  <td><?=$M_Total_Person_Household ?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?=$N_Total_unit ?></td>
  <td><?=$N_Total_Unit_Parmanent ?></td>
  <td><?=$N_Total_Unit_Temporary ?></td>
  <td><?=$N_Total_Unit_Household ?></td>
  <td><?=$N_Total_Person ?></td>
  <td><?=$N_Total_Person_Parmanent ?></td>
  <td><?=$N_Total_Person_Temporary ?></td>
  <td><?=$N_Total_Person_Household ?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defense, Compulsory Social Security</td>
  <td><?=$O_Total_unit ?></td>
  <td><?=$O_Total_Unit_Parmanent ?></td>
  <td><?=$O_Total_Unit_Temporary ?></td>
  <td><?=$O_Total_Unit_Household ?></td>
  <td><?=$O_Total_Person ?></td>
  <td><?=$O_Total_Person_Parmanent ?></td>
  <td><?=$O_Total_Person_Temporary ?></td>
  <td><?=$O_Total_Person_Household ?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?=$P_Total_unit ?></td>
  <td><?=$P_Total_Unit_Parmanent ?></td>
  <td><?=$P_Total_Unit_Temporary ?></td>
  <td><?=$P_Total_Unit_Household ?></td>
  <td><?=$P_Total_Person ?></td>
  <td><?=$P_Total_Person_Parmanent ?></td>
  <td><?=$P_Total_Person_Temporary ?></td>
  <td><?=$P_Total_Person_Household ?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?=$Q_Total_unit ?></td>
  <td><?=$Q_Total_Unit_Parmanent ?></td>
  <td><?=$Q_Total_Unit_Temporary ?></td>
  <td><?=$Q_Total_Unit_Household ?></td>
  <td><?=$Q_Total_Person ?></td>
  <td><?=$Q_Total_Person_Parmanent ?></td>
  <td><?=$Q_Total_Person_Temporary ?></td>
  <td><?=$Q_Total_Person_Household ?></td>
 </tr>



     <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
   <td><?=$R_Total_unit ?></td>
  <td><?=$R_Total_Unit_Parmanent ?></td>
  <td><?=$R_Total_Unit_Temporary ?></td>
  <td><?=$R_Total_Unit_Household ?></td>
  <td><?=$R_Total_Person ?></td>
  <td><?=$R_Total_Person_Parmanent ?></td>
  <td><?=$R_Total_Person_Temporary ?></td>
  <td><?=$R_Total_Person_Household ?></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?=$S_Total_unit ?></td>
  <td><?=$S_Total_Unit_Parmanent ?></td>
  <td><?=$S_Total_Unit_Temporary ?></td>
  <td><?=$S_Total_Unit_Household ?></td>
  <td><?=$S_Total_Person ?></td>
  <td><?=$S_Total_Person_Parmanent ?></td>
  <td><?=$S_Total_Person_Temporary ?></td>
  <td><?=$S_Total_Person_Household ?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
   <td><?=$T_Total_unit ?></td>
  <td><?=$T_Total_Unit_Parmanent ?></td>
  <td><?=$T_Total_Unit_Temporary ?></td>
  <td><?=$T_Total_Unit_Household ?></td>
  <td><?=$T_Total_Person ?></td>
  <td><?=$T_Total_Person_Parmanent ?></td>
  <td><?=$T_Total_Person_Temporary ?></td>
  <td><?=$T_Total_Person_Household ?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?=$U_Total_unit ?></td>
  <td><?=$U_Total_Unit_Parmanent ?></td>
  <td><?=$U_Total_Unit_Temporary ?></td>
  <td><?=$U_Total_Unit_Household ?></td>
  <td><?=$U_Total_Person ?></td>
  <td><?=$U_Total_Person_Parmanent ?></td>
  <td><?=$U_Total_Person_Temporary ?></td>
  <td><?=$U_Total_Person_Household ?></td>
 </tr>


 <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?=$Total_Unit ?></td>
   <td><?=$Total_Unit_Parmanent ?></td>
  <td><?=$Total_Unit_Temporary ?></td>
  <td><?=$Total_Unit_Household ?></td>
  <td><?=$Total_Person ?></td>
  <td><?=$Total_Person_Parmanent ?></td>
  <td><?=$Total_Person_Temporary ?></td>
  <td><?=$Total_Person_Household ?></td>
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