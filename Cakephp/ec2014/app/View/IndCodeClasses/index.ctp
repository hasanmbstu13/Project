<div class="indCodeClasses index">
	<h2><?php echo __('Ind Code Classes'); ?></h2>
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('class_code_desc_bng', array('label' =>'Class Code Description in Bangla' )); ?>
	   <?php echo $this->Form->input('class_code', array('label' =>'Class Code Search' )); ?>
    
	<?php echo $this->Form->end(__('Search')); ?>
	
	<br/><br />
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('id'); ?></th>
			<th><?php echo $this->Paginator->sort('ind_code_group_id'); ?></th>
			<th><?php echo $this->Paginator->sort('class_code'); ?></th>
			<th><?php echo $this->Paginator->sort('class_code_desc_bng'); ?></th>
			<th><?php echo $this->Paginator->sort('class_code_desc_eng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($indCodeClasses as $indCodeClass): ?>
	<tr>
		<td><?php echo h($indCodeClass['IndCodeClass']['id']); ?>&nbsp;</td>
		<td>
			<?php echo $this->Html->link($indCodeClass['IndCodeGroup']['group_code'], array('controller' => 'IndCodeGroups', 'action' => 'view', $indCodeClass['IndCodeGroup']['id'])); ?>
		</td>
		<td><?php echo h($indCodeClass['IndCodeClass']['class_code']); ?>&nbsp;</td>
		<td><?php echo h($indCodeClass['IndCodeClass']['class_code_desc_bng']); ?>&nbsp;</td>
		<td><?php echo h($indCodeClass['IndCodeClass']['class_code_desc_eng']); ?>&nbsp;</td>
		<td class="actions">
<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $indCodeClass['IndCodeClass']['id'])); ?>
			<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $indCodeClass['IndCodeClass']['id']), null, __('Are you sure you want to delete # %s?', $indCodeClass['IndCodeClass']['id'])); ?>
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
		<li><?php echo $this->Html->link(__('New Ind Code Class'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Ind Code Groups'), array('controller' => 'IndCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Ind Code Group'), array('controller' => 'IndCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
