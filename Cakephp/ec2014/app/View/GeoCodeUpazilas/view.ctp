<?php echo $this->Session->flash(); ?>
<div class="geoCodeUpazilas view">
<h2><?php  echo __('Upazila Details'); ?></h2>
	<dl>
		
		<dt><?php echo __('Zila ID'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeUpazila['GeoCodeZila']['id'], array('controller' => 'GeoCodeZilas', 'action' => 'view', $geoCodeUpazila['GeoCodeZila']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zila Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeUpazila['GeoCodeZila']['zila_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upzila Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeUpazila['GeoCodeUpazila']['upzila_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Upzila Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeUpazila['GeoCodeUpazila']['upzila_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
			<li><?php echo $this->Html->link(__('Add Upazila'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Upazila'), array('action' => 'edit', $geoCodeUpazila['GeoCodeUpazila']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Upazila'), array('action' => 'delete', $geoCodeUpazila['GeoCodeUpazila']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeUpazila['GeoCodeUpazila']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Upazilas'), array('action' => 'index')); ?> </li>
	
		
	</ul>
</div>
