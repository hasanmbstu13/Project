<?php echo $this->Session->flash(); ?>
<div class="geoCodeMauzas view">
<h2><?php  echo __('Geo Code Mauza'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodeMauza['GeoCodeMauza']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Union'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeMauza['GeoCodeUnion']['union_name'], array('controller' => 'GeoCodeUnions', 'action' => 'view', $geoCodeMauza['GeoCodeUnion']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mauza Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeMauza['GeoCodeMauza']['mauza_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Mauza Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeMauza['GeoCodeMauza']['mauza_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Rmo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeMauza['GeoCodeRmo']['rmo_type_eng'], array('controller' => 'GeoCodeRmos', 'action' => 'view', $geoCodeMauza['GeoCodeRmo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geo Code Mauza'), array('action' => 'edit', $geoCodeMauza['GeoCodeMauza']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Geo Code Mauza'), array('action' => 'delete', $geoCodeMauza['GeoCodeMauza']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeMauza['GeoCodeMauza']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Mauzas'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Mauza'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Unions'), array('controller' => 'GeoCodeUnions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Union'), array('controller' => 'GeoCodeUnions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Rmos'), array('controller' => 'GeoCodeRmos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Rmo'), array('controller' => 'GeoCodeRmos', 'action' => 'add')); ?> </li>
	</ul>
</div>
