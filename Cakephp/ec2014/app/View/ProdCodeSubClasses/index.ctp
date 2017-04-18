<div class="prodCodeSubClasses index">
	<h2><?php echo __('Prod Code Sub Classes'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('prod_code_class_id'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_code'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_desc_eng'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_desc_bng'); ?></th>
			<th><?php echo $this->Paginator->sort('hsc_code_2007'); ?></th>
			<th><?php echo $this->Paginator->sort('bsic_code_2009'); ?></th>
			<th><?php echo $this->Paginator->sort('type'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($prodCodeSubClasses as $prodCodeSubClass): ?>
	<tr>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prodCodeSubClass['ProdCodeClass']['class_desc_eng'], array('controller' => 'ProdCodeClass', 'action' => 'view', $prodCodeSubClass['ProdCodeClass']['id'])); ?>
		</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_code']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_desc_eng']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_desc_bng']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['hsc_code_2007']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['bsic_code_2009']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeSubClass['ProdCodeSubClass']['type']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $prodCodeSubClass['ProdCodeSubClass']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prodCodeSubClass['ProdCodeSubClass']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prodCodeSubClass['ProdCodeSubClass']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeSubClass['ProdCodeSubClass']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Prod Code Sub Class'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('controller' => 'ProdCodeClass', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClass', 'action' => 'add')); ?> </li>
	</ul>
</div>
