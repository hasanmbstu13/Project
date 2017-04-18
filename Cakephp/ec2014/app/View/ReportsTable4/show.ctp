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
   <td colspan="28"><b>Table- 4: Number of permanent establishments by ownership, economic activity and total persons engaged (TPE) in 2013.</b></td>
</tr>

 <tr style='height:37.0pt'>
  <td  rowspan=2 >BSIC Code <br>(3 Digit)</td>
  <td  rowspan=2 >Location, Economic Activity &amp; sex</td>
  <td  colspan=2 >Total</td>
  <td  colspan=2 >Private/family owned </td>
  <td  colspan=2 >Partnership</td>
  <td  colspan=2 >Private Ltd.</td>
  <td  colspan=2 >Public Ltd.</td>
  <td  colspan=2 >Government</td>
  <td  colspan=2 >Autonomous</td>
  <td  colspan=2 >Foreign</td>
  <td  colspan=2 >Joint Venture</td>
  <td  colspan=2 >Cooperative</td>
  <td  colspan=2 >NPI</td>
  <td  colspan=2 >NRB</td>
  <td  colspan=2 >Others</td>
 </tr>

 <tr>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
   <td>Estab</td>
   <td>Persons</td>
 </tr>



 <tr >
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
  <td>18</td>
  <td>19</td>
  <td>20</td>
  <td>21</td>
  <td>22</td>
  <td>23</td>
  <td>24</td>
  <td>25</td>
  <td>26</td>
  <td>27</td>
  <td>28</td>
 </tr>

 <tr>
   <td >&nbsp;</td>
   <td ><strong><?=substr($zila, 0,-4);?></strong></td>
   <td colspan=26>&nbsp;</td>
 </tr>
<?php

    $total_est = 0;
    $total_person = 0;
    $private_est = 0;
    $private_person = 0;
    $partner_est = 0;
    $partner_person = 0;  
    $privateltd_est = 0;
    $privateltd_person = 0;
    $public_est = 0;
    $public_person = 0;
    $govt_est = 0;
    $govt_person = 0;
    $autonomous_est = 0;
    $autonomous_person = 0;
    $foreign_est = 0;
    $foreign_person = 0;
    $joint_est = 0;
    $joint_person = 0;
    $cooperative_est = 0;
    $cooperative_person = 0;
    $npi_est = 0;
    $npi_person = 0;
    $nrb_est = 0;
    $nrb_person = 0;
    $others_est = 0;
    $others_person = 0;

?>

<?php 
    #debug($data);
    foreach ($data as $res)  { 

      if ($res['total_est'] != 0 ) {
?>

    <?php

    $total_est += $res['total_est'];
    $total_person += $res['total_person'];
    $private_est += $res['private_est'];
    $private_person += $res['private_person'];
    $partner_est += $res['partner_est'];
    $partner_person += $res['partner_person'];  
    $privateltd_est += $res['privateltd_est'];
    $privateltd_person += $res['privateltd_person'];
    $public_est += $res['public_est'];
    $public_person += $res['public_person'];
    $govt_est += $res['govt_est'];
    $govt_person += $res['govt_person'];
    $autonomous_est += $res['autonomous_est'];
    $autonomous_person += $res['autonomous_person'];
    $foreign_est += $res['foreign_est'];
    $foreign_person += $res['foreign_person'];
    $joint_est += $res['joint_est'];
    $joint_person += $res['joint_person'];
    $cooperative_est += $res['cooperative_est'];
    $cooperative_person += $res['cooperative_person'];
    $npi_est += $res['npi_est'];
    $npi_person += $res['npi_person'];
    $nrb_est += $res['nrb_est'];
    $nrb_person += $res['nrb_person'];
    $others_est += $res['others_est'];
    $others_person += $res['others_person'];

    ?>

 <tr>
    <td align="left" ><?= $res['bsic_code']; ?></td>
     <td align="left"><?= $res['bsic_description']; ?></td>

     <td ><?= $res['total_est']; ?></td>
     <td ><?= $res['total_person']; ?></td>
     <td ><?= $res['private_est']; ?></td>
     <td ><?= $res['private_person']; ?></td>
     <td ><?= $res['partner_est']; ?></td>
     <td ><?= $res['partner_person']; ?></td>
     <td ><?= $res['privateltd_est']; ?></td>
     <td ><?= $res['privateltd_person']; ?></td>
     <td ><?= $res['public_est']; ?></td>
     <td ><?= $res['public_person']; ?></td>
     <td ><?= $res['govt_est']; ?></td>
     <td ><?= $res['govt_person']; ?></td>
     <td ><?= $res['autonomous_est']; ?></td>
     <td ><?= $res['autonomous_person']; ?></td>
     <td ><?= $res['foreign_est']; ?></td>
     <td ><?= $res['foreign_person']; ?></td>
     <td ><?= $res['joint_est']; ?></td>
     <td ><?= $res['joint_person']; ?></td>
     <td ><?= $res['cooperative_est']; ?></td>
     <td ><?= $res['cooperative_person']; ?></td>
     <td ><?= $res['npi_est']; ?></td>
     <td ><?= $res['npi_person']; ?></td>
     <td ><?= $res['nrb_est']; ?></td>
     <td ><?= $res['nrb_person']; ?></td>
     <td ><?= $res['others_est']; ?></td>
     <td ><?= $res['others_person']; ?></td>
  
 </tr>

<?php  } }  ?>

<tr>
    <td colspan="2" style="text-align:center"><strong>Total</strong></td>
    

     <td ><?= $total_est; ?></td>
     <td ><?= $total_person; ?></td>
     <td ><?= $private_est; ?></td>
     <td ><?= $private_person; ?></td>
     <td ><?= $partner_est; ?></td>
     <td ><?= $partner_person; ?></td>
     <td ><?= $privateltd_est; ?></td>
     <td ><?= $privateltd_person; ?></td>
     <td ><?= $public_est; ?></td>
     <td ><?= $public_person; ?></td>
     <td ><?= $govt_est; ?></td>
     <td ><?= $govt_person; ?></td>
     <td ><?= $autonomous_est; ?></td>
     <td ><?= $autonomous_person; ?></td>
     <td ><?= $foreign_est; ?></td>
     <td ><?= $foreign_person; ?></td>
     <td ><?= $joint_est; ?></td>
     <td ><?= $joint_person; ?></td>
     <td ><?= $cooperative_est; ?></td>
     <td ><?= $cooperative_person; ?></td>
     <td ><?= $npi_est; ?></td>
     <td ><?= $npi_person; ?></td>
     <td ><?= $nrb_est; ?></td>
     <td ><?= $nrb_person; ?></td>
     <td ><?= $others_est; ?></td>
     <td ><?= $others_person; ?></td>
  
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