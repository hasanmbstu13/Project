<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<!--
<b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
<b>Union:</b><select id="union_id" name="geo_code_union"><option value="">Please Select</option></select>  -->
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
  <!---
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
  </tr>  -->
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
   <td colspan="13"><b>Table- 11: Number of Establishment and Total Persons Engaged (TPE) by Inception Period, Major Economic Activity and Location in 2013.</b></td>
</tr>


 <tr >
  <td rowspan=2 >BSIC Category</td>
  <td rowspan=2>Location &amp; Type of Economic Activities </td>
  <td rowspan=2 >Data Item</td>
  <td rowspan=2 >Total</td>
  <td colspan=9 >Inception Period</td>
 </tr>

 <tr>
  <td>Before 1947</td>
  <td>1947-1959</td>
  <td>1960-1970</td>
  <td>1971-1979</td>
  <td>1980-1989</td>
  <td>1990-1999</td>
  <td>2000-2009</td>
  <td>2000-2013 (Up to May)</td>
  <td>Not Reported</td>
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

  </tr>

  <tr>
    <td colspan="2"><?=substr($zila, 0, -4);  ?></td>
    <td colspan="11"></td>
  </tr>

<?php 
    $TOTAL_EST = 0;
    $TOTAL_EST_1947 = 0;
    $TOTAL_EST_1947_1959 = 0;
    $TOTAL_EST_1960_1970 = 0;
    $TOTAL_EST_1971_1979 = 0;
    $TOTAL_EST_1980_1989 = 0;
    $TOTAL_EST_1990_1999 = 0;
    $TOTAL_EST_2000_2009 = 0;
    $TOTAL_EST_2010_2013 = 0;
    $TOTAL_EST_NOT_REPORTED = 0;

    $TOTAL_TPE = 0;
    $TOTAL_TPE_1947 = 0;
    $TOTAL_TPE_1947_1959 = 0;
    $TOTAL_TPE_1960_1970 = 0;
    $TOTAL_TPE_1971_1979 = 0;
    $TOTAL_TPE_1980_1989 = 0;
    $TOTAL_TPE_1990_1999 = 0;
    $TOTAL_TPE_2000_2009 = 0;
    $TOTAL_TPE_2010_2013 = 0;
    $TOTAL_TPE_NOT_REPORTED = 0;
?>



<!--    <tr>
     <td rowspan=2 >A</td>
     <td rowspan=2 align="left">Agriculture, Forestry and Fishing</td>
     
     <td>Estab.</td>
     <td><?=(int)$A_result_est_total?></td>
     <td><?=(int)$A_result_est_1947 ?></td>
     <td><?=(int)$A_result_est_1947_1959 ?></td>
     <td><?=(int)$A_result_est_1960_1970 ?></td>
     <td><?=(int)$A_result_est_1971_1979 ?></td>
     <td><?=(int)$A_result_est_1980_1989 ?></td>
     <td><?=(int)$A_result_est_1990_1999 ?></td>
     <td><?=(int)$A_result_est_2000_2009 ?></td>
     <td><?=(int)$A_result_est_2010_2013 ?></td>
     <td><?=(int)$A_result_est_not_reported ?></td>
 
   </tr>
 -->
<!-- <tr>
    <td>Persons</td>
     <td><?=(int)$A_result_tpe_total?></td>
     <td><?=(int)$A_result_tpe_1947 ?></td>
     <td><?=(int)$A_result_tpe_1947_1959 ?></td>
     <td><?=(int)$A_result_tpe_1960_1970 ?></td>
     <td><?=(int)$A_result_tpe_1971_1979 ?></td>
     <td><?=(int)$A_result_tpe_1980_1989 ?></td>
     <td><?=(int)$A_result_tpe_1990_1999 ?></td>
     <td><?=(int)$A_result_tpe_2000_2009 ?></td>
     <td><?=(int)$A_result_tpe_2010_2013 ?></td>
     <td><?=(int)$A_result_tpe_not_reported ?></td>
     
</tr>
 -->

   <tr>
     <td rowspan=2 >B</td>
     <td rowspan=2 align="left">Mining and Quarrying</td>
     
     <td>Estab.</td>
     <td><?=(int)$B_result_est_total?></td>
     <td><?=(int)$B_result_est_1947 ?></td>
     <td><?=(int)$B_result_est_1947_1959 ?></td>
     <td><?=(int)$B_result_est_1960_1970 ?></td>
     <td><?=(int)$B_result_est_1971_1979 ?></td>
     <td><?=(int)$B_result_est_1980_1989 ?></td>
     <td><?=(int)$B_result_est_1990_1999 ?></td>
     <td><?=(int)$B_result_est_2000_2009 ?></td>
     <td><?=(int)$B_result_est_2010_2013 ?></td>
     <td><?=(int)$B_result_est_not_reported ?></td>
  
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$B_result_tpe_total?></td>
     <td><?=(int)$B_result_tpe_1947 ?></td>
     <td><?=(int)$B_result_tpe_1947_1959 ?></td>
     <td><?=(int)$B_result_tpe_1960_1970 ?></td>
     <td><?=(int)$B_result_tpe_1971_1979 ?></td>
     <td><?=(int)$B_result_tpe_1980_1989 ?></td>
     <td><?=(int)$B_result_tpe_1990_1999 ?></td>
     <td><?=(int)$B_result_tpe_2000_2009 ?></td>
     <td><?=(int)$B_result_tpe_2010_2013 ?></td>
     <td><?=(int)$B_result_tpe_not_reported ?></td>
     
   </tr>


  <tr>
     <td rowspan=2 >C</td>
     <td rowspan=2 align="left">Manufacturing</td>
     
     <td>Estab.</td>
     <td><?=(int)$C_result_est_total?></td>
     <td><?=(int)$C_result_est_1947 ?></td>
     <td><?=(int)$C_result_est_1947_1959 ?></td>
     <td><?=(int)$C_result_est_1960_1970 ?></td>
     <td><?=(int)$C_result_est_1971_1979 ?></td>
     <td><?=(int)$C_result_est_1980_1989 ?></td>
     <td><?=(int)$C_result_est_1990_1999 ?></td>
     <td><?=(int)$C_result_est_2000_2009 ?></td>
     <td><?=(int)$C_result_est_2010_2013 ?></td>
      <td><?=(int)$C_result_est_not_reported ?></td>
    
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$C_result_tpe_total?></td>
     <td><?=(int)$C_result_tpe_1947 ?></td>
     <td><?=(int)$C_result_tpe_1947_1959 ?></td>
     <td><?=(int)$C_result_tpe_1960_1970 ?></td>
     <td><?=(int)$C_result_tpe_1971_1979 ?></td>
     <td><?=(int)$C_result_tpe_1980_1989 ?></td>
     <td><?=(int)$C_result_tpe_1990_1999 ?></td>
     <td><?=(int)$C_result_tpe_2000_2009 ?></td>
     <td><?=(int)$C_result_tpe_2010_2013 ?></td>
      <td><?=(int)$C_result_tpe_not_reported ?></td>
     
