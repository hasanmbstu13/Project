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
   <td colspan="9"><b>Table- 3: Size of Establishment by Economic Activity, Category and Location in 2013.</b></td>
</tr>

 <tr>
      <td rowspan = "2"><strong>BSIC Code<br>(4 Digit)</strong></td>
      <td rowspan = "2"><strong>Location & Economic Activity</strong></td>
      <td rowspan = "2"><strong>Data Item</strong></td>
      <td rowspan = "2"><strong>Total</strong></td>
      <td colspan=  "5"><strong>Size of Establishments</strong></td>
      
  </tr>

    <tr>
      <td>Cottage</td>
      <td>Micro</td>
      <td>Small</td>
      <td>Medium</td>
      <td>Large</td>  
    </tr>


    <tr>
      <td>1 </td>
      <td>2 </td>
      <td>3 </td>
      <td>4 </td>
      <td>5 </td>
      <td>6 </td>
      <td>7 </td>
      <td>8 </td>
      <td>9 </td>      
    </tr>

<tr>
  <td colspan = "2"><strong><?=substr($zila, 0, -4);  ?></strong></td>
  <td colspan = "7"> </td>
</tr>

<?php 

    #debug($data);
    foreach ($data as $res)  
    { 
         if ($res['total_est'] != 0)
         {

?>          <tr>
      <td align="left" rowspan = "2"><?= $res['bsic_code']; ?></td>
      <td align="left" rowspan = "2" ><?= $res['bsic_description']; ?></td>

      <td>Estab.</td>
      <td><?= $res['total_est']; ?></td>
      <td><?= $res['cottage_est']; ?></td>
      <td><?= $res['micro_est']; ?></td>
      <td><?= $res['small_est']; ?></td>
      <td><?= $res['medium_est']; ?></td>
      <td><?= $res['large_est']; ?></td>
     
</tr>

<tr>
   <td>Persons</td>
   <td><?= $res['total_person']; ?></td>
   <td><?= $res['cottage_person']; ?></td>
   <td><?= $res['micro_person']; ?></td>
   <td><?= $res['small_person']; ?></td>
   <td><?= $res['medium_person']; ?></td>
   <td><?= $res['large_person']; ?></td>

</tr>

<?php 
  }
  ?>
  

     

  <?php
    }
  ?>


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