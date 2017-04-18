<div class="prodCodeSections view">
<h2><?php  echo __('Prod Code Section'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prodCodeSection['ProdCodeSection']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section Code'); ?></dt>
		<dd>
			<?php echo h($prodCodeSection['ProdCodeSection']['section_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section Desc Eng'); ?></dt>
		<dd>
			<?php echo h($prodCodeSection['ProdCodeSection']['section_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Section Desc Bng'); ?></dt>
		<dd>
			<?php echo h($prodCodeSection['ProdCodeSection']['section_desc_bng']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prod Code Section'), array('action' => 'edit', $prodCodeSection['ProdCodeSection']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prod Code Section'), array('action' => 'delete', $prodCodeSection['ProdCodeSection']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeSection['ProdCodeSection']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Section'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Prod Code Divns'); ?></h3>
	<?php if (!empty($prodCodeSection['ProdCodeDivn'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Prod Code Section Id'); ?></th>
		<th><?php echo __('Divn Code'); ?></th>
		<th><?php echo __('Divn Desc Eng'); ?></th>
		<th><?php echo __('Divn Desc Bng'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
		$i = 0;
		foreach ($prodCodeSection['ProdCodeDivn'] as $prodCodeDivn): ?>
		<tr>
			<td><?php echo $prodCodeDivn['id']; ?></td>
			<td><?php echo $prodCodeDivn['prod_code_section_id']; ?></td>
			<td><?php echo $prodCodeDivn['divn_code']; ?></td>
			<td><?php echo $prodCodeDivn['divn_desc_eng']; ?></td>
			<td><?php echo $prodCodeDivn['divn_desc_bng']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'ProdCodeDivns', 'action' => 'view', $prodCodeDivn['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'ProdCodeDivns', 'action' => 'edit', $prodCodeDivn['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'ProdCodeDivns', 'action' => 'delete', $prodCodeDivn['id']), null, __('Are you sure you want to delete # %s?', $prodCodeDivn['id'])); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
