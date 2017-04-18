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

  <div class="notice"> </div><br>

<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport" >
 <tr>
          <td colspan="7"><b>Table 4.1_1: Number of Establishment and Total Persons Engaged (TPE) by Sex and Products and Average Size of Establishment in 2013</b></td>
        </tr>
 <tr >
  <td rowspan=2 >Product Code</td>
  <td rowspan=2 >Description</td>
  <td rowspan=2>Estab</td>
  <td colspan=3 >Total Persons Engaged (TPE)</td>
  <td rowspan=2 >Average Size of Establishment</td>
 </tr>

 <tr>
  <td >Total</td>
  <td >Male</td>
  <td >Female</td>
 </tr>

 <tr >
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
 </tr>


 <!--  <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?= $A_Total_Estab ?></td>
  <td><?= $A_Total_Person ?></td>
  <td><?= $A_Total_Person_Male ?></td>
  <td><?= $A_Total_Person_Female ?></td>
  <td><?=round(($A_Total_Person / $A_Total_Estab), 2); ?></td>
 </tr>
 -->
   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?= $B_Total_Estab ?></td>
  <td><?= $B_Total_Person ?></td>
  <td><?= $B_Total_Person_Male ?></td>
  <td><?= $B_Total_Person_Female ?></td>
  <td><?=round(($B_Total_Person / $B_Total_Estab), 2); ?></td>
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?= $C_Total_Estab ?></td>
  <td><?= $C_Total_Person ?></td>
  <td><?= $C_Total_Person_Male ?></td>
  <td><?= $C_Total_Person_Female ?></td>
  <td><?=round(($C_Total_Person / $C_Total_Estab), 2); ?></td>
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?= $D_Total_Estab ?></td>
  <td><?= $D_Total_Person ?></td>
  <td><?= $D_Total_Person_Male ?></td>
  <td><?= $D_Total_Person_Female ?></td>
  <td><?=round(($D_Total_Person / $D_Total_Estab), 2); ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?= $E_Total_Estab ?></td>
  <td><?= $E_Total_Person ?></td>
  <td><?= $E_Total_Person_Male ?></td>
  <td><?= $E_Total_Person_Female ?></td>
  <td><?=round(($E_Total_Person / $E_Total_Estab), 2); ?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?= $F_Total_Estab ?></td>
  <td><?= $F_Total_Person ?></td>
  <td><?= $F_Total_Person_Male ?></td>
  <td><?= $F_Total_Person_Female ?></td>
  <td><?=round(($F_Total_Person / $F_Total_Estab), 2); ?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
  <td><?= $G_Total_Estab ?></td>
  <td><?= $G_Total_Person ?></td>
  <td><?= $G_Total_Person_Male ?></td>
  <td><?= $G_Total_Person_Female ?></td>
  <td><?=round(($G_Total_Person / $G_Total_Estab), 2); ?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?= $H_Total_Estab ?></td>
  <td><?= $H_Total_Person ?></td>
  <td><?= $H_Total_Person_Male ?></td>
  <td><?= $H_Total_Person_Female ?></td>
  <td><?=round(($H_Total_Person / $H_Total_Estab), 2); ?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurents)</td>
  <td><?= $I_Total_Estab ?></td>
  <td><?= $I_Total_Person ?></td>
  <td><?= $I_Total_Person_Male ?></td>
  <td><?= $I_Total_Person_Female ?></td>
  <td><?=round(($I_Total_Person / $I_Total_Estab), 2); ?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?= $J_Total_Estab ?></td>
  <td><?= $J_Total_Person ?></td>
  <td><?= $J_Total_Person_Male ?></td>
  <td><?= $J_Total_Person_Female ?></td>
  <td><?=round(($J_Total_Person / $J_Total_Estab), 2); ?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?= $K_Total_Estab ?></td>
  <td><?= $K_Total_Person ?></td>
  <td><?= $K_Total_Person_Male ?></td>
  <td><?= $K_Total_Person_Female ?></td>
  <td><?=round(($K_Total_Person / $K_Total_Estab), 2); ?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real State Activities</td>
  <td><?= $L_Total_Estab ?></td>
  <td><?= $L_Total_Person ?></td>
  <td><?= $L_Total_Person_Male ?></td>
  <td><?= $L_Total_Person_Female ?></td>
  <td><?=round(($L_Total_Person / $L_Total_Estab), 2); ?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?= $M_Total_Estab ?></td>
  <td><?= $M_Total_Person ?></td>
  <td><?= $M_Total_Person_Male ?></td>
  <td><?= $M_Total_Person_Female ?></td>
  <td><?=round(($M_Total_Person / $M_Total_Estab), 2); ?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?= $N_Total_Estab ?></td>
  <td><?= $N_Total_Person ?></td>
  <td><?= $N_Total_Person_Male ?></td>
  <td><?= $N_Total_Person_Female ?></td>
  <td><?=round(($N_Total_Person / $N_Total_Estab), 2); ?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defence, Compulsory Social Security</td>
  <td><?= $O_Total_Estab ?></td>
  <td><?= $O_Total_Person ?></td>
  <td><?= $O_Total_Person_Male ?></td>
  <td><?= $O_Total_Person_Female ?></td>
  <td><?=round(($O_Total_Person / $O_Total_Estab), 2); ?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?= $P_Total_Estab ?></td>
  <td><?= $P_Total_Person ?></td>
  <td><?= $P_Total_Person_Male ?></td>
  <td><?= $P_Total_Person_Female ?></td>
  <td><?=round(($P_Total_Person / $P_Total_Estab), 2); ?></td>
 </tr>


     <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?= $Q_Total_Estab ?></td>
  <td><?= $Q_Total_Person ?></td>
  <td><?= $Q_Total_Person_Male ?></td>
  <td><?= $Q_Total_Person_Female ?></td>
  <td><?=round(($Q_Total_Person / $Q_Total_Estab), 2); ?></td>
 </tr>



     <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
  <td><?= $R_Total_Estab ?></td>
  <td><?= $R_Total_Person ?></td>
  <td><?= $R_Total_Person_Male ?></td>
  <td><?= $R_Total_Person_Female ?></td>
  <td><?=round(($R_Total_Person / $R_Total_Estab), 2); ?></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?= $S_Total_Estab ?></td>
  <td><?= $S_Total_Person ?></td>
  <td><?= $S_Total_Person_Male ?></td>
  <td><?= $S_Total_Person_Female ?></td>
  <td><?=round(($S_Total_Person / $S_Total_Estab), 2); ?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?= $T_Total_Estab ?></td>
  <td><?= $T_Total_Person ?></td>
  <td><?= $T_Total_Person_Male ?></td>
  <td><?= $T_Total_Person_Female ?></td>
  <td><?=round(($T_Total_Person / $T_Total_Estab), 2); ?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?= $U_Total_Estab ?></td>
  <td><?= $U_Total_Person ?></td>
  <td><?= $U_Total_Person_Male ?></td>
  <td><?= $U_Total_Person_Female ?></td>
  <td><?=round(($U_Total_Person / $U_Total_Estab), 2); ?></td>
 </tr>


 <?php 

