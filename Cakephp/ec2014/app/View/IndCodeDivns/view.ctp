<div class="indCodeDivns view">
<h2><?php  echo __('Ind Code Divn'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($indCodeDivn['IndCodeDivn']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Code'); ?></dt>
		<dd>
			<?php echo h($indCodeDivn['IndCodeDivn']['divn_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Code Desc Bng'); ?></dt>
		<dd>
			<?php echo h($indCodeDivn['IndCodeDivn']['divn_code_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ind Code Divn'), array('action' => 'edit', $indCodeDivn['IndCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ind Code Divn'), array('action' => 'delete', $indCodeDivn['IndCodeDivn']['id']), null, __('Are you sure you want to delete # %s?', $indCodeDivn['IndCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ind Code Divns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Divn'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Ind Code Groups'); ?></h3>
	<?php if (!empty($indCodeDivn['IndCodeGroup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Ind Code Divn Id'); ?></th>
		<th><?php echo __('Group Code'); ?></th>
		<th><?php echo __('Group Code Desc Bng'); ?></th>
		<th><?php echo __('Entry By'); ?></th>
		<th><?php echo __('Update By'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th><?php echo __('Is Synchronize'); ?></th>
		<th><?php echo __('Synchronized Id'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($indCodeDivn['IndCodeGroup'] as $indCodeGroup): ?>
		<tr>
			<td><?php echo $indCodeGroup['id']; ?></td>
			<td><?php echo $indCodeGroup['ind_code_divn_id']; ?></td>
			<td><?php echo $indCodeGroup['group_code']; ?></td>
			<td><?php echo $indCodeGroup['group_code_desc_bng']; ?></td>
			<td><?php echo $indCodeGroup['entry_by']; ?></td>
			<td><?php echo $indCodeGroup['update_by']; ?></td>
			<td><?php echo $indCodeGroup['created']; ?></td>
			<td><?php echo $indCodeGroup['modified']; ?></td>
			<td><?php echo $indCodeGroup['is_synchronize']; ?></td>
			<td><?php echo $indCodeGroup['synchronized_id']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'IndCodeGroups', 'action' => 'view', $indCodeGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'IndCodeGroups', 'action' => 'edit', $indCodeGroup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'IndCodeGroups', 'action' => 'delete', $indCodeGroup['id']), null, __('Are you sure you want to delete # %s?', $indCodeGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
