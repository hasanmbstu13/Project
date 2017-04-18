<?php echo $this -> Session -> flash(); ?>
<div class="notices view">
<h2><?php  echo __('Notice'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($notice['Notice']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Msg Order'); ?></dt>
		<dd>
			<?php echo h($notice['Notice']['msg_order']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Msg Body'); ?></dt>
		<dd>
			<?php echo h($notice['Notice']['msg_body']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Notice'), array('action' => 'edit', $notice['Notice']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Notice'), array('action' => 'delete', $notice['Notice']['id']), null, __('Are you sure you want to delete # %s?', $notice['Notice']['id'])); ?> </li>
		<li><?php echo $this->Html->link(__('List Notices'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Notice'), array('action' => 'add')); ?> </li>
	</ul>
</div>