</tr>


   <tr>
     <td rowspan=2 >D</td>
     <td rowspan=2 align="left">Electricity, Gas, Steam and Air Conditioning Supply</td>
     
     <td>Estab.</td>
     <td><?=(int)$D_result_est_total?></td>
     <td><?=(int)$D_result_est_1947 ?></td>
     <td><?=(int)$D_result_est_1947_1959 ?></td>
     <td><?=(int)$D_result_est_1960_1970 ?></td>
     <td><?=(int)$D_result_est_1971_1979 ?></td>
     <td><?=(int)$D_result_est_1980_1989 ?></td>
     <td><?=(int)$D_result_est_1990_1999 ?></td>
     <td><?=(int)$D_result_est_2000_2009 ?></td>
     <td><?=(int)$D_result_est_2010_2013 ?></td>
    <td><?=(int)$D_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$D_result_tpe_total?></td>
     <td><?=(int)$D_result_tpe_1947 ?></td>
     <td><?=(int)$D_result_tpe_1947_1959 ?></td>
     <td><?=(int)$D_result_tpe_1960_1970 ?></td>
     <td><?=(int)$D_result_tpe_1971_1979 ?></td>
     <td><?=(int)$D_result_tpe_1980_1989 ?></td>
     <td><?=(int)$D_result_tpe_1990_1999 ?></td>
     <td><?=(int)$D_result_tpe_2000_2009 ?></td>
     <td><?=(int)$D_result_tpe_2010_2013 ?></td>
     <td><?=(int)$D_result_tpe_not_reported ?></td>
     
   </tr>

      <tr>
     <td rowspan=2 >E</td>
     <td rowspan=2 align="left">Water Supply, Sewerage, Waste Management and Remediation Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$E_result_est_total?></td>
     <td><?=(int)$E_result_est_1947 ?></td>
     <td><?=(int)$E_result_est_1947_1959 ?></td>
     <td><?=(int)$E_result_est_1960_1970 ?></td>
     <td><?=(int)$E_result_est_1971_1979 ?></td>
     <td><?=(int)$E_result_est_1980_1989 ?></td>
     <td><?=(int)$E_result_est_1990_1999 ?></td>
     <td><?=(int)$E_result_est_2000_2009 ?></td>
     <td><?=(int)$E_result_est_2010_2013 ?></td>
     <td><?=(int)$E_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$E_result_tpe_total?></td>
     <td><?=(int)$E_result_tpe_1947 ?></td>
     <td><?=(int)$E_result_tpe_1947_1959 ?></td>
     <td><?=(int)$E_result_tpe_1960_1970 ?></td>
     <td><?=(int)$E_result_tpe_1971_1979 ?></td>
     <td><?=(int)$E_result_tpe_1980_1989 ?></td>
     <td><?=(int)$E_result_tpe_1990_1999 ?></td>
     <td><?=(int)$E_result_tpe_2000_2009 ?></td>
     <td><?=(int)$E_result_tpe_2010_2013 ?></td>
     <td><?=(int)$E_result_tpe_not_reported ?></td>
    
   </tr>


      <tr>
     <td rowspan=2 >F</td>
     <td rowspan=2 align="left">Construction</td>
     
     <td>Estab.</td>
     <td><?=(int)$F_result_est_total?></td>
     <td><?=(int)$F_result_est_1947 ?></td>
     <td><?=(int)$F_result_est_1947_1959 ?></td>
     <td><?=(int)$F_result_est_1960_1970 ?></td>
     <td><?=(int)$F_result_est_1971_1979 ?></td>
     <td><?=(int)$F_result_est_1980_1989 ?></td>
     <td><?=(int)$F_result_est_1990_1999 ?></td>
     <td><?=(int)$F_result_est_2000_2009 ?></td>
     <td><?=(int)$F_result_est_2010_2013 ?></td>
     <td><?=(int)$F_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$F_result_tpe_total?></td>
     <td><?=(int)$F_result_tpe_1947 ?></td>
     <td><?=(int)$F_result_tpe_1947_1959 ?></td>
     <td><?=(int)$F_result_tpe_1960_1970 ?></td>
     <td><?=(int)$F_result_tpe_1971_1979 ?></td>
     <td><?=(int)$F_result_tpe_1980_1989 ?></td>
     <td><?=(int)$F_result_tpe_1990_1999 ?></td>
     <td><?=(int)$F_result_tpe_2000_2009 ?></td>
     <td><?=(int)$F_result_tpe_2010_2013 ?></td>
     <td><?=(int)$F_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >G</td>
     <td rowspan=2 align="left">Wholesale and Retail Trade, Repair of Motor Vehicles and Motorcycles</td>
     
     <td>Estab.</td>
     <td><?=(int)$G_result_est_total?></td>
     <td><?=(int)$G_result_est_1947 ?></td>
     <td><?=(int)$G_result_est_1947_1959 ?></td>
     <td><?=(int)$G_result_est_1960_1970 ?></td>
     <td><?=(int)$G_result_est_1971_1979 ?></td>
     <td><?=(int)$G_result_est_1980_1989 ?></td>
     <td><?=(int)$G_result_est_1990_1999 ?></td>
     <td><?=(int)$G_result_est_2000_2009 ?></td>
     <td><?=(int)$G_result_est_2010_2013 ?></td>
     <td><?=(int)$G_result_est_not_reported ?></td>
   
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$G_result_tpe_total?></td>
     <td><?=(int)$G_result_tpe_1947 ?></td>
     <td><?=(int)$G_result_tpe_1947_1959 ?></td>
     <td><?=(int)$G_result_tpe_1960_1970 ?></td>
     <td><?=(int)$G_result_tpe_1971_1979 ?></td>
     <td><?=(int)$G_result_tpe_1980_1989 ?></td>
     <td><?=(int)$G_result_tpe_1990_1999 ?></td>
     <td><?=(int)$G_result_tpe_2000_2009 ?></td>
     <td><?=(int)$G_result_tpe_2010_2013 ?></td>
     <td><?=(int)$G_result_tpe_not_reported ?></td>
    
   </tr>


      <tr>
     <td rowspan=2 >H</td>
     <td rowspan=2 align="left">Transportation and Storage</td>
     
     <td>Estab.</td>
     <td><?=(int)$H_result_est_total?></td>
     <td><?=(int)$H_result_est_1947 ?></td>
     <td><?=(int)$H_result_est_1947_1959 ?></td>
     <td><?=(int)$H_result_est_1960_1970 ?></td>
     <td><?=(int)$H_result_est_1971_1979 ?></td>
     <td><?=(int)$H_result_est_1980_1989 ?></td>
     <td><?=(int)$H_result_est_1990_1999 ?></td>
     <td><?=(int)$H_result_est_2000_2009 ?></td>
     <td><?=(int)$H_result_est_2010_2013 ?></td>
     <td><?=(int)$H_result_est_not_reported ?></td>
    
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$H_result_tpe_total?></td>
     <td><?=(int)$H_result_tpe_1947 ?></td>
     <td><?=(int)$H_result_tpe_1947_1959 ?></td>
     <td><?=(int)$H_result_tpe_1960_1970 ?></td>
     <td><?=(int)$H_result_tpe_1971_1979 ?></td>
     <td><?=(int)$H_result_tpe_1980_1989 ?></td>
     <td><?=(int)$H_result_tpe_1990_1999 ?></td>
     <td><?=(int)$H_result_tpe_2000_2009 ?></td>
     <td><?=(int)$H_result_tpe_2010_2013 ?></td>
     <td><?=(int)$H_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >I</td>
     <td rowspan=2 align="left">Accommodation and Food Service Activities (Hotel and Restaurants)</td>
     
     <td>Estab.</td>
     <td><?=(int)$I_result_est_total?></td>
     <td><?=(int)$I_result_est_1947 ?></td>
     <td><?=(int)$I_result_est_1947_1959 ?></td>
     <td><?=(int)$I_result_est_1960_1970 ?></td>
     <td><?=(int)$I_result_est_1971_1979 ?></td>
     <td><?=(int)$I_result_est_1980_1989 ?></td>
     <td><?=(int)$I_result_est_1990_1999 ?></td>
     <td><?=(int)$I_result_est_2000_2009 ?></td>
     <td><?=(int)$I_result_est_2010_2013 ?></td>
     <td><?=(int)$I_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$I_result_tpe_total?></td>
     <td><?=(int)$I_result_tpe_1947 ?></td>
     <td><?=(int)$I_result_tpe_1947_1959 ?></td>
     <td><?=(int)$I_result_tpe_1960_1970 ?></td>
     <td><?=(int)$I_result_tpe_1971_1979 ?></td>
     <td><?=(int)$I_result_tpe_1980_1989 ?></td>
     <td><?=(int)$I_result_tpe_1990_1999 ?></td>
     <td><?=(int)$I_result_tpe_2000_2009 ?></td>
     <td><?=(int)$I_result_tpe_2010_2013 ?></td>
     <td><?=(int)$I_result_tpe_not_reported ?></td>
    
   </tr>


      <tr>
     <td rowspan=2 >J</td>
     <td rowspan=2 align="left">Information and Communication</td>
     
     <td>Estab.</td>
     <td><?=(int)$J_result_est_total?></td>
     <td><?=(int)$J_result_est_1947 ?></td>
     <td><?=(int)$J_result_est_1947_1959 ?></td>
     <td><?=(int)$J_result_est_1960_1970 ?></td>
     <td><?=(int)$J_result_est_1971_1979 ?></td>
     <td><?=(int)$J_result_est_1980_1989 ?></td>
     <td><?=(int)$J_result_est_1990_1999 ?></td>
     <td><?=(int)$J_result_est_2000_2009 ?></td>
     <td><?=(int)$J_result_est_2010_2013 ?></td>
     <td><?=(int)$J_result_est_not_reported ?></td>
    
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$J_result_tpe_total?></td>
     <td><?=(int)$J_result_tpe_1947 ?></td>
     <td><?=(int)$J_result_tpe_1947_1959 ?></td>
     <td><?=(int)$J_result_tpe_1960_1970 ?></td>
     <td><?=(int)$J_result_tpe_1971_1979 ?></td>
     <td><?=(int)$J_result_tpe_1980_1989 ?></td>
     <td><?=(int)$J_result_tpe_1990_1999 ?></td>
     <td><?=(int)$J_result_tpe_2000_2009 ?></td>
     <td><?=(int)$J_result_tpe_2010_2013 ?></td>
     <td><?=(int)$J_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >K</td>
     <td rowspan=2 align="left">Financial and Insurance Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$K_result_est_total?></td>
     <td><?=(int)$K_result_est_1947 ?></td>
     <td><?=(int)$K_result_est_1947_1959 ?></td>
     <td><?=(int)$K_result_est_1960_1970 ?></td>
     <td><?=(int)$K_result_est_1971_1979 ?></td>
     <td><?=(int)$K_result_est_1980_1989 ?></td>
     <td><?=(int)$K_result_est_1990_1999 ?></td>
     <td><?=(int)$K_result_est_2000_2009 ?></td>
     <td><?=(int)$K_result_est_2010_2013 ?></td>
     <td><?=(int)$K_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$K_result_tpe_total?></td>
     <td><?=(int)$K_result_tpe_1947 ?></td>
     <td><?=(int)$K_result_tpe_1947_1959 ?></td>
     <td><?=(int)$K_result_tpe_1960_1970 ?></td>
     <td><?=(int)$K_result_tpe_1971_1979 ?></td>
     <td><?=(int)$K_result_tpe_1980_1989 ?></td>
     <td><?=(int)$K_result_tpe_1990_1999 ?></td>
     <td><?=(int)$K_result_tpe_2000_2009 ?></td>
     <td><?=(int)$K_result_tpe_2010_2013 ?></td>
     <td><?=(int)$K_result_tpe_not_reported ?></td>
     
   </tr>


  <tr>
     <td rowspan=2 >L</td>
     <td rowspan=2 align="left">Real Estate Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$L_result_est_total?></td>
     <td><?=(int)$L_result_est_1947 ?></td>
     <td><?=(int)$L_result_est_1947_1959 ?></td>
     <td><?=(int)$L_result_est_1960_1970 ?></td>
     <td><?=(int)$L_result_est_1971_1979 ?></td>
     <td><?=(int)$L_result_est_1980_1989 ?></td>
     <td><?=(int)$L_result_est_1990_1999 ?></td>
     <td><?=(int)$L_result_est_2000_2009 ?></td>
     <td><?=(int)$L_result_est_2010_2013 ?></td>
     <td><?=(int)$L_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$L_result_tpe_total?></td>
     <td><?=(int)$L_result_tpe_1947 ?></td>
     <td><?=(int)$L_result_tpe_1947_1959 ?></td>
     <td><?=(int)$L_result_tpe_1960_1970 ?></td>
     <td><?=(int)$L_result_tpe_1971_1979 ?></td>
     <td><?=(int)$L_result_tpe_1980_1989 ?></td>
     <td><?=(int)$L_result_tpe_1990_1999 ?></td>
     <td><?=(int)$L_result_tpe_2000_2009 ?></td>
     <td><?=(int)$L_result_tpe_2010_2013 ?></td>
     <td><?=(int)$L_result_tpe_not_reported ?></td>
     
   </tr>


  <tr>
     <td rowspan=2 >M</td>
     <td rowspan=2 align="left">Professional, Scientific and Technical Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$M_result_est_total?></td>
     <td><?=(int)$M_result_est_1947 ?></td>
     <td><?=(int)$M_result_est_1947_1959 ?></td>
     <td><?=(int)$M_result_est_1960_1970 ?></td>
     <td><?=(int)$M_result_est_1971_1979 ?></td>
     <td><?=(int)$M_result_est_1980_1989 ?></td>
     <td><?=(int)$M_result_est_1990_1999 ?></td>
     <td><?=(int)$M_result_est_2000_2009 ?></td>
     <td><?=(int)$M_result_est_2010_2013 ?></td>
     <td><?=(int)$M_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$M_result_tpe_total?></td>
     <td><?=(int)$M_result_tpe_1947 ?></td>
     <td><?=(int)$M_result_tpe_1947_1959 ?></td>
     <td><?=(int)$M_result_tpe_1960_1970 ?></td>
     <td><?=(int)$M_result_tpe_1971_1979 ?></td>
     <td><?=(int)$M_result_tpe_1980_1989 ?></td>
     <td><?=(int)$M_result_tpe_1990_1999 ?></td>
     <td><?=(int)$M_result_tpe_2000_2009 ?></td>
     <td><?=(int)$M_result_tpe_2010_2013 ?></td>
     <td><?=(int)$M_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >N</td>
     <td rowspan=2 align="left">Administrative and Support Service Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$N_result_est_total?></td>
     <td><?=(int)$N_result_est_1947 ?></td>
     <td><?=(int)$N_result_est_1947_1959 ?></td>
     <td><?=(int)$N_result_est_1960_1970 ?></td>
     <td><?=(int)$N_result_est_1971_1979 ?></td>
     <td><?=(int)$N_result_est_1980_1989 ?></td>
     <td><?=(int)$N_result_est_1990_1999 ?></td>
     <td><?=(int)$N_result_est_2000_2009 ?></td>
     <td><?=(int)$N_result_est_2010_2013 ?></td>
     <td><?=(int)$N_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$N_result_tpe_total?></td>
     <td><?=(int)$N_result_tpe_1947 ?></td>
     <td><?=(int)$N_result_tpe_1947_1959 ?></td>
     <td><?=(int)$N_result_tpe_1960_1970 ?></td>
     <td><?=(int)$N_result_tpe_1971_1979 ?></td>
     <td><?=(int)$N_result_tpe_1980_1989 ?></td>
     <td><?=(int)$N_result_tpe_1990_1999 ?></td>
     <td><?=(int)$N_result_tpe_2000_2009 ?></td>
     <td><?=(int)$N_result_tpe_2010_2013 ?></td>
     <td><?=(int)$N_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >O</td>
     <td rowspan=2 align="left">Public Administration and Defense, Compulsory Social Security</td>
     
     <td>Estab.</td>
     <td><?=(int)$O_result_est_total?></td>
     <td><?=(int)$O_result_est_1947 ?></td>
     <td><?=(int)$O_result_est_1947_1959 ?></td>
     <td><?=(int)$O_result_est_1960_1970 ?></td>
     <td><?=(int)$O_result_est_1971_1979 ?></td>
     <td><?=(int)$O_result_est_1980_1989 ?></td>
     <td><?=(int)$O_result_est_1990_1999 ?></td>
     <td><?=(int)$O_result_est_2000_2009 ?></td>
     <td><?=(int)$O_result_est_2010_2013 ?></td>
     <td><?=(int)$O_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$O_result_tpe_total?></td>
     <td><?=(int)$O_result_tpe_1947 ?></td>
     <td><?=(int)$O_result_tpe_1947_1959 ?></td>
     <td><?=(int)$O_result_tpe_1960_1970 ?></td>
     <td><?=(int)$O_result_tpe_1971_1979 ?></td>
     <td><?=(int)$O_result_tpe_1980_1989 ?></td>
     <td><?=(int)$O_result_tpe_1990_1999 ?></td>
     <td><?=(int)$O_result_tpe_2000_2009 ?></td>
     <td><?=(int)$O_result_tpe_2010_2013 ?></td>
     <td><?=(int)$O_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >P</td>
     <td rowspan=2 align="left">Education</td>
     
     <td>Estab.</td>
     <td><?=(int)$P_result_est_total?></td>
     <td><?=(int)$P_result_est_1947 ?></td>
     <td><?=(int)$P_result_est_1947_1959 ?></td>
     <td><?=(int)$P_result_est_1960_1970 ?></td>
     <td><?=(int)$P_result_est_1971_1979 ?></td>
     <td><?=(int)$P_result_est_1980_1989 ?></td>
     <td><?=(int)$P_result_est_1990_1999 ?></td>
     <td><?=(int)$P_result_est_2000_2009 ?></td>
     <td><?=(int)$P_result_est_2010_2013 ?></td>
     <td><?=(int)$P_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$P_result_tpe_total?></td>
     <td><?=(int)$P_result_tpe_1947 ?></td>
     <td><?=(int)$P_result_tpe_1947_1959 ?></td>
     <td><?=(int)$P_result_tpe_1960_1970 ?></td>
     <td><?=(int)$P_result_tpe_1971_1979 ?></td>
     <td><?=(int)$P_result_tpe_1980_1989 ?></td>
     <td><?=(int)$P_result_tpe_1990_1999 ?></td>
     <td><?=(int)$P_result_tpe_2000_2009 ?></td>
     <td><?=(int)$P_result_tpe_2010_2013 ?></td>
     <td><?=(int)$P_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >Q</td>
     <td rowspan=2 align="left">Human Health and Social Work Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$Q_result_est_total?></td>
     <td><?=(int)$Q_result_est_1947 ?></td>
     <td><?=(int)$Q_result_est_1947_1959 ?></td>
     <td><?=(int)$Q_result_est_1960_1970 ?></td>
     <td><?=(int)$Q_result_est_1971_1979 ?></td>
     <td><?=(int)$Q_result_est_1980_1989 ?></td>
     <td><?=(int)$Q_result_est_1990_1999 ?></td>
     <td><?=(int)$Q_result_est_2000_2009 ?></td>
     <td><?=(int)$Q_result_est_2010_2013 ?></td>
     <td><?=(int)$Q_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$Q_result_tpe_total?></td>
     <td><?=(int)$Q_result_tpe_1947 ?></td>
     <td><?=(int)$Q_result_tpe_1947_1959 ?></td>
     <td><?=(int)$Q_result_tpe_1960_1970 ?></td>
     <td><?=(int)$Q_result_tpe_1971_1979 ?></td>
     <td><?=(int)$Q_result_tpe_1980_1989 ?></td>
     <td><?=(int)$Q_result_tpe_1990_1999 ?></td>
     <td><?=(int)$Q_result_tpe_2000_2009 ?></td>
     <td><?=(int)$Q_result_tpe_2010_2013 ?></td>
     <td><?=(int)$Q_result_tpe_not_reported ?></td>
     
   </tr>

  <tr>
     <td rowspan=2 >R</td>
     <td rowspan=2 align="left">Art, Entertainment and Recreation</td>
     
     <td>Estab.</td>
     <td><?=(int)$R_result_est_total?></td>
     <td><?=(int)$R_result_est_1947 ?></td>
     <td><?=(int)$R_result_est_1947_1959 ?></td>
     <td><?=(int)$R_result_est_1960_1970 ?></td>
     <td><?=(int)$R_result_est_1971_1979 ?></td>
     <td><?=(int)$R_result_est_1980_1989 ?></td>
     <td><?=(int)$R_result_est_1990_1999 ?></td>
     <td><?=(int)$R_result_est_2000_2009 ?></td>
     <td><?=(int)$R_result_est_2010_2013 ?></td>
     <td><?=(int)$R_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$R_result_tpe_total?></td>
     <td><?=(int)$R_result_tpe_1947 ?></td>
     <td><?=(int)$R_result_tpe_1947_1959 ?></td>
     <td><?=(int)$R_result_tpe_1960_1970 ?></td>
     <td><?=(int)$R_result_tpe_1971_1979 ?></td>
     <td><?=(int)$R_result_tpe_1980_1989 ?></td>
     <td><?=(int)$R_result_tpe_1990_1999 ?></td>
     <td><?=(int)$R_result_tpe_2000_2009 ?></td>
     <td><?=(int)$R_result_tpe_2010_2013 ?></td>
     <td><?=(int)$R_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >S</td>
     <td rowspan=2 align="left">Other Service Activities</td>
     
     <td>Estab.</td>
     <td><?=(int)$S_result_est_total?></td>
     <td><?=(int)$S_result_est_1947 ?></td>
     <td><?=(int)$S_result_est_1947_1959 ?></td>
     <td><?=(int)$S_result_est_1960_1970 ?></td>
     <td><?=(int)$S_result_est_1971_1979 ?></td>
     <td><?=(int)$S_result_est_1980_1989 ?></td>
     <td><?=(int)$S_result_est_1990_1999 ?></td>
     <td><?=(int)$S_result_est_2000_2009 ?></td>
     <td><?=(int)$S_result_est_2010_2013 ?></td>
     <td><?=(int)$S_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$S_result_tpe_total?></td>
     <td><?=(int)$S_result_tpe_1947 ?></td>
     <td><?=(int)$S_result_tpe_1947_1959 ?></td>
     <td><?=(int)$S_result_tpe_1960_1970 ?></td>
     <td><?=(int)$S_result_tpe_1971_1979 ?></td>
     <td><?=(int)$S_result_tpe_1980_1989 ?></td>
     <td><?=(int)$S_result_tpe_1990_1999 ?></td>
     <td><?=(int)$S_result_tpe_2000_2009 ?></td>
     <td><?=(int)$S_result_tpe_2010_2013 ?></td>
     <td><?=(int)$S_result_tpe_not_reported ?></td>
     
   </tr>


      <tr>
     <td rowspan=2 >T</td>
     <td rowspan=2 align="left">Activities of Households as Employers, Undifferentiated Goods and Services Producing Activities of Households for Own Use</td>
     
     <td>Estab.</td>
     <td><?=(int)$T_result_est_total?></td>
     <td><?=(int)$T_result_est_1947 ?></td>
     <td><?=(int)$T_result_est_1947_1959 ?></td>
     <td><?=(int)$T_result_est_1960_1970 ?></td>
     <td><?=(int)$T_result_est_1971_1979 ?></td>
     <td><?=(int)$T_result_est_1980_1989 ?></td>
     <td><?=(int)$T_result_est_1990_1999 ?></td>
     <td><?=(int)$T_result_est_2000_2009 ?></td>
     <td><?=(int)$T_result_est_2010_2013 ?></td>
     <td><?=(int)$T_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$T_result_tpe_total?></td>
     <td><?=(int)$T_result_tpe_1947 ?></td>
     <td><?=(int)$T_result_tpe_1947_1959 ?></td>
     <td><?=(int)$T_result_tpe_1960_1970 ?></td>
     <td><?=(int)$T_result_tpe_1971_1979 ?></td>
     <td><?=(int)$T_result_tpe_1980_1989 ?></td>
     <td><?=(int)$T_result_tpe_1990_1999 ?></td>
     <td><?=(int)$T_result_tpe_2000_2009 ?></td>
     <td><?=(int)$T_result_tpe_2010_2013 ?></td>
     <td><?=(int)$T_result_tpe_not_reported ?></td>
     
   </tr>


    <tr>
     <td rowspan=2 >U</td>
     <td rowspan=2 align="left">Activities of Extraterritorial Organizations and Bodies</td>
     
     <td>Estab.</td>
     <td><?=(int)$U_result_est_total?></td>
     <td><?=(int)$U_result_est_1947 ?></td>
     <td><?=(int)$U_result_est_1947_1959 ?></td>
     <td><?=(int)$U_result_est_1960_1970 ?></td>
     <td><?=(int)$U_result_est_1971_1979 ?></td>
     <td><?=(int)$U_result_est_1980_1989 ?></td>
     <td><?=(int)$U_result_est_1990_1999 ?></td>
     <td><?=(int)$U_result_est_2000_2009 ?></td>
     <td><?=(int)$U_result_est_2010_2013 ?></td>
     <td><?=(int)$U_result_est_not_reported ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$U_result_tpe_total?></td>
     <td><?=(int)$U_result_tpe_1947 ?></td>
     <td><?=(int)$U_result_tpe_1947_1959 ?></td>
     <td><?=(int)$U_result_tpe_1960_1970 ?></td>
     <td><?=(int)$U_result_tpe_1971_1979 ?></td>
     <td><?=(int)$U_result_tpe_1980_1989 ?></td>
     <td><?=(int)$U_result_tpe_1990_1999 ?></td>
     <td><?=(int)$U_result_tpe_2000_2009 ?></td>
     <td><?=(int)$U_result_tpe_2010_2013 ?></td>
     <td><?=(int)$U_result_tpe_not_reported ?></td>
     
   </tr>


   <!-- Calculation of Total Section -->
    
