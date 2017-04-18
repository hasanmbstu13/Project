<?php echo $this->Session->flash(); ?>
<div class="geoCodeUnions index">
	<h2><?php echo __('Union List'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('union_name', array('label' =>'Union Name' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	<table cellpadding="0" cellspacing="0">
	<tr>
		    <th><?php echo $this->Paginator->sort('divn_code','Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_name','Division Name'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_name'); ?></th>
			<th><?php echo $this->Paginator->sort('upzila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('upzila_name'); ?></th>
			<th><?php echo $this->Paginator->sort('union_code'); ?></th>
			<th><?php echo $this->Paginator->sort('union_name'); ?></th>
			<th><?php echo $this->Paginator->sort('union_or_ward', 'Union/Ward'); ?></th>
			<th><?php echo $this->Paginator->sort('rmo_type_eng','RMO name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($geoCodeUnions as $geoCodeUnion): ?>
	<tr>
		 <td><?php echo h($geoCodeUnion['GeoCodeDivn']['divn_code']); ?></td>
		<td><?php echo h($geoCodeUnion['GeoCodeDivn']['divn_name']); ?></td>
		<td><?php echo h($geoCodeUnion['GeoCodeZila']['zila_code']); ?>&nbsp;</td>
		<td>
			<?php echo h($geoCodeUnion['GeoCodeZila']['zila_name']); ?>
		</td>
		<td><?php echo h($geoCodeUnion['GeoCodeUpazila']['upzila_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodeUnion['GeoCodeUpazila']['upzila_name']); ?>&nbsp;</td>
		
		<td><?php echo h($geoCodeUnion['GeoCodeUnion']['union_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodeUnion['GeoCodeUnion']['union_name']); ?>&nbsp;</td>
		
		
		<td><?php echo h($geoCodeUnion['GeoCodeUnion']['union_or_ward']); ?>&nbsp;</td>
		<td><?php echo h($geoCodeUnion['GeoCodeRmo']['rmo_type_eng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $geoCodeUnion['GeoCodeUnion']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $geoCodeUnion['GeoCodeUnion']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeUnion['GeoCodeUnion']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Add Union'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
