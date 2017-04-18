<div class="prodCodeClasses view">
<h2><?php  echo __('Prod Code Class'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prodCodeClass['ProdCodeClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prod Code Group'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prodCodeClass['ProdCodeGroup']['group_desc_eng'], array('controller' => 'prod_code_groups', 'action' => 'view', $prodCodeClass['ProdCodeGroup']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Code'); ?></dt>
		<dd>
			<?php echo h($prodCodeClass['ProdCodeClass']['class_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Desc Eng'); ?></dt>
		<dd>
			<?php echo h($prodCodeClass['ProdCodeClass']['class_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Class Desc Bng'); ?></dt>
		<dd>
			<?php echo h($prodCodeClass['ProdCodeClass']['class_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prod Code Class'), array('action' => 'edit', $prodCodeClass['ProdCodeClass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prod Code Class'), array('action' => 'delete', $prodCodeClass['ProdCodeClass']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeClass['ProdCodeClass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('controller' => 'ProdCodeClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeClasses', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Sub Classes'), array('controller' => 'ProdCodeSubClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Sub Class'), array('controller' => 'ProdCodeSubClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prod Code Sub Classes'); ?></h3>
	<?php if (!empty($prodCodeClass['ProdCodeSubClass'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prod Code Class Id'); ?></th>
		<th><?php echo __('Sub Class Code'); ?></th>
		<th><?php echo __('Sub Class Desc Eng'); ?></th>
		<th><?php echo __('Sub Class Desc Bng'); ?></th>
		<th><?php echo __('Hsc Code 2007'); ?></th>
		<th><?php echo __('Bsic Code 2009'); ?></th>
		<th><?php echo __('Type'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prodCodeClass['ProdCodeSubClass'] as $prodCodeSubClass): ?>
		<tr>
			<td><?php echo $prodCodeSubClass['id']; ?></td>
			<td><?php echo $prodCodeSubClass['prod_code_class_id']; ?></td>
			<td><?php echo $prodCodeSubClass['sub_class_code']; ?></td>
			<td><?php echo $prodCodeSubClass['sub_class_desc_eng']; ?></td>
			<td><?php echo $prodCodeSubClass['sub_class_desc_bng']; ?></td>
			<td><?php echo $prodCodeSubClass['hsc_code_2007']; ?></td>
			<td><?php echo $prodCodeSubClass['bsic_code_2009']; ?></td>
			<td><?php echo $prodCodeSubClass['type']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ProdCodeSubClasses', 'action' => 'view', $prodCodeSubClass['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ProdCodeSubClasses', 'action' => 'edit', $prodCodeSubClass['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ProdCodeSubClasses', 'action' => 'delete', $prodCodeSubClass['id']), null, __('Are you sure you want to delete # %s?', $prodCodeSubClass['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prod Code Sub Class'), array('controller' => 'ProdCodeSubClasses', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