<?php 

//Estab. Section

$TOTAL_EST = $B_result_est_total + $C_result_est_total + $D_result_est_total + $E_result_est_total + $F_result_est_total + 
   $G_result_est_total + $H_result_est_total + $I_result_est_total + $J_result_est_total + $K_result_est_total + $L_result_est_total + 
   $M_result_est_total + $N_result_est_total + $O_result_est_total + $P_result_est_total + $Q_result_est_total + $R_result_est_total + 
   $S_result_est_total + $T_result_est_total + $U_result_est_total;


$TOTAL_EST_1947 = $B_result_est_1947 + $C_result_est_1947 + $D_result_est_1947 + $E_result_est_1947 + $F_result_est_1947 + 
   $G_result_est_1947 + $H_result_est_1947 + $I_result_est_1947 + $J_result_est_1947 + $K_result_est_1947 + $L_result_est_1947 + 
   $M_result_est_1947 + $N_result_est_1947 + $O_result_est_1947 + $P_result_est_1947 + $Q_result_est_1947 + $R_result_est_1947 + 
   $S_result_est_1947 + $T_result_est_1947 + $U_result_est_1947;

$TOTAL_EST_1947_1959 = $B_result_est_1947_1959 + $C_result_est_1947_1959 + $D_result_est_1947_1959 + $E_result_est_1947_1959 +
   $F_result_est_1947_1959 + $G_result_est_1947_1959 + $H_result_est_1947_1959 + $I_result_est_1947_1959 + $J_result_est_1947_1959 + 
   $K_result_est_1947_1959 + $L_result_est_1947_1959 + $M_result_est_1947_1959 + $N_result_est_1947_1959 + $O_result_est_1947_1959 + 
   $P_result_est_1947_1959 + $Q_result_est_1947_1959 + $R_result_est_1947_1959 + $S_result_est_1947_1959 + $T_result_est_1947_1959 + 
   $U_result_est_1947_1959;



