<fieldset>
	<legend>
		Data Entry Status
	</legend>
	<br>
	<table>
		<thead>
			<tr>
				<th>Total Entered Book</th>
				<th>Total Entered Unit</th>
				<th>Total DEO Worked</th>
				<th>Total Supervisor Worked</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td><?php echo $totalBooks
				?></td>
				<td><?php echo $totalUnit
				?></td>
				<td><?php echo $totalDeoWork
				?></td>
				<td><?php echo $totalSup
				?></td>
			</tr>
		</tbody>

	</table>

</fieldset>
<br/>

<fieldset>
	<legend>
		Zilas of <?php echo $zilas[0]['GeoCodeDivn']['divn_name']." "
		?>Division
	</legend>
	<br>
	<div class="master_tbl">
		<ul class="list_with_icon">

			<?php
foreach ($zilas as $key => $zila)
{
echo ($key+1).". ".$this->Html->link($zila['GeoCodeZila']['zila_name'], array('controller' => 'DivnCoo', 'action' => 'findupazilas',$zila['GeoCodeZila']['id']));
echo "<br />";
}
			?>
		</ul>
	</div>
</fieldset>
<br/>
