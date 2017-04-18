<div class="prodCodeGroups form">
<?php echo $this->Form->create('ProdCodeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Prod Code Group'); ?></legend>
	<?php
		echo $this->Form->input('prod_code_divn_id');
		echo $this->Form->input('group_code');
		echo $this->Form->input('group_desc_eng');
		echo $this->Form->input('group_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('controller' => 'ProdCodeClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