$TOTAL_EST_1960_1970 = $B_result_est_1960_1970 + $C_result_est_1960_1970 + $D_result_est_1960_1970 + $E_result_est_1960_1970 +
   $F_result_est_1960_1970 + $G_result_est_1960_1970 + $H_result_est_1960_1970 + $I_result_est_1960_1970 + $J_result_est_1960_1970 + 
   $K_result_est_1960_1970 + $L_result_est_1960_1970 + $M_result_est_1960_1970 + $N_result_est_1960_1970 + $O_result_est_1960_1970 + 
   $P_result_est_1960_1970 + $Q_result_est_1960_1970 + $R_result_est_1960_1970 + $S_result_est_1960_1970 + $T_result_est_1960_1970 + 
   $U_result_est_1960_1970;


$TOTAL_EST_1971_1979 = $B_result_est_1971_1979 + $C_result_est_1971_1979 + $D_result_est_1971_1979 + $E_result_est_1971_1979 +
   $F_result_est_1971_1979 + $G_result_est_1971_1979 + $H_result_est_1971_1979 + $I_result_est_1971_1979 + $J_result_est_1971_1979 + 
   $K_result_est_1971_1979 + $L_result_est_1971_1979 + $M_result_est_1971_1979 + $N_result_est_1971_1979 + $O_result_est_1971_1979 + 
   $P_result_est_1971_1979 + $Q_result_est_1971_1979 + $R_result_est_1971_1979 + $S_result_est_1971_1979 + $T_result_est_1971_1979 + 
   $U_result_est_1971_1979;



