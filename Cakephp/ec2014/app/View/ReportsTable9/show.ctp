<?php echo $this -> Session -> flash(); ?>

<?php echo $this -> Form -> create(); ?>
<h3>Filter Data</h3>
<b>Divn:</b><select id="divn_id" name="geo_code_divn"><option value="">Please Select</option></select>
<b>Zila:</b><select id="zila_id" name="geo_code_zila"><option value="">Please Select</option></select>
<!-- <b>Upazila:</b><select id="upazila_id" name="geo_code_upazila"><option value="">Please Select</option></select>
<b>PSA:</b><select id="psa_id" name="geo_code_psa"><option value="">Please Select</option></select>
<b>Union:</b><select id="union_id" name="geo_code_union"><option value="">Please Select</option></select> -->
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
<!--   <tr>
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
  </tr> -->
</table>


<?php echo $this -> Form -> end(__('Submit')); ?>    
<br><br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php 
 if($this -> request -> is('post')){
  #debug($result);

?>

<div id="table_for_print">

  <div class="notice"> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quos, cupiditate eligendi quo optio repellat minima debitis eveniet itaque? Inventore culpa quisquam delectus, rem maxime tempora, earum sequi laboriosam consequatur.</div><br>
  
<table border="1" style="border-collapse:collapse;border:none; text-align : center; width:100%;" id="tblExport">


<tr>
   <td colspan="9"><b>Table- 9: Number of Establishment by Size of Investment by Non-Resident Bangladeshi (NRB), Location and Upazila in 2013.</b></td>
</tr>



  <tr >
  <td rowspan=2 >Location & Type of Economic Activities</td>
  <td rowspan=2 >Number of Establishment</td>
  <td colspan=7 >Investment Level (in 'Lac' TK.)</td>
 </tr>

 <tr >
  <td >Up to 5</td>
  <td >5-50</td>
  <td >50-100</td>
  <td >100-1000</td>
  <td >1000-1500</td>
  <td >1500-3000</td>
  <td >3000 to above</td>
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
 </tr>
 <tr>
   <td ><strong><?=substr($zila, 0, -4);  ?></strong></td>
   <td colspan=8>&nbsp;</td>
 </tr>


 <?php 
      $TOTAL_EST = 0;
      $INVEST_5 = 0;
      $INVEST_5_50 = 0;
      $INVEST_50_100 = 0;
      $INVEST_100_1000 = 0;
      $INVEST_1000_1500 = 0;
      $INVEST_1500_3000 = 0;
      $INVEST_3000_ABOVE = 0;
?>


<?php 

foreach ($result as $data) { ?>


<?php 
    $TOTAL_EST += $data['TOTAL_EST'];
    $INVEST_5 += $data['INVEST_5'];
    $INVEST_5_50 += $data['INVEST_5_50'];
    $INVEST_50_100 += $data['INVEST_50_100'];
    $INVEST_100_1000 += $data['INVEST_100_1000'];
    $INVEST_1000_1500 += $data['INVEST_1000_1500'];
    $INVEST_1500_3000 += $data['INVEST_1500_3000'];
    $INVEST_3000_ABOVE += $data['INVEST_3000_ABOVE'];
?>



<tr>
   <td><?=ucwords($data['UPZILA_NAME']) ?></td>
   <td><?=$data['TOTAL_EST'] ?></td>
   <td><?=$data['INVEST_5'] ?></td>
   <td><?=$data['INVEST_5_50'] ?></td>
   <td><?=$data['INVEST_50_100'] ?></td>
   <td><?=$data['INVEST_100_1000'] ?></td>
   <td><?=$data['INVEST_1000_1500'] ?></td>
   <td><?=$data['INVEST_1500_3000'] ?></td>
   <td><?=$data['INVEST_3000_ABOVE'] ?></td>
 </tr>

  
<?php } ?>


<tr>
   <td><strong>Zila Total</strong></td>
   <td><?=$TOTAL_EST; ?></td>
   <td><?=$INVEST_5; ?></td>
   <td><?=$INVEST_5_50; ?></td>
   <td><?=$INVEST_50_100; ?></td>
   <td><?=$INVEST_100_1000; ?></td>
   <td><?=$INVEST_1000_1500; ?></td>
   <td><?=$INVEST_1500_3000; ?></td>
   <td><?=$INVEST_3000_ABOVE; ?></td>
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