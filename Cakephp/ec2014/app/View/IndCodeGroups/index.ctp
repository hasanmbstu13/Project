<div class="indCodeGroups index">
	<h2><?php echo __('Ind Code Groups'); ?></h2>
	
	<?php echo $this->Form->create(); ?>
	
	<?php echo $this->Form->input('group_code_desc_bng', array('label' =>'Group Code Description in Bangla' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('ind_code_divn_id'); ?></th>
			<th><?php echo $this -> Paginator -> sort('group_code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('group_code_desc_bng'); ?></th>
			<th class="actions"><?php echo __('Actions'); ?></th>
		</tr>
		<?php
foreach ($indCodeGroups as $indCodeGroup):
		?>
		<tr>
			<td><?php echo h($indCodeGroup['IndCodeGroup']['id']); ?>&nbsp;</td>
			<td><?php echo $this -> Html -> link($indCodeGroup['IndCodeDivn']['divn_code'], array('controller' => 'IndCodeDivns', 'action' => 'view', $indCodeGroup['IndCodeDivn']['id'])); ?></td>
			<td><?php echo h($indCodeGroup['IndCodeGroup']['group_code']); ?>&nbsp;</td>
			<td><?php echo h($indCodeGroup['IndCodeGroup']['group_code_desc_bng']); ?>&nbsp;</td>
			<td class="actions"><?php echo $this -> Html -> link(__('View'), array('action' => 'view', $indCodeGroup['IndCodeGroup']['id'])); ?>
			<?php echo $this -> Html -> link(__('Edit'), array('action' => 'edit', $indCodeGroup['IndCodeGroup']['id'])); ?>
			<?php echo $this -> Form -> postLink(__('Delete'), array('action' => 'delete', $indCodeGroup['IndCodeGroup']['id']), null, __('Are you sure you want to delete # %s?', $indCodeGroup['IndCodeGroup']['id'])); ?></td>
		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}'))); ?>
	</p>

	<div class="paging">
		<?php echo $this -> Paginator -> prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
		echo $this -> Paginator -> numbers(array('separator' => ''));
		echo $this -> Paginator -> next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li>
			<?php echo $this -> Html -> link(__('New Ind Code Group'), array('action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('List Ind Code Divns'), array('controller' => 'IndCodeDivns', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('New Ind Code Divn'), array('controller' => 'IndCodeDivns', 'action' => 'add')); ?>
		</li>
		<li>
			<?php echo $this -> Html -> link(__('List Ind Code Classes'), array('controller' => 'IndCodeClasses', 'action' => 'index')); ?>
		</li>
		<li>
			<?php echo $this->Html->link(__('New Ind Code Class'), array('controller' => 'IndCodeClasses', 'action' => 'add'));
			?>
		</li>
	</ul>
</div>
