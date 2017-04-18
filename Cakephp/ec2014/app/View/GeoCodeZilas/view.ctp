<?php echo $this->Session->flash(); ?>
<div class="geoCodeZilas view">
<h2><?php  echo __('Zila Details'); ?></h2>
	<dl>
		
		<dt><?php echo __('Division Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeZila['GeoCodeDivn']['divn_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Division Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeZila['GeoCodeDivn']['divn_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zila Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeZila['GeoCodeZila']['zila_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Zila Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeZila['GeoCodeZila']['zila_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Zila'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('Edit Zila'), array('action' => 'edit', $geoCodeZila['GeoCodeZila']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Zila'), array('action' => 'delete', $geoCodeZila['GeoCodeZila']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeZila['GeoCodeZila']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Zilas'), array('action' => 'index')); ?> </li>
		
		
	</ul>
</div>