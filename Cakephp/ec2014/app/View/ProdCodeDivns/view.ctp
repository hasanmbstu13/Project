<div class="prodCodeDivns view">
<h2><?php  echo __('Prod Code Divn'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prodCodeDivn['ProdCodeDivn']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prod Code Section'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prodCodeDivn['ProdCodeSection']['section_desc_eng'], array('controller' => 'ProdCodeSections', 'action' => 'view', $prodCodeDivn['ProdCodeSection']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Code'); ?></dt>
		<dd>
			<?php echo h($prodCodeDivn['ProdCodeDivn']['divn_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Desc Eng'); ?></dt>
		<dd>
			<?php echo h($prodCodeDivn['ProdCodeDivn']['divn_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Divn Desc Bng'); ?></dt>
		<dd>
			<?php echo h($prodCodeDivn['ProdCodeDivn']['divn_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prod Code Divn'), array('action' => 'edit', $prodCodeDivn['ProdCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prod Code Divn'), array('action' => 'delete', $prodCodeDivn['ProdCodeDivn']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeDivn['ProdCodeDivn']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('controller' => 'ProdCodeSections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Section'), array('controller' => 'ProdCodeSections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('controller' => 'ProdCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prod Code Groups'); ?></h3>
	<?php if (!empty($prodCodeDivn['ProdCodeGroup'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prod Code Divn Id'); ?></th>
		<th><?php echo __('Group Code'); ?></th>
		<th><?php echo __('Group Desc Eng'); ?></th>
		<th><?php echo __('Group Desc Bng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prodCodeDivn['ProdCodeGroup'] as $prodCodeGroup): ?>
		<tr>
			<td><?php echo $prodCodeGroup['id']; ?></td>
			<td><?php echo $prodCodeGroup['prod_code_divn_id']; ?></td>
			<td><?php echo $prodCodeGroup['group_code']; ?></td>
			<td><?php echo $prodCodeGroup['group_desc_eng']; ?></td>
			<td><?php echo $prodCodeGroup['group_desc_bng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ProdCodeGroups', 'action' => 'view', $prodCodeGroup['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ProdCodeGroups', 'action' => 'edit', $prodCodeGroup['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ProdCodeGroups', 'action' => 'delete', $prodCodeGroup['id']), null, __('Are you sure you want to delete # %s?', $prodCodeGroup['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeGroups', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
