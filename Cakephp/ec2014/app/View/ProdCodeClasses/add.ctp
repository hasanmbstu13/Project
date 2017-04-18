<div class="prodCodeClasses form">
<?php echo $this->Form->create('ProdCodeClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Prod Code Class'); ?></legend>
	<?php
		echo $this->Form->input('prod_code_group_id');
		echo $this->Form->input('class_code');
		echo $this->Form->input('class_desc_eng');
		echo $this->Form->input('class_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('controller' => 'ProdCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeGroups', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Sub Classes'), array('controller' => 'ProdCodeSubClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Sub Class'), array('controller' => 'ProdCodeSubClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
