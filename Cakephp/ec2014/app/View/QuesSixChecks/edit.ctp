<div class="quesSixCkecks form">
<?php echo $this->Form->create('QuesSixCkeck'); ?>
	<fieldset>
		<legend><?php echo __('Edit Ques Six Ckeck'); ?></legend>
	<?php
		echo $this->Form->input('questionaire_id');
		echo $this->Form->input('is_right');
		echo $this->Form->input('entry_by');
		echo $this->Form->input('right_code');
		echo $this->Form->input('update_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('QuesSixCkeck.questionaire_id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('QuesSixCkeck.questionaire_id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Ques Six Ckecks'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'Questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'Questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
