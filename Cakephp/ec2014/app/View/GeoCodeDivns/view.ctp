<?php echo $this->Session->flash(); ?>
<div class="geoCodeDivns view">
<h2><?php  echo __('Geo Code Divn'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodeDivn['GeoCodeDivn']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeDivn['GeoCodeDivn']['divn_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Name'); ?></dt>
		<dd>
			<?php echo h($geoCodeDivn['GeoCodeDivn']['divn_name']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geo Code Divn'), array('action' => 'edit', $geoCodeDivn['GeoCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Geo Code Divn'), array('action' => 'delete', $geoCodeDivn['GeoCodeDivn']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeDivn['GeoCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Divns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Divn'), array('action' => 'add')); ?> </li>
		 <!-- <li><?php echo $this->Html->link(__('List Geo Code Zilas'), array('controller' => 'geo_code_zilas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Zila'), array('controller' => 'geo_code_zilas', 'action' => 'add')); ?> </li> -->
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Geo Code Zilas'); ?></h3>
	<?php if (!empty($geoCodeDivn['GeoCodeZila'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Geo Code Divn Id'); ?></th>
		<th><?php echo __('Zila Code'); ?></th>
		<th><?php echo __('Zila Name'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($geoCodeDivn['GeoCodeZila'] as $geoCodeZila): ?>
		<tr>
			<td><?php echo $geoCodeZila['id']; ?></td>
			<td><?php echo $geoCodeZila['geo_code_divn_id']; ?></td>
			<td><?php echo $geoCodeZila['zila_code']; ?></td>
			<td><?php echo $geoCodeZila['zila_name']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'GeoCodeZilas', 'action' => 'view', $geoCodeZila['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'GeoCodeZilas', 'action' => 'edit', $geoCodeZila['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'GeoCodeZilas', 'action' => 'delete', $geoCodeZila['id']), null, __('Are you sure you want to delete # %s?', $geoCodeZila['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Geo Code Zila'), array('controller' => 'GeoCodeZilas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
