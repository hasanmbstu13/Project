<div class="geoCodeVillages view">
<h2><?php  echo __('Geo Code Village'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodeVillage['GeoCodeVillage']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Mauza'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeVillage['GeoCodeMauza']['mauza_name'], array('controller' => 'geo_code_mauzas', 'action' => 'view', $geoCodeVillage['GeoCodeMauza']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Village Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeVillage['GeoCodeVillage']['village_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Village Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeVillage['GeoCodeVillage']['village_name']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Geo Code Rmo'); ?></dt>
		<dd>
			<?php echo $this->Html->link($geoCodeVillage['GeoCodeRmo']['rmo_type_eng'], array('controller' => 'geo_code_rmos', 'action' => 'view', $geoCodeVillage['GeoCodeRmo']['id'])); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geo Code Village'), array('action' => 'edit', $geoCodeVillage['GeoCodeVillage']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Geo Code Village'), array('action' => 'delete', $geoCodeVillage['GeoCodeVillage']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeVillage['GeoCodeVillage']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Villages'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Village'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Mauzas'), array('controller' => 'geo_code_mauzas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Mauza'), array('controller' => 'geo_code_mauzas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Rmos'), array('controller' => 'geo_code_rmos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Rmo'), array('controller' => 'geo_code_rmos', 'action' => 'add')); ?> </li>
	</ul>
</div>
