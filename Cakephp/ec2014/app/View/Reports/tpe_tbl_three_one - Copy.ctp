<?php echo $this->Session->flash(); ?>

<?php echo $this->Form->create(); ?>
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


<?php echo $this->Form->end(__('Submit')); ?>    
<br><br>
<hr>
<!-- #################################   RESULT SHOW ############################  -->

<?php 
if($this -> request -> is('post'))
{
?>


 <table class=MsoNormalTable border=1 cellspacing=0 cellpadding=0
 style='border-collapse:collapse;border:none;' id="cssTable">

 <tr>
  <td width=108 rowspan=2 align="center" valign="middle"><strong>Type</strong></td>
  <td width=191 colspan=2 align="center" valign="middle"><strong>Establishments</strong></td>
  <td width=364 colspan=6 align="center" valign="middle" ><strong>Total persons engaged(TPE)</strong></td>
 </tr>

 <tr style='height:.1in'>
  <td width=100 align="center" valign="middle">Total</td>
  <td width=92 align="center" valign="middle" >%</td>
  <td width=64 align="center" valign="middle">Total</td>
  <td width=56 align="center" valign="middle">% </td>
  <td width=64 align="center" valign="middle">Male</td>
  <td width=56 align="center" valign="middle" >%</td>
  <td width=69 align="center" valign="middle">Female</td>
  <td width=56 align="center" valign="middle">%</td>
 </tr>

 <tr style='height:.1in'>
  <td width=110 align="center" valign="middle" >1 
  </td>
  <td width=110 align="center" valign="middle" >2
  </td>
  <td width=110 align="center" valign="middle">3
  </td>
  <td width=110 align="center" valign="middle">4
  </td>
  <td width=110 align="center" valign="middle">5
  </td>
  <td width=110 align="center" valign="middle">6
  </td>
  <td width=110 align="center" valign="middle">7
  </td>
  <td width=110 align="center" valign="middle">8
  </td>
  <td width=110 align="center" valign="middle">9
  </td>
 </tr>








 <!-- ONE -->
 <tr style='height:.1in'> <!-- Total -->
  <td width=108 rowspan=4 align="center" valign="middle">
  <p><strong>Total</strong></p> 
  <p>Permanent</p> 
  <p>Temporary</p> 
  <p>Economic household</p> 
  </td>
  <td width="100" align="center" valign="middle">&nbsp;
  	 <?=$total_est; ?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_est_person; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 100
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_est_male; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 100
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
  	 <?=$total_est_female; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 100
  </td>



 </tr>
 <tr style='height:.1in'>  <!-- Permanent -->
  <td width=100 align="center" valign="middle" >&nbsp;
  	 <?=$total_parmanent_est;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  	 <?=round((($total_parmanent_est/$total_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_parmanent_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 <?=round((($total_parmanent_est_person/$total_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_parmanent_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_parmanent_est_male/$total_est_male) * 100), 2);?>
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
  	 <?=$total_parmanent_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 <?=round((($total_parmanent_est_female/$total_est_female) * 100), 2);?>
  </td>
 </tr>




 <tr style='height:.1in'>  <!-- Temporary -->
  <td width=100 align="center" valign="middle" >&nbsp;
  	 <?=$total_temporary_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  	<?=round((($total_temporary_est/$total_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_temporary_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_temporary_est_person/$total_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_temporary_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	 <?=round((($total_temporary_est_male/$total_est_male) * 100), 2);?>
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
  	 <?=$total_temporary_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_temporary_est_female/$total_est_female) * 100), 2);?>
  </td>
 </tr>



 <tr style='height:.1in'> <!-- Household -->
  <td width=100 align="center" valign="middle" >&nbsp;
  	 <?=$total_household_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  	 <?=round((($total_household_est/$total_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_household_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_household_est_person/$total_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
  	 <?=$total_household_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_household_est_male/$total_est_male) * 100), 2);?>
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
  	 <?=$total_household_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  	<?=round((($total_household_est_female/$total_est_female) * 100), 2);?>
  </td>
 </tr>

 









<!-- TWO -->

 <tr style='height:.1in'> <!-- Total -->
  <td width=108 rowspan=4 align="center" valign="middle">
  <p><strong>Urban</strong></p> 
  <p>Permanent
  <p>Temporary
  <p>Economic household
  </td>
  <td width=100 align="center" valign="middle">&nbsp;
     <?=$total_urban_est; ?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_est_person; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_est_male; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_urban_est_female; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
 </tr>


 <tr style='height:.1in'>  <!-- Permanent -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_urban_parmanent_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
     <?=round((($total_urban_parmanent_est/$total_urban_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_parmanent_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     <?=round((($total_urban_parmanent_est_person/$total_urban_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_parmanent_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_parmanent_est_male/$total_urban_est_male) * 100), 2);?>
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_urban_parmanent_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     <?=round((($total_urban_parmanent_est_female/$total_urban_est_female) * 100), 2);?>
  </td>
 </tr>



 <tr style='height:.1in'>  <!-- Temporary -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_urban_temporary_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_temporary_est/$total_urban_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_temporary_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_temporary_est_person/$total_urban_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_temporary_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_temporary_est_male/$total_urban_est_male) * 100), 2);?> 
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_urban_temporary_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_temporary_est_female/$total_urban_est_female) * 100), 2);?>
  </td>
 </tr>



 <tr style='height:.1in'> <!-- Household -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_urban_household_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
   <?=round((($total_urban_household_est/$total_urban_est) * 100), 2); ?> 
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_household_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_urban_household_est_person/$total_urban_est_person) * 100), 2);?> 
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_urban_household_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_urban_household_est_male/$total_urban_est_male) * 100), 2);?>
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_urban_household_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  <?=round((($total_urban_household_est_female/$total_urban_est_female) * 100), 2);?>  
  </td>
 </tr>











