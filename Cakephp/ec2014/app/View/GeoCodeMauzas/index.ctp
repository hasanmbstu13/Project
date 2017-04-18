<?php echo $this -> Session -> flash(); ?>
<div class="geoCodeMauzas index">
	<h2><?php echo __('Mauza List'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('mauza_name', array('label' =>'Mauza Name' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	
	<table cellpadding="0" cellspacing="0">
		<tr>

			<th><?php echo $this -> Paginator -> sort('divn_code', 'Division Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('divn_name', 'Division Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('zila_code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('zila_name', 'Zila Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('upzila_code', 'Upzila Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('upzila_name', 'Upazila Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('union_code', 'Union Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('union_name', 'Union Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('mauza_code', 'Mauza Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('mauza_name', 'Mauza name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('rmo_type_eng', 'RMO name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
foreach ($geoCodeMauzas as $geoCodeMauza):
		?>
		<tr>
			<!-- 	<td><?php echo h($geoCodeMauza['GeoCodeMauza']['id']); ?>&nbsp;</td> -->
			<td><?php echo h($geoCodeMauza['GeoCodeDivn']['divn_code']); ?></td>
			<td><?php echo h($geoCodeMauza['GeoCodeDivn']['divn_name']); ?></td>
			<td><?php echo h($geoCodeMauza['GeoCodeZila']['zila_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeMauza['GeoCodeZila']['zila_name']); ?></td>
			<td><?php echo h($geoCodeMauza['GeoCodeUpazila']['upzila_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeMauza['GeoCodeUpazila']['upzila_name']); ?></td>
			<td><?php echo h($geoCodeMauza['GeoCodeUnion']['union_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeMauza['GeoCodeUnion']['union_name']); ?></td>
			<td><?php echo h($geoCodeMauza['GeoCodeMauza']['mauza_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeMauza['GeoCodeMauza']['mauza_name']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeMauza['GeoCodeRmo']['rmo_type_eng']); ?></td>
			<td class="actions">
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $geoCodeMauza['GeoCodeMauza']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $geoCodeMauza['GeoCodeMauza']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeMauza['GeoCodeMauza']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
	</p>

	<div class="paging">
		<?php echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('Add Mauza'), array('action' => 'add'));
			?>
		</li>

	</ul>
</div>
