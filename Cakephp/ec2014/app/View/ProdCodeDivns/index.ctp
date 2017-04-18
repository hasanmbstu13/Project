<div class="prodCodeDivns index">
	<h2><?php echo __('Prod Code Divns'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('prod_code_section_id'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_desc_eng'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_desc_bng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($prodCodeDivns as $prodCodeDivn): ?>
	<tr>
		<td><?php echo h($prodCodeDivn['ProdCodeDivn']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($prodCodeDivn['ProdCodeSection']['section_desc_eng'], array('controller' => 'ProdCodeSections', 'action' => 'view', $prodCodeDivn['ProdCodeSection']['id'])); ?>
		</td>
		<td><?php echo h($prodCodeDivn['ProdCodeDivn']['divn_code']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeDivn['ProdCodeDivn']['divn_desc_eng']); ?>&nbsp;</td>
		<td><?php echo h($prodCodeDivn['ProdCodeDivn']['divn_desc_bng']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $prodCodeDivn['ProdCodeDivn']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $prodCodeDivn['ProdCodeDivn']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $prodCodeDivn['ProdCodeDivn']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeDivn['ProdCodeDivn']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('controller' => 'ProdCodeSections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Section'), array('controller' => 'ProdCodeSections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('controller' => 'ProdCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
