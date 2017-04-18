<?php echo $this->Session->flash(); ?>
<div class="geoCodePsas index">
	<h2><?php echo __('PSA list'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('psa_name', array('label' =>'PSA Name' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	
	<table cellpadding="0" cellspacing="0">
	<tr>
		    <th><?php echo $this->Paginator->sort('divn_code','Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_name','Division Name'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_code'); ?></th>
			<th><?php echo $this->Paginator->sort('zila_name','Zila Name'); ?></th>
			<th><?php echo $this->Paginator->sort('upzila_code','Upzila Code'); ?></th>
			<th><?php echo $this->Paginator->sort('upazila_name','Upazila Name'); ?></th>
			<th><?php echo $this->Paginator->sort('psa_code','PSA Code'); ?></th>
			<th><?php echo $this->Paginator->sort('psa_name','PSA Name'); ?></th>
			<th><?php echo $this->Paginator->sort('rmo_type_eng' ,'RMO Code'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($geoCodePsas as $geoCodePsa): ?>
	<tr>
	    <td><?php echo h($geoCodePsa['GeoCodeDivn']['divn_code']); ?></td>
		<td><?php echo h($geoCodePsa['GeoCodeDivn']['divn_name']); ?></td>
		<td><?php echo h($geoCodePsa['GeoCodeZila']['zila_code']); ?>&nbsp;</td>
		<td>
			<?php echo h($geoCodePsa['GeoCodeZila']['zila_name']); ?>
		</td>
		<td><?php echo h($geoCodePsa['GeoCodeUpazila']['upzila_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodePsa['GeoCodeUpazila']['upzila_name']); ?>&nbsp;</td>
		
		<td><?php echo h($geoCodePsa['GeoCodePsa']['psa_code']); ?>&nbsp;</td>
		<td><?php echo h($geoCodePsa['GeoCodePsa']['psa_name']); ?>&nbsp;</td>
		<td>
			<?php echo h($geoCodePsa['GeoCodeRmo']['rmo_type_eng']); ?>
		</td>
		
		
		
		<td class="actions">
		
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $geoCodePsa['GeoCodePsa']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $geoCodePsa['GeoCodePsa']['id']), null, __('Are you sure you want to delete # %s?', $geoCodePsa['GeoCodePsa']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('Add Psa'), array('action' => 'add')); ?></li>
		
	</ul>
</div>