/*
      $Total_Estab = $A_Total_Estab + $B_Total_Estab + $C_Total_Estab + $D_Total_Estab + $E_Total_Estab +
                    $F_Total_Estab+$G_Total_Estab + $H_Total_Estab + $I_Total_Estab + $J_Total_Estab + $K_Total_Estab +
                    $L_Total_Estab +$M_Total_Estab + $N_Total_Estab + $O_Total_Estab + $P_Total_Estab + $Q_Total_Estab + 
                    $R_Total_Estab+$S_Total_Estab + $T_Total_Estab + $U_Total_Estab;

      $Total_Person = $A_Total_Person + $B_Total_Person + $C_Total_Person + $D_Total_Person + $E_Total_Person +
                    $F_Total_Person + $G_Total_Person + $H_Total_Person + $I_Total_Person + $J_Total_Person +
                    $K_Total_Person + $L_Total_Person + $M_Total_Person + $N_Total_Person + $O_Total_Person +
                    $P_Total_Person + $Q_Total_Person + $R_Total_Person + $S_Total_Person + $T_Total_Person +
                    $U_Total_Person;


      $Total_Person_Male = $A_Total_Person_Male+ $B_Total_Person_Male + $C_Total_Person_Male + $D_Total_Person_Male + 
                          $E_Total_Person_Male +$F_Total_Person_Male + $G_Total_Person_Male + $H_Total_Person_Male + $I_Total_Person_Male + 
                          $J_Total_Person_Male +$K_Total_Person_Male + $L_Total_Person_Male + $M_Total_Person_Male + $N_Total_Person_Male+ 
                          $O_Total_Person_Male +$P_Total_Person_Male + $Q_Total_Person_Male + $R_Total_Person_Male + $S_Total_Person_Male + 
                          $T_Total_Person_Male +$U_Total_Person_Male;

      $Total_Person_Female = $A_Total_Person_Female+ $B_Total_Person_Female + $C_Total_Person_Female +
                            $D_Total_Person_Female + $E_Total_Person_Female +$F_Total_Person_Female + $G_Total_Person_Female +
                            $H_Total_Person_Female + $I_Total_Person_Female + $J_Total_Person_Female +$K_Total_Person_Female + 
                            $L_Total_Person_Female + $M_Total_Person_Female + $N_Total_Person_Female+ $O_Total_Person_Female +
                            $P_Total_Person_Female + $Q_Total_Person_Female + $R_Total_Person_Female + $S_Total_Person_Female + 
                            $T_Total_Person_Female +$U_Total_Person_Female; */


       $Total_Estab = $B_Total_Estab + $C_Total_Estab + $D_Total_Estab + $E_Total_Estab +
                    $F_Total_Estab+$G_Total_Estab + $H_Total_Estab + $I_Total_Estab + $J_Total_Estab + $K_Total_Estab +
                    $L_Total_Estab +$M_Total_Estab + $N_Total_Estab + $O_Total_Estab + $P_Total_Estab + $Q_Total_Estab + 
                    $R_Total_Estab+$S_Total_Estab + $T_Total_Estab + $U_Total_Estab;

      $Total_Person = $B_Total_Person + $C_Total_Person + $D_Total_Person + $E_Total_Person +
                    $F_Total_Person + $G_Total_Person + $H_Total_Person + $I_Total_Person + $J_Total_Person +
                    $K_Total_Person + $L_Total_Person + $M_Total_Person + $N_Total_Person + $O_Total_Person +
                    $P_Total_Person + $Q_Total_Person + $R_Total_Person + $S_Total_Person + $T_Total_Person +
                    $U_Total_Person;


      $Total_Person_Male = $B_Total_Person_Male + $C_Total_Person_Male + $D_Total_Person_Male + 
                          $E_Total_Person_Male +$F_Total_Person_Male + $G_Total_Person_Male + $H_Total_Person_Male + $I_Total_Person_Male + 
                          $J_Total_Person_Male +$K_Total_Person_Male + $L_Total_Person_Male + $M_Total_Person_Male + $N_Total_Person_Male+ 
                          $O_Total_Person_Male +$P_Total_Person_Male + $Q_Total_Person_Male + $R_Total_Person_Male + $S_Total_Person_Male + 
                          $T_Total_Person_Male +$U_Total_Person_Male;

      $Total_Person_Female = $B_Total_Person_Female + $C_Total_Person_Female +
                            $D_Total_Person_Female + $E_Total_Person_Female +$F_Total_Person_Female + $G_Total_Person_Female +
                            $H_Total_Person_Female + $I_Total_Person_Female + $J_Total_Person_Female +$K_Total_Person_Female + 
                            $L_Total_Person_Female + $M_Total_Person_Female + $N_Total_Person_Female+ $O_Total_Person_Female +
                            $P_Total_Person_Female + $Q_Total_Person_Female + $R_Total_Person_Female + $S_Total_Person_Female + 
                            $T_Total_Person_Female +$U_Total_Person_Female;


 ?>


 <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?= $Total_Estab ?></td>
  <td><?= $Total_Person ?></td>
  <td><?= $Total_Person_Male ?></td>
  <td><?= $Total_Person_Female ?></td>
  <td><?=round(($Total_Person / $Total_Estab), 2); ?></td>
 </tr>



 
</table>

<br><div class="notice"> </div>


</div>
<br><br>
<div class="submit">
<input type="button" value="Print" id="print_btn">
<input type="button" value="Export to Excel" id="export_to_excel">
</div> 

<?php //} ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>



