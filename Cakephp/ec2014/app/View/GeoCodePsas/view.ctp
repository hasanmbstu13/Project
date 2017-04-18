<?php echo $this->Session->flash(); ?>
<div class="geoCodePsas view">
<h2><?php  echo __('Geo Code Psa'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodePsa['GeoCodePsa']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Upazila'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodePsa['GeoCodeUpazila']['upzila_name'], array('controller' => 'GeoCodeUpazilas', 'action' => 'view', $geoCodePsa['GeoCodeUpazila']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Psa Code'); ?></dt>
		<dd>
			<?php echo h($geoCodePsa['GeoCodePsa']['psa_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Psa Name'); ?></dt>
		<dd>
			<?php echo h($geoCodePsa['GeoCodePsa']['psa_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Rmo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodePsa['GeoCodeRmo']['id'], array('controller' => 'GeoCodeRmos', 'action' => 'view', $geoCodePsa['GeoCodeRmo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geo Code Psa'), array('action' => 'edit', $geoCodePsa['GeoCodePsa']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Geo Code Psa'), array('action' => 'delete', $geoCodePsa['GeoCodePsa']['id']), null, __('Are you sure you want to delete # %s?', $geoCodePsa['GeoCodePsa']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Psas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Psa'), array('action' => 'add')); ?> </li>
		
	</ul>
</div>
