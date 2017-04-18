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
    <td colspan="7"><b>Table 8.6: Average Size of Establishments by Category and Economic Activity,  2013</b></td>
  </tr>
 <tr>
 <tr>
  <td  rowspan=2>Code</td>
  <td  rowspan=2>Economic Activity</td>
  <td  colspan=5>Economic Size of Establishments</td>
 
</tr>

 <tr >
  <td >Cottage</td>
  <td >Micro</td>
  <td >Small</td>
  <td >Medium</td>
  <td >Large</td>
 </tr>


 <tr>
  <td>1</td>
  <td>2</td>
  <td>3</td>
  <td>4</td>
  <td>5</td>
  <td>6</td>
  <td>7</td>
</tr>



<!--
  <tr>
  <td>A</td>
  <td align="left">Agriculture, forestry and fishing</td>
  <td><?=$A_AVG_COTTAGE_EST ?></td>
  <td><?=$A_AVG_MICRO_EST ?></td>
  <td><?=$A_AVG_SMALL_EST ?></td>
  <td><?=$A_AVG_MEDIUM_EST ?></td>
  <td><?=$A_AVG_LARGE_EST ?></td>
 
 </tr>
-->
   <tr>
  <td>B</td>
  <td align="left">Mining and Quarrying</td>
  <td><?= $B_AVG_COTTAGE_EST ?></td>
  <td><?= $B_AVG_MICRO_EST ?></td>
  <td><?= $B_AVG_SMALL_EST ?></td>
  <td><?= $B_AVG_MEDIUM_EST ?></td>
  <td><?= $B_AVG_LARGE_EST ?></td>
  
 
 </tr>

  <tr>
  <td>C</td>
  <td align="left">Manufacturing</td>
  <td><?= $C_AVG_COTTAGE_EST ?></td>
  <td><?= $C_AVG_MICRO_EST ?></td>
  <td><?= $C_AVG_SMALL_EST ?></td>
  <td><?= $C_AVG_MEDIUM_EST ?></td>
  <td><?= $C_AVG_LARGE_EST ?></td>
  
 </tr>

 <tr>
  <td>D</td>
  <td align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
  <td><?= $D_AVG_COTTAGE_EST ?></td>
  <td><?= $D_AVG_MICRO_EST ?></td>
  <td><?= $D_AVG_SMALL_EST ?></td>
  <td><?= $D_AVG_MEDIUM_EST ?></td>
  <td><?= $D_AVG_LARGE_EST ?></td>
 </tr>




<tr>
  <td>E</td>
  <td align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
  <td><?= $E_AVG_COTTAGE_EST ?></td>
  <td><?= $E_AVG_MICRO_EST ?></td>
  <td><?= $E_AVG_SMALL_EST ?></td>
  <td><?= $E_AVG_MEDIUM_EST ?></td>
  <td><?= $E_AVG_LARGE_EST ?></td>
 </tr>


<tr>
  <td>F</td>
  <td align="left">Construction</td>
  <td><?= $F_AVG_COTTAGE_EST ?></td>
  <td><?= $F_AVG_MICRO_EST ?></td>
  <td><?= $F_AVG_SMALL_EST ?></td>
  <td><?= $F_AVG_MEDIUM_EST ?></td>
  <td><?= $F_AVG_LARGE_EST ?></td>
 </tr>


