<div class="prodCodeSubClasses form">
<?php echo $this->Form->create('ProdCodeSubClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Prod Code Sub Class'); ?></legend>
	<?php
		echo $this->Form->input('prod_code_class_id');
		echo $this->Form->input('sub_class_code');
		echo $this->Form->input('sub_class_desc_eng');
		echo $this->Form->input('sub_class_desc_bng');
		echo $this->Form->input('hsc_code_2007');
		echo $this->Form->input('bsic_code_2009');
		echo $this->Form->input('type');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prod Code Sub Classes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Classes'), array('controller' => 'ProdCodeClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Class'), array('controller' => 'ProdCodeClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
