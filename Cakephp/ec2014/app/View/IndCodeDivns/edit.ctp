<div class="indCodeDivns form">
<?php echo $this->Form->create('IndCodeDivn'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ind Code Divn'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('divn_code');
		echo $this->Form->input('divn_code_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('IndCodeDivn.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('IndCodeDivn.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Divns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