<!-- THREE_rural -->
 <tr style='height:.1in'> <!-- Total -->
  <td width=108 rowspan=4 align="center" valign="middle">
  <p><strong>Rural</strong></p> 
  <p>Permanent
  <p>Temporary
  <p>Economic household
  </td>
  <td width=100 align="center" valign="middle">&nbsp;
     <?=$total_rural_est; ?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_est_person; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_est_male; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_rural_est_female; ?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
     
  </td>
 </tr>



 <tr style='height:.1in'>  <!-- Permanent -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_rural_parmanent_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_parmanent_est/$total_rural_est) * 100), 2); ?>  
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_parmanent_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_parmanent_est_person/$total_rural_est_person) * 100), 2);?>  
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_parmanent_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  <?=round((($total_rural_parmanent_est_male/$total_rural_est_male) * 100), 2);?>  
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_rural_parmanent_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_parmanent_est_female/$total_rural_est_female) * 100), 2);?>  
  </td>
 </tr>




 <tr style='height:.1in'>  <!-- Temporary -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_rural_temporary_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
    <?=round((($total_rural_temporary_est/$total_rural_est) * 100), 2); ?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_temporary_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_temporary_est_person/$total_rural_est_person) * 100), 2);?> 
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_temporary_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_temporary_est_male/$total_rural_est_male) * 100), 2);?>  
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_rural_temporary_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
    <?=round((($total_rural_temporary_est_female/$total_rural_est_female) * 100), 2);?>
  </td>
 </tr>


 
 <tr style='height:.1in'> <!-- Household -->
  <td width=100 align="center" valign="middle" >&nbsp;
     <?=$total_rural_household_est ;?>
  </td>
  <td width=92 align="center" valign="middle" >&nbsp;
  <?=round((($total_rural_household_est/$total_rural_est) * 100), 2); ?> 
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_household_est_person ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_household_est_person/$total_rural_est_person) * 100), 2);?>
  </td>
  <td width=64 align="center" valign="middle" >&nbsp;
     <?=$total_rural_household_est_male ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
   <?=round((($total_rural_household_est_male/$total_rural_est_male) * 100), 2);?> 
  </td>
  <td width=69 align="center" valign="middle" >&nbsp;
     <?=$total_rural_household_est_female ;?>
  </td>
  <td width=56 align="center" valign="middle" >&nbsp;
  <?=round((($total_rural_household_est_female/$total_rural_est_female) * 100), 2);?>  
  </td>
 </tr>
 
</table>  

<?php } ?>

<br><br>
<?php echo $this->Html->script('reports/geo_filter'); ?>