$TOTAL_EST_1980_1989 = $B_result_est_1980_1989 + $C_result_est_1980_1989 + $D_result_est_1980_1989 + $E_result_est_1980_1989 +
   $F_result_est_1980_1989 + $G_result_est_1980_1989 + $H_result_est_1980_1989 + $I_result_est_1980_1989 + $J_result_est_1980_1989 + 
   $K_result_est_1980_1989 + $L_result_est_1980_1989 + $M_result_est_1980_1989 + $N_result_est_1980_1989 + $O_result_est_1980_1989 + 
   $P_result_est_1980_1989 + $Q_result_est_1980_1989 + $R_result_est_1980_1989 + $S_result_est_1980_1989 + $T_result_est_1980_1989 + 
   $U_result_est_1980_1989;


$TOTAL_EST_1990_1999 = $B_result_est_1990_1999 + $C_result_est_1990_1999 + $D_result_est_1990_1999 + $E_result_est_1990_1999 +
   $F_result_est_1990_1999 + $G_result_est_1990_1999 + $H_result_est_1990_1999 + $I_result_est_1990_1999 + $J_result_est_1990_1999 + 
   $K_result_est_1990_1999 + $L_result_est_1990_1999 + $M_result_est_1990_1999 + $N_result_est_1990_1999 + $O_result_est_1990_1999 + 
   $P_result_est_1990_1999 + $Q_result_est_1990_1999 + $R_result_est_1990_1999 + $S_result_est_1990_1999 + $T_result_est_1990_1999 + 
   $U_result_est_1990_1999;


