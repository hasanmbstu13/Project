<div class="quesChecks index">
	<h2><?php echo __('Ques Checks'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
		    <th>questionnaire_id</th>
            <th>error_note</th>
            <th>entry_by</th>
            <th>operator_chk</th>
            <th>updated_by</th>
            <th>operator_note</th>
            <th>created</th>
            <th>modified</th>
            <th class="actions"><?php echo __('Actions'); ?></th>

	</tr>
	<?php
	foreach ($quesChecks as $quesCheck): ?>
	<tr>
		<td>
			<?php echo $this->Html->link($quesCheck['Questionaire']['id'], array('controller' => 'Questionaires', 'action' => 'view', $quesCheck['Questionaire']['id'])); ?>
		</td>
		<td><?php echo h($quesCheck['QuesCheck']['error_note']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['entry_by']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['operator_chk']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['updated_by']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['operator_note']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['created']); ?>&nbsp;</td>
		<td><?php echo h($quesCheck['QuesCheck']['modified']); ?>&nbsp;</td>
		<td class="actions">
			<?php echo $this->Html->link(__('View'), array('action' => 'view', $quesCheck['QuesCheck']['questionaire_id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $quesCheck['QuesCheck']['questionaire_id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $quesCheck['QuesCheck']['questionaire_id']), null, __('Are you sure you want to delete # %s?', $quesCheck['QuesCheck']['questionaire_id'])); ?>
		</td>
	</tr>
<?php endforeach; ?>
	</table>
	<p>
	<?php
	echo $this->Paginator->counter(array(
	'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
	));
	?>	</p>

	<div class="paging">
	<?php
		echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this->Paginator->numbers(array('separator' => ''));
		echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
	?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('New Ques Check'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'Questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'Questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
