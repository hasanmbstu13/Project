<fieldset>
	<legend>
		Data Entry Status of <?php echo $unions[0]['GeoCodeUpazila']['upzila_name']
		?>
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
		Unions/Wards of <?php echo $unions[0]['GeoCodeUpazila']['upzila_name']
		?>
	</legend>
	<br>
	<div class="master_tbl">
		<ul class="list_with_icon">

			<?php
foreach ($unions as $key => $union)
{
echo ($key+1).". ".$this->Html->link($union['GeoCodeUnion']['union_name'], array('controller' => 'DivnCoo', 'action' => 'findbooks',$union['GeoCodeUnion']['id']));
echo "<br />";
}
			?>
		</ul>
	</div>
</fieldset>
<br/>