$TOTAL_EST_2000_2009 = $B_result_est_2000_2009 + $C_result_est_2000_2009 + $D_result_est_2000_2009 + $E_result_est_2000_2009 +
   $F_result_est_2000_2009 + $G_result_est_2000_2009 + $H_result_est_2000_2009 + $I_result_est_2000_2009 + $J_result_est_2000_2009 + 
   $K_result_est_2000_2009 + $L_result_est_2000_2009 + $M_result_est_2000_2009 + $N_result_est_2000_2009 + $O_result_est_2000_2009 + 
   $P_result_est_2000_2009 + $Q_result_est_2000_2009 + $R_result_est_2000_2009 + $S_result_est_2000_2009 + $T_result_est_2000_2009 + 
   $U_result_est_2000_2009;


$TOTAL_EST_2010_2013 = $B_result_est_2010_2013 + $C_result_est_2010_2013 + $D_result_est_2010_2013 + $E_result_est_2010_2013 +
   $F_result_est_2010_2013 + $G_result_est_2010_2013 + $H_result_est_2010_2013 + $I_result_est_2010_2013 + $J_result_est_2010_2013 + 
   $K_result_est_2010_2013 + $L_result_est_2010_2013 + $M_result_est_2010_2013 + $N_result_est_2010_2013 + $O_result_est_2010_2013 + 
   $P_result_est_2010_2013 + $Q_result_est_2010_2013 + $R_result_est_2010_2013 + $S_result_est_2010_2013 + $T_result_est_2010_2013 + 
   $U_result_est_2010_2013;