<tr>
  <td>G</td>
  <td align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
 <td><?= $G_AVG_COTTAGE_EST ?></td>
  <td><?= $G_AVG_MICRO_EST ?></td>
  <td><?= $G_AVG_SMALL_EST ?></td>
  <td><?= $G_AVG_MEDIUM_EST ?></td>
  <td><?= $G_AVG_LARGE_EST ?></td>
 </tr>

 <tr>
  <td>H</td>
  <td align="left">Transportation and Storage</td>
  <td><?= $H_AVG_COTTAGE_EST ?></td>
  <td><?= $H_AVG_MICRO_EST ?></td>
  <td><?= $H_AVG_SMALL_EST ?></td>
  <td><?= $H_AVG_MEDIUM_EST ?></td>
  <td><?= $H_AVG_LARGE_EST ?></td>
 </tr>


  <tr>
  <td>I</td>
  <td align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
  <td><?= $I_AVG_COTTAGE_EST ?></td>
  <td><?= $I_AVG_MICRO_EST ?></td>
  <td><?= $I_AVG_SMALL_EST ?></td>
  <td><?= $I_AVG_MEDIUM_EST ?></td>
  <td><?= $I_AVG_LARGE_EST ?></td>
 </tr>


   <tr>
  <td>J</td>
  <td align="left">Information and Communication</td>
  <td><?= $J_AVG_COTTAGE_EST ?></td>
  <td><?= $J_AVG_MICRO_EST ?></td>
  <td><?= $J_AVG_SMALL_EST ?></td>
  <td><?= $J_AVG_MEDIUM_EST ?></td>
  <td><?= $J_AVG_LARGE_EST ?></td>
 </tr>


  <tr>
  <td>K</td>
  <td align="left">Financial and Insurance Activities</td>
  <td><?= $K_AVG_COTTAGE_EST ?></td>
  <td><?= $K_AVG_MICRO_EST ?></td>
  <td><?= $K_AVG_SMALL_EST ?></td>
  <td><?= $K_AVG_MEDIUM_EST ?></td>
  <td><?= $K_AVG_LARGE_EST ?></td>
 </tr>


    <tr>
  <td>L</td>
  <td align="left">Real Estate Activities</td>
  <td><?= $L_AVG_COTTAGE_EST ?></td>
  <td><?= $L_AVG_MICRO_EST ?></td>
  <td><?= $L_AVG_SMALL_EST ?></td>
  <td><?= $L_AVG_MEDIUM_EST ?></td>
  <td><?= $L_AVG_LARGE_EST ?></td>
 </tr>


   <tr>
  <td>M</td>
  <td align="left">Professional, Scientific and Technical Activities</td>
  <td><?= $M_AVG_COTTAGE_EST ?></td>
  <td><?= $M_AVG_MICRO_EST ?></td>
  <td><?= $M_AVG_SMALL_EST ?></td>
  <td><?= $M_AVG_MEDIUM_EST ?></td>
  <td><?= $M_AVG_LARGE_EST ?></td>
 </tr>


  <tr>
  <td>N</td>
  <td align="left">Administrative and Support Service Activities</td>
  <td><?= $N_AVG_COTTAGE_EST ?></td>
  <td><?= $N_AVG_MICRO_EST ?></td>
  <td><?= $N_AVG_SMALL_EST ?></td>
  <td><?= $N_AVG_MEDIUM_EST ?></td>
  <td><?= $N_AVG_LARGE_EST ?></td>
 </tr>


   <tr>
  <td>O</td>
  <td align="left">Public Administration and Defense, Compulsory Social Security</td>
  <td><?= $O_AVG_COTTAGE_EST ?></td>
  <td><?= $O_AVG_MICRO_EST ?></td>
  <td><?= $O_AVG_SMALL_EST ?></td>
  <td><?= $O_AVG_MEDIUM_EST ?></td>
  <td><?= $O_AVG_LARGE_EST ?></td>
 </tr>


     <tr>
  <td>P</td>
  <td align="left">Education</td>
  <td><?= $P_AVG_COTTAGE_EST ?></td>
  <td><?= $P_AVG_MICRO_EST ?></td>
  <td><?= $P_AVG_SMALL_EST ?></td>
  <td><?= $P_AVG_MEDIUM_EST ?></td>
  <td><?= $P_AVG_LARGE_EST ?></td>
 </tr>


  <tr>
  <td>Q</td>
  <td align="left">Human Health and Social Work Activities</td>
  <td><?= $Q_AVG_COTTAGE_EST ?></td>
  <td><?= $Q_AVG_MICRO_EST ?></td>
  <td><?= $Q_AVG_SMALL_EST ?></td>
  <td><?= $Q_AVG_MEDIUM_EST ?></td>
  <td><?= $Q_AVG_LARGE_EST ?></td>
  </tr>
  

  <tr>
  <td>R</td>
  <td align="left">Art, Entertainment and Recreation</td>
 <td><?= $R_AVG_COTTAGE_EST ?></td>
  <td><?= $R_AVG_MICRO_EST ?></td>
  <td><?= $R_AVG_SMALL_EST ?></td>
  <td><?= $R_AVG_MEDIUM_EST ?></td>
  <td><?= $R_AVG_LARGE_EST ?></td>
 </tr>



     <tr>
  <td>S</td>
  <td align="left">Other Service Activities</td>
  <td><?= $S_AVG_COTTAGE_EST ?></td>
  <td><?= $S_AVG_MICRO_EST ?></td>
  <td><?= $S_AVG_SMALL_EST ?></td>
  <td><?= $S_AVG_MEDIUM_EST ?></td>
  <td><?= $S_AVG_LARGE_EST ?></td>
 </tr>



   <tr>
  <td>T</td>
  <td align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
  <td><?=$T_AVG_COTTAGE_EST ?></td>
  <td><?=$T_AVG_MICRO_EST ?></td>
  <td><?=$T_AVG_SMALL_EST ?></td>
  <td><?=$T_AVG_MEDIUM_EST ?></td>
  <td><?=$T_AVG_LARGE_EST ?></td>
 </tr>


  <tr>
  <td>U</td>
  <td align="left">Activities of Extraterritorial Organizations and Bodies</td>
  <td><?=$U_AVG_COTTAGE_EST ?></td>
  <td><?=$U_AVG_MICRO_EST ?></td>
  <td><?=$U_AVG_SMALL_EST ?></td>
  <td><?=$U_AVG_MEDIUM_EST ?></td>
  <td><?=$U_AVG_LARGE_EST ?></td>
 </tr>

<?php 

