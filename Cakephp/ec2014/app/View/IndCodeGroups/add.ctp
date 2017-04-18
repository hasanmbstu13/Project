<div class="indCodeGroups form">
<?php echo $this->Form->create('IndCodeGroup'); ?>
	<fieldset>
		<legend><?php echo __('Add Ind Code Group'); ?></legend>
	<?php
		echo $this->Form->input('ind_code_divn_id');
		echo $this->Form->input('group_code');
		echo $this->Form->input('group_code_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Divns'), array('controller' => 'IndCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Divn'), array('controller' => 'IndCodeDivns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Ind Code Classes'), array('controller' => 'IndCodeClasses', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Class'), array('controller' => 'IndCodeClasses', 'action' => 'add')); ?> </li>
	</ul>
</div>
