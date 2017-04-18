<div class="quesSixCkecks view">
<h2><?php  echo __('Ques Six Ckeck'); ?></h2>
	<dl>
		<dt><?php echo __('Questionaire'); ?></dt>
		<dd>
			<?php echo $this->Html->link($quesSixCkeck['Questionaire']['id'], array('controller' => 'Questionaires', 'action' => 'view', $quesSixCkeck['Questionaire']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Is Right'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['is_right']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Entry By'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['entry_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Right Code'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['right_code']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Update By'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['update_by']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($quesSixCkeck['QuesSixCkeck']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Ques Six Ckeck'), array('action' => 'edit', $quesSixCkeck['QuesSixCkeck']['questionaire_id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Ques Six Ckeck'), array('action' => 'delete', $quesSixCkeck['QuesSixCkeck']['questionaire_id']), null, __('Are you sure you want to delete # %s?', $quesSixCkeck['QuesSixCkeck']['questionaire_id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Ques Six Ckecks'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ques Six Ckeck'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'Questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'Questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