$TOTAL_EST_NOT_REPORTED = $B_result_est_not_reported + $C_result_est_not_reported + $D_result_est_not_reported + $E_result_est_not_reported +$F_result_est_not_reported + $G_result_est_not_reported + $H_result_est_not_reported + 
    $I_result_est_not_reported + $J_result_est_not_reported + $K_result_est_not_reported + $L_result_est_not_reported + 
    $M_result_est_not_reported + $N_result_est_not_reported + $O_result_est_not_reported + $P_result_est_not_reported + 
    $Q_result_est_not_reported + $R_result_est_not_reported + $S_result_est_not_reported + $T_result_est_not_reported + 
    $U_result_est_not_reported;


//Calculate Total TPE Section

$TOTAL_TPE = $B_result_tpe_total + $C_result_tpe_total + $D_result_tpe_total + $E_result_tpe_total + $F_result_tpe_total + 
   $G_result_tpe_total + $H_result_tpe_total + $I_result_tpe_total + $J_result_tpe_total + $K_result_tpe_total + $L_result_tpe_total + 
   $M_result_tpe_total + $N_result_tpe_total + $O_result_tpe_total + $P_result_tpe_total + $Q_result_tpe_total + $R_result_tpe_total + 
   $S_result_tpe_total + $T_result_tpe_total + $U_result_tpe_total;

$TOTAL_TPE_1947 = $B_result_tpe_1947 + $C_result_tpe_1947 + $D_result_tpe_1947 + $E_result_tpe_1947 + $F_result_tpe_1947 + 
   $G_result_tpe_1947+ $H_result_tpe_1947 + $I_result_tpe_1947 + $J_result_tpe_1947 + $K_result_tpe_1947 + $L_result_tpe_1947 + 
   $M_result_tpe_1947 + $N_result_tpe_1947 + $O_result_tpe_1947 + 
   $P_result_tpe_1947 + $Q_result_tpe_1947 + $R_result_tpe_1947 + $S_result_tpe_1947 + $T_result_tpe_1947 + $U_result_tpe_1947;

$TOTAL_TPE_1947_1959 = $B_result_tpe_1947_1959 + $C_result_tpe_1947_1959 + $D_result_tpe_1947_1959 + $E_result_tpe_1947_1959 +
   $F_result_tpe_1947_1959 + $G_result_tpe_1947_1959 + $H_result_tpe_1947_1959 + $I_result_tpe_1947_1959 + $J_result_tpe_1947_1959 + 
   $K_result_tpe_1947_1959 + $L_result_tpe_1947_1959 + $M_result_tpe_1947_1959 + $N_result_tpe_1947_1959 + $O_result_tpe_1947_1959 + 
   $P_result_tpe_1947_1959 + $Q_result_tpe_1947_1959 + $R_result_tpe_1947_1959 + $S_result_tpe_1947_1959 + $T_result_tpe_1947_1959 + 
   $U_result_tpe_1947_1959;


$TOTAL_TPE_1960_1970 = $B_result_tpe_1960_1970 + $C_result_tpe_1960_1970 + $D_result_tpe_1960_1970 + $E_result_tpe_1960_1970 +
   $F_result_tpe_1960_1970 + $G_result_tpe_1960_1970 + $H_result_tpe_1960_1970 + $I_result_tpe_1960_1970 + $J_result_tpe_1960_1970 + 
   $K_result_tpe_1960_1970 + $L_result_tpe_1960_1970 + $M_result_tpe_1960_1970 + $N_result_tpe_1960_1970 + $O_result_tpe_1960_1970 + 
   $P_result_tpe_1960_1970 + $Q_result_tpe_1960_1970 + $R_result_tpe_1960_1970 + $S_result_tpe_1960_1970 + $T_result_tpe_1960_1970 + 
   $U_result_tpe_1960_1970;


$TOTAL_TPE_1971_1979 = $B_result_tpe_1971_1979 + $C_result_tpe_1971_1979 + $D_result_tpe_1971_1979 + $E_result_tpe_1971_1979 +
   $F_result_tpe_1971_1979 + $G_result_tpe_1971_1979 + $H_result_tpe_1971_1979 + $I_result_tpe_1971_1979 + $J_result_tpe_1971_1979 + 
   $K_result_tpe_1971_1979 + $L_result_tpe_1971_1979 + $M_result_tpe_1971_1979 + $N_result_tpe_1971_1979 + $O_result_tpe_1971_1979 + 
   $P_result_tpe_1971_1979 + $Q_result_tpe_1971_1979 + $R_result_tpe_1971_1979 + $S_result_tpe_1971_1979 + $T_result_tpe_1971_1979 + 
   $U_result_tpe_1971_1979;



