<div class="indCodeClasses index">

	<fieldset>
		<legend>
			<?php echo __('Search BSIC Code'); ?>
		</legend>
		<?php echo $this -> Form -> create();

			echo $this -> Form -> input('divn_code', array('label' => 'Division Code', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_prod_divn_code')));

			echo $this -> Form -> input('divn_code_desc_bng', array('label' => 'Division Name', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_prod_divn_code_desc_bng')));

			echo $this -> Form -> input('group_code', array('label' => 'Group Code', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_prod_group_code')));

			echo $this -> Form -> input('group_code_desc_bng', array('label' => 'Group Name', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_prod_group_code_desc_bng')));

			echo $this -> Form -> input('class_code', array('label' => 'Class Code', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_class_code')));
			echo $this -> Form -> input('class_code_desc_bng', array('label' => 'Class Name (Bangla)', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_class_code_desc_bng')));
            
            echo $this -> Form -> input('class_code_desc_eng', array('label' => 'Class Name (English)', 'type' => 'text', 'style' => 'width: 250px;', 'value' => $this -> Session -> read('search_class_code_desc_eng')));

			echo $this -> Form -> end(__('Search'));
		?>
	</fieldset>
	<br />
	<br />
	<h2><?php echo __('BSIC Code'); ?></h2>
	<table cellpadding="0" cellspacing="0">
		<tr>
			<th><?php echo $this -> Paginator -> sort('divn_code', 'Division Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('divn_code_desc_bng', 'Division Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('group_code', 'Group Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('group_code_desc_bng', 'Group Name'); ?></th>
			<th><?php echo $this -> Paginator -> sort('class_code', 'Class Code'); ?></th>
			<th><?php echo $this -> Paginator -> sort('class_code_desc_bng', 'Class Name'); ?></th> <th><?php echo $this -> Paginator -> sort('class_code_desc_eng', 'Class Name(ENG)'); ?></th>
		</tr>
		<?php
foreach ($IndCodeDivns as $IndCodeDivn):
		?>
		<tr>
			<td><?php echo h($IndCodeDivn['IndCodeDivn']['divn_code']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeDivn']['divn_code_desc_bng']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeGroup']['group_code']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeGroup']['group_code_desc_bng']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeClass']['class_code']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeClass']['class_code_desc_bng']); ?>&nbsp;</td>
			<td><?php echo h($IndCodeDivn['IndCodeClass']['class_code_desc_eng']); ?>&nbsp;</td>

		</tr>
		<?php endforeach; ?>
	</table>
	<p>
		<?php
		echo $this -> Paginator -> counter(array('format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')));
		?>
	</p>

	<div class="paging">
		<?php
echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
echo $this->Paginator->numbers(array('separator' => ''));
echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
		?>
	</div>
</div>
<br />
<br />
