<?php echo $this->Session->flash(); ?>
	<?php echo $this->Form->create('Questionaire'); ?>
	
	<?php echo $this->Form->input('book_id', array('options' => $Books, 'label' =>'বই নং নির্বাচন করুন' )); ?>
	
	<?php echo $this->Form->end(__('Search')); ?>
	
	
	<h2>প্রশ্নপত্রের তালিকা</h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('book_id','Book ID'); ?></th>
		<th><?php echo $this->Paginator->sort('q1_geo_code_mauza_name','MAUZA NAME'); ?></th> 
			<th><?php echo $this->Paginator->sort('q1_unit_serial_no','UNIT SERIAL'); ?></th>
            <th><?php echo $this->Paginator->sort('q2_unit_name','NAME'); ?></th>
			<th><?php echo $this->Paginator->sort('q2_village_maholla','VILLAGE/MOHOLLA'); ?></th>

			<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php
	foreach ($questionaires as $questionaire): ?>
	<tr>

		<td>
			<?php echo $this->Html->link($questionaire['Questionaire']['book_id'], array('controller' => 'Books', 'action' => 'view', $questionaire['Book']['id'])); ?>
		</td>
		<td><?php echo h($questionaire['Questionaire']['q1_geo_code_mauza_name']); ?>&nbsp;</td>
		<td><?php echo h($questionaire['Questionaire']['q1_unit_serial_no']); ?>&nbsp;</td>
		<td><?php echo h($questionaire['Questionaire']['q2_unit_name']); ?>&nbsp;</td>
	   <td><?php echo h($questionaire['Questionaire']['q2_village_maholla']); ?>&nbsp;</td>
	   
		<td class="actions">
			<?php echo $this->Html->link(__('Details'), array('action' => 'details_view', $questionaire['Questionaire']['id'])); ?>
			<?php echo $this->Html->link(__('Edit'), array('action' => 'edit_ques', $questionaire['Questionaire']['id'])); ?>

		</td>
	</tr>
	
	
<?php endforeach; ?>
	</table>
	
	<br />
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


<br />
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Questionaire'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('controller' => 'Books', 'action' => 'index')); ?> </li>
		
	</ul>
</div>