$TOTAL_TPE_1980_1989 = $B_result_tpe_1980_1989 + $C_result_tpe_1980_1989 + $D_result_tpe_1980_1989 + $E_result_tpe_1980_1989 +
   $F_result_tpe_1980_1989 + $G_result_tpe_1980_1989 + $H_result_tpe_1980_1989 + $I_result_tpe_1980_1989 + $J_result_tpe_1980_1989 + 
   $K_result_tpe_1980_1989 + $L_result_tpe_1980_1989 + $M_result_tpe_1980_1989 + $N_result_tpe_1980_1989 + $O_result_tpe_1980_1989 + 
   $P_result_tpe_1980_1989 + $Q_result_tpe_1980_1989 + $R_result_tpe_1980_1989 + $S_result_tpe_1980_1989 + $T_result_tpe_1980_1989 + 
   $U_result_tpe_1980_1989;


$TOTAL_TPE_1990_1999 = $B_result_tpe_1990_1999 + $C_result_tpe_1990_1999 + $D_result_tpe_1990_1999 + $E_result_tpe_1990_1999 +
   $F_result_tpe_1990_1999 + $G_result_tpe_1990_1999 + $H_result_tpe_1990_1999 + $I_result_tpe_1990_1999 + $J_result_tpe_1990_1999 + 
   $K_result_tpe_1990_1999 + $L_result_tpe_1990_1999 + $M_result_tpe_1990_1999 + $N_result_tpe_1990_1999 + $O_result_tpe_1990_1999 + 
   $P_result_tpe_1990_1999 + $Q_result_tpe_1990_1999 + $R_result_tpe_1990_1999 + $S_result_tpe_1990_1999 + $T_result_tpe_1990_1999 + 
   $U_result_tpe_1990_1999;


$TOTAL_TPE_2000_2009 = $B_result_tpe_2000_2009 + $C_result_tpe_2000_2009 + $D_result_tpe_2000_2009 + $E_result_tpe_2000_2009 +
   $F_result_tpe_2000_2009 + $G_result_tpe_2000_2009 + $H_result_tpe_2000_2009 + $I_result_tpe_2000_2009 + $J_result_tpe_2000_2009 + 
   $K_result_tpe_2000_2009 + $L_result_tpe_2000_2009 + $M_result_tpe_2000_2009 + $N_result_tpe_2000_2009 + $O_result_tpe_2000_2009 + 
   $P_result_tpe_2000_2009 + $Q_result_tpe_2000_2009 + $R_result_tpe_2000_2009 + $S_result_tpe_2000_2009 + $T_result_tpe_2000_2009 + 
   $U_result_tpe_2000_2009;


$TOTAL_TPE_2010_2013 = $B_result_tpe_2010_2013 + $C_result_tpe_2010_2013 + $D_result_tpe_2010_2013 + $E_result_tpe_2010_2013 +
   $F_result_tpe_2010_2013 + $G_result_tpe_2010_2013 + $H_result_tpe_2010_2013 + $I_result_tpe_2010_2013 + $J_result_tpe_2010_2013 + 
   $K_result_tpe_2010_2013 + $L_result_tpe_2010_2013 + $M_result_tpe_2010_2013 + $N_result_tpe_2010_2013 + $O_result_tpe_2010_2013 + 
   $P_result_tpe_2010_2013 + $Q_result_tpe_2010_2013 + $R_result_tpe_2010_2013 + $S_result_tpe_2010_2013 + $T_result_tpe_2010_2013 + 
   $U_result_tpe_2010_2013;


$TOTAL_TPE_NOT_REPORTED = $B_result_tpe_not_reported + $C_result_tpe_not_reported + $D_result_tpe_not_reported + $E_result_tpe_not_reported +$F_result_tpe_not_reported + $G_result_tpe_not_reported + $H_result_tpe_not_reported + $I_result_tpe_not_reported + 
   $J_result_tpe_not_reported + $K_result_tpe_not_reported + $L_result_tpe_not_reported + $M_result_tpe_not_reported + 
   $N_result_tpe_not_reported + $O_result_tpe_not_reported + $P_result_tpe_not_reported + $Q_result_tpe_not_reported + 
   $R_result_tpe_not_reported + $S_result_tpe_not_reported + $T_result_tpe_not_reported + $U_result_tpe_not_reported;



?>




   <tr>
     <td rowspan="2" colspan="2" style = "text-align: center" ><strong>Zila Total</strong></td>
     
     <td>Estab.</td>
     <td><?=(int)$TOTAL_EST ?></td>
     <td><?=(int)$TOTAL_EST_1947 ?></td>
     <td><?=(int)$TOTAL_EST_1947_1959 ?></td>
     <td><?=(int)$TOTAL_EST_1960_1970 ?></td>
     <td><?=(int)$TOTAL_EST_1971_1979 ?></td>
     <td><?=(int)$TOTAL_EST_1980_1989 ?></td>
     <td><?=(int)$TOTAL_EST_1990_1999 ?></td>
     <td><?=(int)$TOTAL_EST_2000_2009 ?></td>
     <td><?=(int)$TOTAL_EST_2010_2013 ?></td>
     <td><?=(int)$TOTAL_EST_NOT_REPORTED ?></td>
     
   </tr>

<tr>
    <td>Persons</td>
     <td><?=(int)$TOTAL_TPE ?></td>
     <td><?=(int)$TOTAL_TPE_1947 ?></td>
     <td><?=(int)$TOTAL_TPE_1947_1959 ?></td>
     <td><?=(int)$TOTAL_TPE_1960_1970 ?></td>
     <td><?=(int)$TOTAL_TPE_1971_1979 ?></td>
     <td><?=(int)$TOTAL_TPE_1980_1989 ?></td>
     <td><?=(int)$TOTAL_TPE_1990_1999 ?></td>
     <td><?=(int)$TOTAL_TPE_2000_2009 ?></td>
     <td><?=(int)$TOTAL_TPE_2010_2013 ?></td>
     <td><?=(int)$TOTAL_TPE_NOT_REPORTED ?></td>
     
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