<?php echo $this->Session->flash(); ?>
<div class="geoCodeRmos view">
<h2><?php  echo __('RMO Details'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($geoCodeRmo['GeoCodeRmo']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rmo Code'); ?></dt>
		<dd>
			<?php echo h($geoCodeRmo['GeoCodeRmo']['rmo_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rmo Type Eng'); ?></dt>
		<dd>
			<?php echo h($geoCodeRmo['GeoCodeRmo']['rmo_type_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Rmo Type Bng'); ?></dt>
		<dd>
			<?php echo h($geoCodeRmo['GeoCodeRmo']['rmo_type_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Geo Code Rmo'), array('action' => 'edit', $geoCodeRmo['GeoCodeRmo']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Geo Code Rmo'), array('action' => 'delete', $geoCodeRmo['GeoCodeRmo']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeRmo['GeoCodeRmo']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Rmos'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Rmo'), array('action' => 'add')); ?> </li>
		
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Geo Code Mauzas'); ?></h3>
	<?php if (!empty($geoCodeRmo['GeoCodeMauza'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Geo Code Union Id'); ?></th>
		<th><?php echo __('Mauza Code'); ?></th>
		<th><?php echo __('Mauza Name'); ?></th>
		<th><?php echo __('Geo Code Rmo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($geoCodeRmo['GeoCodeMauza'] as $geoCodeMauza): ?>
		<tr>
			<td><?php echo $geoCodeMauza['id']; ?></td>
			<td><?php echo $geoCodeMauza['geo_code_union_id']; ?></td>
			<td><?php echo $geoCodeMauza['mauza_code']; ?></td>
			<td><?php echo $geoCodeMauza['mauza_name']; ?></td>
			<td><?php echo $geoCodeMauza['geo_code_rmo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'geoCodeMauzas', 'action' => 'view', $geoCodeMauza['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'geoCodeMauzas', 'action' => 'edit', $geoCodeMauza['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'geoCodeMauzas', 'action' => 'delete', $geoCodeMauza['id']), null, __('Are you sure you want to delete # %s?', $geoCodeMauza['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Geo Code Mauza'), array('controller' => 'geoCodeMauzas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Geo Code Psas'); ?></h3>
	<?php if (!empty($geoCodeRmo['GeoCodePsa'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Geo Code Upazila Id'); ?></th>
		<th><?php echo __('Psa Code'); ?></th>
		<th><?php echo __('Psa Name'); ?></th>
		<th><?php echo __('Geo Code Rmo Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($geoCodeRmo['GeoCodePsa'] as $geoCodePsa): ?>
		<tr>
			<td><?php echo $geoCodePsa['id']; ?></td>
			<td><?php echo $geoCodePsa['geo_code_upazila_id']; ?></td>
			<td><?php echo $geoCodePsa['psa_code']; ?></td>
			<td><?php echo $geoCodePsa['psa_name']; ?></td>
			<td><?php echo $geoCodePsa['geo_code_rmo_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'GeoCodePsas', 'action' => 'view', $geoCodePsa['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'GeoCodePsas', 'action' => 'edit', $geoCodePsa['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'GeoCodePsas', 'action' => 'delete', $geoCodePsa['id']), null, __('Are you sure you want to delete # %s?', $geoCodePsa['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Geo Code Psa'), array('controller' => 'GeoCodePsas', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
<div class="related">
	<h3><?php echo __('Related Geo Code Unions'); ?></h3>
	<?php if (!empty($geoCodeRmo['GeoCodeUnion'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Geo Code Upazila Id'); ?></th>
		<th><?php echo __('Union Code'); ?></th>
		<th><?php echo __('Union Name'); ?></th>
		<th><?php echo __('Geo Code Rmo Id'); ?></th>
		<th><?php echo __('Union Or Ward'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($geoCodeRmo['GeoCodeUnion'] as $geoCodeUnion): ?>
		<tr>
			<td><?php echo $geoCodeUnion['id']; ?></td>
			<td><?php echo $geoCodeUnion['geo_code_upazila_id']; ?></td>
			<td><?php echo $geoCodeUnion['union_code']; ?></td>
			<td><?php echo $geoCodeUnion['union_name']; ?></td>
			<td><?php echo $geoCodeUnion['geo_code_rmo_id']; ?></td>
			<td><?php echo $geoCodeUnion['union_or_ward']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'GeoCodeUnions', 'action' => 'view', $geoCodeUnion['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'GeoCodeUnions', 'action' => 'edit', $geoCodeUnion['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'GeoCodeUnions', 'action' => 'delete', $geoCodeUnion['id']), null, __('Are you sure you want to delete # %s?', $geoCodeUnion['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Geo Code Union'), array('controller' => 'GeoCodeUnions', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
