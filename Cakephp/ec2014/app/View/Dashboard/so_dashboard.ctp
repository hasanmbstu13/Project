<?php

$all_ques_verified_by_supervisor = 0;
$q6_verified_by_supervisor = 0;
$q6_wrong = 0;
$q6_right = 0;
$q6_approved = 0;

?>
<div class="geoCodeDivns index">
	<h2><?php echo __('Supervisor Status'); ?></h2>
	<h2><?php echo __(" Total Q6 Corrected by Admin User : ".$corrected." "); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th>Supervisor</th>
			<th>Total Unit</th>
			<th>All Questions Verified by Supervisor</th>
			<th>Questions No. 6 Verified by Supervisor</th>
			<th>Questions No. 6 Wrong Units</th>
			<th>Questions No. 6 Corrected Units</th>
			<th>Questions No. 6 Approved by Supervising Officer</th>
	</tr>
	<?php foreach ($dashboard_data as $data): ?>
	<tr>
		<?php //if($data['total_unit'] != 0): ?>
	
		<td><b><?=$data['supervisor_name']?></b>&nbsp;</td>
		<td><?=$data['total_unit']?>&nbsp;</td>
		<td><?=$data['all_ques_verified_by_supervisor']?>&nbsp;</td>
		<td><?=$data['q6_verified_by_supervisor']?>&nbsp;</td>
		<td><?=$data['q6_wrong']?>&nbsp;</td>
		<td><?=$data['q6_right']?>&nbsp;</td>
		<td><?=$data['q6_approved']?>&nbsp;</td>
		
		<?php 
			$total_unit += $data['total_unit'];
			$all_ques_verified_by_supervisor += $data['all_ques_verified_by_supervisor'];
			$q6_verified_by_supervisor += $data['q6_verified_by_supervisor'];
			$q6_wrong += $data['q6_wrong'];
			$q6_right += $data['q6_right'];
			$q6_approved += $data['q6_approved'];
		?>
		
		<?php //endif; ?>
		
		
	</tr>
	<?php endforeach; ?>
	<tr>
		<th><b>Total</b>&nbsp;</th>
		<th> <b>=</b> &nbsp;</th>
		<th><b><?=$all_ques_verified_by_supervisor?></b>&nbsp;</th>
		<th><b><?=$q6_verified_by_supervisor?></b>&nbsp;</th>
		<th><b><?=$q6_wrong?></b>&nbsp;</th>
		<th><b><?=$q6_right?></b>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
		

	</table>
	
	
</div>

