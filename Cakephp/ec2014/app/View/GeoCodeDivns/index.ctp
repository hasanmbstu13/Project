<?php echo $this->Session->flash(); ?>
<div class="geoCodeDivns index">
	<h2><?php echo __('Division List'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		
			<th><?php echo $this->Paginator->sort('divn_code','Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_name','Division Name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($geoCodeDivns as $geoCodeDivn): ?>
	<tr>
	
		<td><?php echo h($geoCodeDivn['GeoCodeDivn']['divn_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodeDivn['GeoCodeDivn']['divn_name']); ?>&nbsp;</td>
		<td class="actions">
			
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $geoCodeDivn['GeoCodeDivn']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $geoCodeDivn['GeoCodeDivn']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeDivn['GeoCodeDivn']['id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
<tfoot>
			<tr>
				<td colspan="4"><?php
echo $this->Paginator->counter(array(
'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
));
?></td>
			<tr>

				<td colspan="4">
				<div class="paging">
					<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
					?>
				</div></td>
			</tr>
</tfoot>
	</table>
	
	
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Division'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
