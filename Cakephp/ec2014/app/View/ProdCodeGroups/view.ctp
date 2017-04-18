<div class="prodCodeGroups view">
<h2><?php  echo __('Prod Code Group'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prodCodeGroup['ProdCodeGroup']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prod Code Divn'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prodCodeGroup['ProdCodeDivn']['divn_desc_eng'], array('controller' => 'ProdCodeDivns', 'action' => 'view', $prodCodeGroup['ProdCodeDivn']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Code'); ?></dt>
		<dd>
			<?php echo h($prodCodeGroup['ProdCodeGroup']['group_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Desc Eng'); ?></dt>
		<dd>
			<?php echo h($prodCodeGroup['ProdCodeGroup']['group_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Group Desc Bng'); ?></dt>
		<dd>
			<?php echo h($prodCodeGroup['ProdCodeGroup']['group_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prod Code Group'), array('action' => 'edit', $prodCodeGroup['ProdCodeGroup']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prod Code Group'), array('action' => 'delete', $prodCodeGroup['ProdCodeGroup']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeGroup['ProdCodeGroup']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('controller' => 'ProdCodeClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prod Code Classes'); ?></h3>
	<?php if (!empty($prodCodeGroup['ProdCodeClass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prod Code Group Id'); ?></th>
		<th><?php echo __('Class Code'); ?></th>
		<th><?php echo __('Class Desc Eng'); ?></th>
		<th><?php echo __('Class Desc Bng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prodCodeGroup['ProdCodeClass'] as $prodCodeClass): ?>
		<tr>
			<td><?php echo $prodCodeClass['id']; ?></td>
			<td><?php echo $prodCodeClass['prod_code_group_id']; ?></td>
			<td><?php echo $prodCodeClass['class_code']; ?></td>
			<td><?php echo $prodCodeClass['class_desc_eng']; ?></td>
			<td><?php echo $prodCodeClass['class_desc_bng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ProdCodeClasses', 'action' => 'view', $prodCodeClass['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ProdCodeClasses', 'action' => 'edit', $prodCodeClass['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ProdCodeClasses', 'action' => 'delete', $prodCodeClass['id']), null, __('Are you sure you want to delete # %s?', $prodCodeClass['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClasses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
