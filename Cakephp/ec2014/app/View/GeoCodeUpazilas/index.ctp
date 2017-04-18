<?php echo $this->Session->flash(); ?>
<div class="geoCodeUpazilas index">
	<h2><?php echo __('Upazila  List'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('upzila_name', array('label' =>'Upzila Name' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('divn_code','Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_name','Division Name'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_name'); ?></th>
			<th><?php echo $this->Paginator->sort('upzila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('upzila_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($geoCodeUpazilas as $geoCodeUpazila): ?>
	<tr>
		<td><?php echo h($geoCodeUpazila['GeoCodeDivn']['divn_code']); ?></td>
		<td><?php echo h($geoCodeUpazila['GeoCodeDivn']['divn_name']); ?></td>
		<td><?php echo h($geoCodeUpazila['GeoCodeZila']['zila_code']); ?></td>
		<td><?php echo h($geoCodeUpazila['GeoCodeZila']['zila_name']); ?></td>
		
		<td><?php echo h($geoCodeUpazila['GeoCodeUpazila']['upzila_code']); ?></td>
		<td><?php echo h($geoCodeUpazila['GeoCodeUpazila']['upzila_name']); ?></td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $geoCodeUpazila['GeoCodeUpazila']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $geoCodeUpazila['GeoCodeUpazila']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeUpazila['GeoCodeUpazila']['id'])); ?>
			
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Upazila'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
