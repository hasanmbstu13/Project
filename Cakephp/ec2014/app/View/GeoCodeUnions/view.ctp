<?php echo $this->Session->flash(); ?>
<div class="geoCodeUnions view">
<h2><?php  echo __('Union Details'); ?></h2>
	<dl>
	<!-- 	<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodeUnion['GeoCodeUnion']['id']); ?>
			&nbsp;
		</dd> -->
		<dt><?php echo __('Upazila Name'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeUnion['GeoCodeUpazila']['upzila_name'], array('controller' => 'GeoCodeUpazilas', 'action' => 'view', $geoCodeUnion['GeoCodeUpazila']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeUnion['GeoCodeUnion']['union_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeUnion['GeoCodeUnion']['union_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rmo Code'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeUnion['GeoCodeRmo']['id'], array('controller' => 'GeoCodeRmos', 'action' => 'view', $geoCodeUnion['GeoCodeRmo']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Union Or Ward'); ?></dt>
		<dd>
			<?php echo h($geoCodeUnion['GeoCodeUnion']['union_or_ward']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Union'), array('action' => 'edit', $geoCodeUnion['GeoCodeUnion']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete  Union'), array('action' => 'delete', $geoCodeUnion['GeoCodeUnion']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeUnion['GeoCodeUnion']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Unions'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('Add Union'), array('action' => 'add')); ?> </li>
		
	</ul> 
</div>