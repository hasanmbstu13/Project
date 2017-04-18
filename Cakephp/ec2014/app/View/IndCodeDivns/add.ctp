<div class="indCodeDivns form">
<?php echo $this->Form->create('IndCodeDivn'); ?>
	<fieldset>
		<legend><?php echo __('Add Ind Code Divn'); ?></legend>
	<?php
		echo $this->Form->input('divn_code');
		echo $this->Form->input('divn_code_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Ind Code Divns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
