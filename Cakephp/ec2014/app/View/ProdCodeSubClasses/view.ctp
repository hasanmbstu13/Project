<div class="prodCodeSubClasses view">
<h2><?php  echo __('Prod Code Sub Class'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Prod Code Class'); ?></dt>
		<dd>
			<?php echo $this->Html->link($prodCodeSubClass['ProdCodeClass']['class_desc_eng'], array('controller' => 'ProdCodeClass', 'action' => 'view', $prodCodeSubClass['ProdCodeClass']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Class Code'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Class Desc Eng'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_desc_eng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Sub Class Desc Bng'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['sub_class_desc_bng']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Hsc Code 2007'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['hsc_code_2007']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Bsic Code 2009'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['bsic_code_2009']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Type'); ?></dt>
		<dd>
			<?php echo h($prodCodeSubClass['ProdCodeSubClass']['type']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Prod Code Sub Class'), array('action' => 'edit', $prodCodeSubClass['ProdCodeSubClass']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Prod Code Sub Class'), array('action' => 'delete', $prodCodeSubClass['ProdCodeSubClass']['id']), null, __('Are you sure you want to delete # %s?', $prodCodeSubClass['ProdCodeSubClass']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Sub Classes'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Sub Class'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('controller' => 'ProdCodeClass', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClass', 'action' => 'add')); ?> </li>
	</ul>
</div>
