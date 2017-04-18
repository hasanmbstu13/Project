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
          <td colspan="8"><b>Table 4.2: Total Establishment and Total Persons Engaged (TPE) by Economic Activity and Location in 2013.</b></td>
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


<!--    <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?=$A_Total_Estab ;?></td>
  <td><?=$A_Total_Estab_Urban ;?></td>
  <td><?=$A_Total_Estab_Rural ;?></td>
  <td><?=$A_Total_Person ;?></td>
  <td><?=$A_Total_Person_Urban ;?></td>
  <td><?=$A_Total_Person_Rural ;?></td>
 </tr> -->

   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?=$B_Total_Estab ;?></td>
  <td><?=$B_Total_Estab_Urban ;?></td>
  <td><?=$B_Total_Estab_Rural ;?></td>
  <td><?=$B_Total_Person ;?></td>
  <td><?=$B_Total_Person_Urban ;?></td>
  <td><?=$B_Total_Person_Rural ;?></td>
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?=$C_Total_Estab ;?></td>
  <td><?=$C_Total_Estab_Urban ;?></td>
  <td><?=$C_Total_Estab_Rural ;?></td>
  <td><?=$C_Total_Person ;?></td>
  <td><?=$C_Total_Person_Urban ;?></td>
  <td><?=$C_Total_Person_Rural ;?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?=$D_Total_Estab ;?></td>
  <td><?=$D_Total_Estab_Urban ;?></td>
  <td><?=$D_Total_Estab_Rural ;?></td>
  <td><?=$D_Total_Person ;?></td>
  <td><?=$D_Total_Person_Urban ;?></td>
  <td><?=$D_Total_Person_Rural ;?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?=$E_Total_Estab ;?></td>
  <td><?=$E_Total_Estab_Urban ;?></td>
  <td><?=$E_Total_Estab_Rural ;?></td>
  <td><?=$E_Total_Person ;?></td>
  <td><?=$E_Total_Person_Urban ;?></td>
  <td><?=$E_Total_Person_Rural ;?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?=$F_Total_Estab ;?></td>
  <td><?=$F_Total_Estab_Urban ;?></td>
  <td><?=$F_Total_Estab_Rural ;?></td>
  <td><?=$F_Total_Person ;?></td>
  <td><?=$F_Total_Person_Urban ;?></td>
  <td><?=$F_Total_Person_Rural ;?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?=$G_Total_Estab ;?></td>
  <td><?=$G_Total_Estab_Urban ;?></td>
  <td><?=$G_Total_Estab_Rural ;?></td>
  <td><?=$G_Total_Person ;?></td>
  <td><?=$G_Total_Person_Urban ;?></td>
  <td><?=$G_Total_Person_Rural ;?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?=$H_Total_Estab ;?></td>
  <td><?=$H_Total_Estab_Urban ;?></td>
  <td><?=$H_Total_Estab_Rural ;?></td>
  <td><?=$H_Total_Person ;?></td>
  <td><?=$H_Total_Person_Urban ;?></td>
  <td><?=$H_Total_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
  <td><?=$I_Total_Estab ;?></td>
  <td><?=$I_Total_Estab_Urban ;?></td>
  <td><?=$I_Total_Estab_Rural ;?></td>
  <td><?=$I_Total_Person ;?></td>
  <td><?=$I_Total_Person_Urban ;?></td>
  <td><?=$I_Total_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?=$J_Total_Estab ;?></td>
  <td><?=$J_Total_Estab_Urban ;?></td>
  <td><?=$J_Total_Estab_Rural ;?></td>
  <td><?=$J_Total_Person ;?></td>
  <td><?=$J_Total_Person_Urban ;?></td>
  <td><?=$J_Total_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?=$K_Total_Estab ;?></td>
  <td><?=$K_Total_Estab_Urban ;?></td>
  <td><?=$K_Total_Estab_Rural ;?></td>
  <td><?=$K_Total_Person ;?></td>
  <td><?=$K_Total_Person_Urban ;?></td>
  <td><?=$K_Total_Person_Rural ;?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate Activities</td>
  <td><?=$L_Total_Estab ;?></td>
  <td><?=$L_Total_Estab_Urban ;?></td>
  <td><?=$L_Total_Estab_Rural ;?></td>
  <td><?=$L_Total_Person ;?></td>
  <td><?=$L_Total_Person_Urban ;?></td>
  <td><?=$L_Total_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?=$M_Total_Estab ;?></td>
  <td><?=$M_Total_Estab_Urban ;?></td>
  <td><?=$M_Total_Estab_Rural ;?></td>
  <td><?=$M_Total_Person ;?></td>
  <td><?=$M_Total_Person_Urban ;?></td>
  <td><?=$M_Total_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?=$N_Total_Estab ;?></td>
  <td><?=$N_Total_Estab_Urban ;?></td>
  <td><?=$N_Total_Estab_Rural ;?></td>
  <td><?=$N_Total_Person ;?></td>
  <td><?=$N_Total_Person_Urban ;?></td>
  <td><?=$N_Total_Person_Rural ;?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defense, Compulsory Social Security</td>
  <td><?=$O_Total_Estab ;?></td>
  <td><?=$O_Total_Estab_Urban ;?></td>
  <td><?=$O_Total_Estab_Rural ;?></td>
  <td><?=$O_Total_Person ;?></td>
  <td><?=$O_Total_Person_Urban ;?></td>
  <td><?=$O_Total_Person_Rural ;?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?=$P_Total_Estab ;?></td>
  <td><?=$P_Total_Estab_Urban ;?></td>
  <td><?=$P_Total_Estab_Rural ;?></td>
  <td><?=$P_Total_Person ;?></td>
  <td><?=$P_Total_Person_Urban ;?></td>
  <td><?=$P_Total_Person_Rural ;?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?=$Q_Total_Estab ;?></td>
  <td><?=$Q_Total_Estab_Urban ;?></td>
  <td><?=$Q_Total_Estab_Rural ;?></td>
  <td><?=$Q_Total_Person ;?></td>
  <td><?=$Q_Total_Person_Urban ;?></td>
  <td><?=$Q_Total_Person_Rural ;?></td>
 </tr>



     <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
  <td><?=$R_Total_Estab ;?></td>
  <td><?=$R_Total_Estab_Urban ;?></td>
  <td><?=$R_Total_Estab_Rural ;?></td>
  <td><?=$R_Total_Person ;?></td>
  <td><?=$R_Total_Person_Urban ;?></td>
  <td><?=$R_Total_Person_Rural ;?></td>
 </tr>



  <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?=$S_Total_Estab ;?></td>
  <td><?=$S_Total_Estab_Urban ;?></td>
  <td><?=$S_Total_Estab_Rural ;?></td>
  <td><?=$S_Total_Person ;?></td>
  <td><?=$S_Total_Person_Urban ;?></td>
  <td><?=$S_Total_Person_Rural ;?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?=$T_Total_Estab ;?></td>
  <td><?=$T_Total_Estab_Urban ;?></td>
  <td><?=$T_Total_Estab_Rural ;?></td>
  <td><?=$T_Total_Person ;?></td>
  <td><?=$T_Total_Person_Urban ;?></td>
  <td><?=$T_Total_Person_Rural ;?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?=$U_Total_Estab ;?></td>
  <td><?=$U_Total_Estab_Urban ;?></td>
  <td><?=$U_Total_Estab_Rural ;?></td>
  <td><?=$U_Total_Person ;?></td>
  <td><?=$U_Total_Person_Urban ;?></td>
  <td><?=$U_Total_Person_Rural ;?></td>
 </tr>


  <tr>
  <td></td>
  <td align="left">TOTAL</td>
  <td><?=$Total_Estab = $A_Total_Estab+$B_Total_Estab+$C_Total_Estab+$D_Total_Estab+$E_Total_Estab+$F_Total_Estab+$G_Total_Estab+$H_Total_Estab+$I_Total_Estab+$J_Total_Estab+$K_Total_Estab+$L_Total_Estab+$M_Total_Estab+$N_Total_Estab+$O_Total_Estab+$P_Total_Estab+$Q_Total_Estab+$R_Total_Estab+$S_Total_Estab+$T_Total_Estab+$U_Total_Estab;?></td>

  <td><?=$Total_Estab_Urban = $A_Total_Estab_Urban + $B_Total_Estab_Urban + $C_Total_Estab_Urban + $D_Total_Estab_Urban + $E_Total_Estab_Urban + $F_Total_Estab_Urban + $G_Total_Estab_Urban + $H_Total_Estab_Urban + $I_Total_Estab_Urban + $J_Total_Estab_Urban + $K_Total_Estab_Urban +$L_Total_Estab_Urban + $M_Total_Estab_Urban + $N_Total_Estab_Urban + $O_Total_Estab_Urban + $P_Total_Estab_Urban + $Q_Total_Estab_Urban+$R_Total_Estab_Urban + $S_Total_Estab_Urban + $T_Total_Estab_Urban + $U_Total_Estab_Urban;?></td>
  <td><?=$Total_Estab_Rural = $A_Total_Estab_Rural+$B_Total_Estab_Rural+$C_Total_Estab_Rural+$D_Total_Estab_Rural+$E_Total_Estab_Rural +$F_Total_Estab_Rural +$G_Total_Estab_Rural+$H_Total_Estab_Rural+$I_Total_Estab_Rural+$J_Total_Estab_Rural+$K_Total_Estab_Rural+$L_Total_Estab_Rural+$M_Total_Estab_Rural+$N_Total_Estab_Rural+$O_Total_Estab_Rural+$P_Total_Estab_Rural+$Q_Total_Estab_Rural+$R_Total_Estab_Rural+$S_Total_Estab_Rural+$T_Total_Estab_Rural+$U_Total_Estab_Rural; ?></td>
  <td><?=$Total_Person =$A_Total_Person+$B_Total_Person+$C_Total_Person+$D_Total_Person+$E_Total_Person+$F_Total_Person+$G_Total_Person+$H_Total_Person+$I_Total_Person+$J_Total_Person+$K_Total_Person+$L_Total_Person+$M_Total_Person+$N_Total_Person+$O_Total_Person+$P_Total_Person+$Q_Total_Person+$R_Total_Person+$S_Total_Person+$T_Total_Person+$U_Total_Person; ?></td>
  <td><?=$Total_Person_Urban = $A_Total_Person_Urban+$B_Total_Person_Urban+$C_Total_Person_Urban+$D_Total_Person_Urban+$E_Total_Person_Urban+$F_Total_Person_Urban+$G_Total_Person_Urban+$H_Total_Person_Urban+$I_Total_Person_Urban+$J_Total_Person_Urban+$K_Total_Person_Urban+$L_Total_Person_Urban+$M_Total_Person_Urban+$N_Total_Person_Urban+$O_Total_Person_Urban+$P_Total_Person_Urban+$Q_Total_Person_Urban+$R_Total_Person_Urban+$S_Total_Person_Urban+$T_Total_Person_Urban+$U_Total_Person_Urban;?></td>
  <td><?=$Total_Person_Rural = $A_Total_Person_Rural+$B_Total_Person_Rural+$C_Total_Person_Rural+$D_Total_Person_Rural+$E_Total_Person_Rural+$F_Total_Person_Rural+$G_Total_Person_Rural+$H_Total_Person_Rural+$I_Total_Person_Rural+$J_Total_Person_Rural+$K_Total_Person_Rural+$L_Total_Person_Rural+$M_Total_Person_Rural+$N_Total_Person_Rural+$O_Total_Person_Rural+$P_Total_Person_Rural+$Q_Total_Person_Rural+$R_Total_Person_Rural+$S_Total_Person_Rural+$T_Total_Person_Rural+$U_Total_Person_Rural ;?></td>
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





