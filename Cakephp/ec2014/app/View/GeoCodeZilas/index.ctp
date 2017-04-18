<?php echo $this->Session->flash(); ?>
<div class="geoCodeZilas index">
	<h2><?php echo __('Zila List'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			
			<th><?php echo $this->Paginator->sort('geo_code_divn_code','Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('geo_code_divn_name','Division Name'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($geoCodeZilas as $geoCodeZila): ?>
	<tr>
	
		<td><?php echo h($geoCodeZila['GeoCodeDivn']['divn_code']); ?></td>
		<td><?php echo h($geoCodeZila['GeoCodeDivn']['divn_name']); ?></td>
		<td><?php echo h($geoCodeZila['GeoCodeZila']['zila_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodeZila['GeoCodeZila']['zila_name']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $geoCodeZila['GeoCodeZila']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $geoCodeZila['GeoCodeZila']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeZila['GeoCodeZila']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Add Zila'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
