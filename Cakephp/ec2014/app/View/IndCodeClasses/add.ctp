<div class="indCodeClasses form">
<?php echo $this->Form->create('IndCodeClass'); ?>
	<fieldset>
		<legend><?php echo __('Add Ind Code Class'); ?></legend>
	<?php
		echo $this->Form->input('ind_code_group_id');
		echo $this->Form->input('class_code');
		echo $this->Form->input('class_code_desc_bng');
		echo $this->Form->input('class_code_desc_eng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ind Code Classes'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
