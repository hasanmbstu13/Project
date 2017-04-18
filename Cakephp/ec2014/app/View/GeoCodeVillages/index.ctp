<div class="geoCodeVillages index">
	<h2><?php echo __('Village List'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('village_name', array('label' =>'Village Name' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	<table cellpadding="0" cellspacing="0">
		<tr>

			<th><?php echo $this -> Paginator -> sort('divn_name', 'Division Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('zila_name', 'Zila Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('upzila_name', 'Upazila Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('union_code', 'Union/Ward Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('union_name', 'Union/Ward Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('mauza_code', 'Mauza Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('mauza_name', 'Mauza name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('rmo_type_eng', 'RMO Type'); ?></th>
			<th><?php echo $this -> Paginator -> sort('village_code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('village_name'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
foreach ($geoCodeVillages as $geoCodeVillage):
		?>
		<tr>
			<td><?php echo h($geoCodeVillage['GeoCodeDivn']['divn_name']); ?></td>
			<td><?php echo h($geoCodeVillage['GeoCodeZila']['zila_name']); ?></td>

			<td><?php echo h($geoCodeVillage['GeoCodeUpazila']['upzila_name']); ?></td>

			<td><?php echo h($geoCodeVillage['GeoCodeUnion']['union_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeVillage['GeoCodeUnion']['union_name']); ?></td>
			<td><?php echo h($geoCodeVillage['GeoCodeMauza']['mauza_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeVillage['GeoCodeMauza']['mauza_name']); ?>&nbsp;</td>
			<td><?php echo $this -> Html -> link($geoCodeVillage['GeoCodeRmo']['rmo_type_eng'], array('controller' => 'geo_code_rmos', 'action' => 'view', $geoCodeVillage['GeoCodeRmo']['id'])); ?></td>
			<td><?php echo h($geoCodeVillage['GeoCodeVillage']['village_code']); ?>&nbsp;</td>
			<td><?php echo h($geoCodeVillage['GeoCodeVillage']['village_name']); ?>&nbsp;</td>

			<td class="actions"><!-- 			<?php echo $this->Html->link(__('View'), array('action' => 'view', $geoCodeVillage['GeoCodeVillage']['id'])); ?> --><?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $geoCodeVillage['GeoCodeVillage']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $geoCodeVillage['GeoCodeVillage']['id']), null, __('Are you sure you want to delete # %s?', $geoCodeVillage['GeoCodeVillage']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
	</p>

	<div class="paging">
		<?php echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this->Html->link(__('Add Village'), array('action' => 'add'));
			?>
		</li>
	</ul>
</div>
