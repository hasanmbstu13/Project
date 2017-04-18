<?php echo $this -> Session -> flash(); ?>




<fieldset>
	<legend>
		Status
	</legend>
	<br>
	<table style="width: 50%; font-size: 14px;">

		<tbody>
	



		<tr>
			<td><b>Total Unit</b></td>
			<td>:</td>
			<td><?=$total_unit?>&nbsp;</td>
		</tr>
		
		
		<tr>
			<td><b>All Questions Verified by Supervisor</b></td>
			<td>:</td>
			<td><?=$all_ques_verified_by_supervisor?>&nbsp;</td>
		</tr>
		
		<tr>
			<td><b>Questions No. 6 Verified by Supervisor</b></td>
			<td>:</td>
			<td><?=$q6_verified_by_supervisor?>&nbsp;</td>
		</tr>
		
		<tr>
			<td><b>Questions No. 6 Wrong Units</b></td>
			<td>:</td>
			<td><?=$q6_wrong?>&nbsp;</td>
		</tr>
		
		<tr>
			<td><b>Questions No. 6 Corrected Units</b></td>
			<td>:</td>
			<td><?=$q6_right?>&nbsp;</td>
		</tr>
		
		
		<tr>
			<td><b>Questions No. 6 Approved by Supervising Officer</b></td>
			<td>:</td>
			<td><?=$q6_approved?>&nbsp;</td>
		</tr>


		<tr>
			<td><b>Total Unit Corrected By Admin User</b></td>
			<td>:</td>
			<td><?=$corrected_by_admin?>&nbsp;</td>
		</tr>

			

</tbody>

</table>
</fieldset>
<br/>
