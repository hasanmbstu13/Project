<div class="quesChecks view">
<h2><?php  echo __('Ques Check'); ?></h2>
	<dl>
		<dt><?php echo __('Questionaire'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quesCheck['Questionaire']['id'], array('controller' => 'Questionaires', 'action' => 'view', $quesCheck['Questionaire']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Error Note'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['error_note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry By'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['entry_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operator Chk'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['operator_chk']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Updated By'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['updated_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Operator Note'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['operator_note']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quesCheck['QuesCheck']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ques Check'), array('action' => 'edit', $quesCheck['QuesCheck']['questionaire_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ques Check'), array('action' => 'delete', $quesCheck['QuesCheck']['questionaire_id']), null, __('Are you sure you want to delete # %s?', $quesCheck['QuesCheck']['questionaire_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ques Checks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ques Check'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'Questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'Questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