// $TOTAL_AVG_COTTAGE_EST = $A_AVG_COTTAGE_EST+$B_AVG_COTTAGE_EST+$C_AVG_COTTAGE_EST+$D_AVG_COTTAGE_EST+ $E_AVG_COTTAGE_EST+
// $F_AVG_COTTAGE_EST+$G_AVG_COTTAGE_EST+$H_AVG_COTTAGE_EST+$I_AVG_COTTAGE_EST+ $J_AVG_COTTAGE_EST+ $K_AVG_COTTAGE_EST+
// $L_AVG_COTTAGE_EST+ $M_AVG_COTTAGE_EST+  $N_AVG_COTTAGE_EST+ $O_AVG_COTTAGE_EST+ $P_AVG_COTTAGE_EST+ $Q_AVG_COTTAGE_EST+
// $R_AVG_COTTAGE_EST+$S_AVG_COTTAGE_EST+$T_AVG_COTTAGE_EST+ $U_AVG_COTTAGE_EST;

// $TOTAL_AVG_MICRO_EST = $A_AVG_MICRO_EST+$B_AVG_MICRO_EST+$C_AVG_MICRO_EST+$D_AVG_MICRO_EST+ $E_AVG_MICRO_EST+
// $F_AVG_MICRO_EST+$G_AVG_MICRO_EST+$H_AVG_MICRO_EST+$I_AVG_MICRO_EST+ $J_AVG_MICRO_EST+ $K_AVG_MICRO_EST+
// $L_AVG_MICRO_EST+ $M_AVG_MICRO_EST+  $N_AVG_MICRO_EST+ $O_AVG_MICRO_EST+ $P_AVG_MICRO_EST+ $Q_AVG_MICRO_EST+
// $R_AVG_MICRO_EST+$S_AVG_MICRO_EST+$T_AVG_MICRO_EST+ $U_AVG_MICRO_EST;

// $TOTAL_AVG_SMALL_EST = $A_AVG_SMALL_EST+$B_AVG_SMALL_EST+$C_AVG_SMALL_EST+$D_AVG_SMALL_EST+ $E_AVG_SMALL_EST+
// $F_AVG_SMALL_EST+$G_AVG_SMALL_EST+$H_AVG_SMALL_EST+$I_AVG_SMALL_EST+ $J_AVG_SMALL_EST+ $K_AVG_SMALL_EST+
// $L_AVG_SMALL_EST+ $M_AVG_SMALL_EST+ $N_AVG_SMALL_EST+ $O_AVG_SMALL_EST+ $P_AVG_SMALL_EST+ $Q_AVG_SMALL_EST+
// $R_AVG_SMALL_EST+$S_AVG_SMALL_EST+$T_AVG_SMALL_EST+ $U_AVG_SMALL_EST;

// $TOTAL_AVG_MEDIUM_EST = $A_AVG_MEDIUM_EST+$B_AVG_MEDIUM_EST+$C_AVG_MEDIUM_EST+$D_AVG_MEDIUM_EST+ $E_AVG_MEDIUM_EST+
// $F_AVG_MEDIUM_EST+$G_AVG_MEDIUM_EST+$H_AVG_MEDIUM_EST+$I_AVG_MEDIUM_EST+ $J_AVG_MEDIUM_EST+ $K_AVG_MEDIUM_EST+
// $L_AVG_MEDIUM_EST+ $M_AVG_MEDIUM_EST+$N_AVG_MEDIUM_EST+ $O_AVG_MEDIUM_EST+ $P_AVG_MEDIUM_EST+$Q_AVG_MEDIUM_EST+
// $R_AVG_MEDIUM_EST+$S_AVG_MEDIUM_EST+$T_AVG_MEDIUM_EST+ $U_AVG_MEDIUM_EST;

// $TOTAL_AVG_LARGE_EST = $A_AVG_LARGE_EST+$B_AVG_LARGE_EST+$C_AVG_LARGE_EST+$D_AVG_LARGE_EST+ $E_AVG_LARGE_EST+
// $F_AVG_LARGE_EST+$G_AVG_LARGE_EST+$H_AVG_LARGE_EST+$I_AVG_LARGE_EST+ $J_AVG_LARGE_EST+$K_AVG_LARGE_EST+
// $L_AVG_LARGE_EST+ $M_AVG_LARGE_EST+$N_AVG_LARGE_EST+$O_AVG_LARGE_EST+$P_AVG_LARGE_EST+$Q_AVG_LARGE_EST+
// $R_AVG_LARGE_EST+$S_AVG_LARGE_EST+$T_AVG_LARGE_EST+ $U_AVG_LARGE_EST;

 ?>
 <tr>
  <td></td>
  <td align="left">Total</td>
  <td><?=$TOTAL_AVG_COTTAGE_EST ?></td>
  <td><?=$TOTAL_AVG_MICRO_EST ?></td>
  <td><?=$TOTAL_AVG_SMALL_EST ?></td>
  <td><?=$TOTAL_AVG_MEDIUM_EST ?></td>
  <td><?=$TOTAL_AVG_LARGE_EST ?></td>
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

 } 

 ?>

<br><br>
<?php echo $this -> Html -> script('reports/jquery.battatech.excelexport.min'); ?>
<?php echo $this -> Html -> script('reports/geo_filter'); ?>



