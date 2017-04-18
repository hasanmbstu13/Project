<table cellpadding="0" cellspacing="0" border="1" style="text-align: center;">
	<thead>
		<tr>
			<th>Muza Name</th>
			<th>Unit Serial No</th>
			<th>Description (Hand Written)</th>
			<th>Indrustrial Code</th>
			<th>Description (Orginal)</th>
			<th>Is the Code Correct</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($questionaires as $questionaire): ++$i;
		?>
		<tr>
			<td><?php echo h($questionaire['Questionaire']['q1_geo_code_mauza_name']); ?>
			&nbsp;</td>

			<td><?php echo h($questionaire['Questionaire']['q1_unit_serial_no']); ?>
			&nbsp;</td>

			<td><?php echo h($questionaire['Questionaire']['q6_economy_description']); ?>
			&nbsp;</td>

			<td><?php echo h($questionaire['Questionaire']['q6_ind_code_class_id']); ?>
			&nbsp;</td>

			<td><?php echo h($questionaire['Questionaire']['q6_economy_description_orginal']); ?>
			&nbsp;</td>

			<td><?=$questionaire['QuesSixCheck']['is_right'] == 1?'Right':'Wrong'
			?>
			&nbsp;</td>
		</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<script>
	$(document).ready(function() {
		window.print();
	});
	
</script>
