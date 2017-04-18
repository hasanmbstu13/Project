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

<?php 

if($this -> request -> is('post'))
 {
?>

<div id="table_for_print">

  <div class="notice"> </div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">

<tr>
    <td colspan="7"><b>Table 7.5: Total number of permanent establishments &total persons engaged (TPE) by ownership & average size of establishments in 2013 and in 2001 & 03</b></td>
  </tr>

 <table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">

    <tr>
      <td rowspan="2"><strong>Ownership</strong></td>
      <td colspan="3"><strong>2001 & 2003</strong></td>
      <td colspan="3"><strong>2013</strong></td>
    </tr>

    <tr>
      <td>Estab.</td>
      <td>TPE</td>
      <td>Average size of estab</td>
      <td>Estab.</td>
      <td>TPE</td>
      <td>Average size of estab.</td>
    </tr>


    <tr>
      <td>1 </td>
      <td>2 </td>
      <td>3 </td>
      <td>4 </td>
      <td>5 </td>
      <td>6 </td>
      <td>7 </td>
    </tr>


  <?php

  $TOTAL_EST = 0;
  $TOTAL_LOCAL = 0;
  $TOTAL_EXPORT = 0;
  $TOTAL_BOTH = 0;
  $TOTAL_NOT_APPILCABLE = 0;

  ?>


  <tr>
      <td><strong>01</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $A_Total_unit ?></td>
      <td><?= $A_Total_Person ?></td>
     <td><?=round(($A_Total_Person / $A_Total_unit), 2); ?></td>

    </tr>

    <tr>
      <td><strong>02</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $B_Total_unit ?></td>
      <td><?= $B_Total_Person ?></td>
     <td><?=round(($B_Total_Person / $B_Total_unit), 2); ?></td>

    </tr>

    <tr>
      <td><strong>03</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $C_Total_unit ?></td>
      <td><?= $C_Total_Person ?></td>
     <td><?=round(($C_Total_Person / $C_Total_unit), 2); ?></td>

    </tr>


    <tr>
      <td><strong>04</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $D_Total_unit ?></td>
      <td><?= $D_Total_Person ?></td>
     <td><?=round(($D_Total_Person / $D_Total_unit), 2); ?></td>

    </tr>
    <tr>
      <td><strong>05</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $E_Total_unit ?></td>
      <td><?= $E_Total_Person ?></td>
     <td><?=round(($E_Total_Person / $E_Total_unit), 2); ?></td>
    </tr>


    <tr>
      <td><strong>06</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $F_Total_unit ?></td>
      <td><?= $F_Total_Person ?></td>
     <td><?=round(($F_Total_Person / $F_Total_unit), 2); ?></td>

    </tr>
    <tr>
      <td><strong>07</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $G_Total_unit ?></td>
      <td><?= $F_Total_Person ?></td>
     <td><?=round(($G_Total_Person / $G_Total_unit), 2); ?></td>

    </tr>


    <tr>
      <td><strong>08</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $H_Total_unit ?></td>
      <td><?= $H_Total_Person ?></td>
     <td><?=round(($H_Total_Person / $H_Total_unit), 2); ?></td>

    </tr>
    <tr>
      <td><strong>09</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $I_Total_unit ?></td>
      <td><?= $I_Total_Person ?></td>
     <td><?=round(($I_Total_Person / $I_Total_unit), 2); ?></td>

    </tr>


    <tr>
      <td><strong>10</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $J_Total_unit ?></td>
      <td><?= $J_Total_Person ?></td>
     <td><?=round(($J_Total_Person / $J_Total_unit), 2); ?></td>

    </tr>
    <tr>
      <td><strong>11</strong></td>
      <td></td>
      <td></td>
      <td></td>
     <td><?= $K_Total_unit ?></td>
      <td><?= $K_Total_Person ?></td>
     <td><?=round(($K_Total_Person / $K_Total_unit), 2); ?></td>

    </tr>


    <tr>
      <td><strong>12</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $L_Total_unit ?></td>
      <td><?= $L_Total_Person ?></td>
      <td><?=round(($L_Total_Person / $L_Total_unit), 2); ?></td>
    </tr>


<?php 

$Total_unit = $A_Total_unit + $B_Total_unit + $C_Total_unit + $D_Total_unit + 
$E_Total_unit + $F_Total_unit + $G_Total_unit + $H_Total_unit + $I_Total_unit + 
$J_Total_unit + $K_Total_unit + $L_Total_unit + $M_Total_unit + $N_Total_unit + 
$O_Total_unit + $P_Total_unit + $Q_Total_unit + $R_Total_unit + $S_Total_unit + 
$T_Total_unit + $U_Total_unit;

$Total_Person = $A_Total_Person+ $B_Total_Person+ $C_Total_Person+ $D_Total_Person +
$E_Total_Person + $F_Total_Person+ $G_Total_Person + $H_Total_Person + $I_Total_Person +
$J_Total_Person + $K_Total_Person+ $L_Total_Person + $M_Total_Person + $N_Total_Person +
$O_Total_Person + $P_Total_Person+$Q_Total_Person + $R_Total_Person + $S_Total_Person +
$T_Total_Person + $U_Total_Person; 


?>

    <tr>
      <td><strong>Total</strong></td>
      <td></td>
      <td></td>
      <td></td>
      <td><?= $Total_unit ?></td>
      <td><?= $Total_Person ?></td>
      <td><?=round(($Total_Person / $Total_unit), 2); ?></td>
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
