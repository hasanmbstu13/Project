<div class="quesChecks form">
<?php echo $this->Form->create('QuesCheck'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ques Check'); ?></legend>
	<?php
		echo $this->Form->input('questionaire_id');
		echo $this->Form->input('error_note');
		echo $this->Form->input('entry_by');
		echo $this->Form->input('operator_chk');
		echo $this->Form->input('updated_by');
		echo $this->Form->input('operator_note');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuesCheck.questionaire_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('QuesCheck.questionaire_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ques Checks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'Questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'Questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
