<div class="indCodeClasses index">
	
	<fieldset>
		<legend><?php echo __('Search BCPC Code'); ?></legend>
	<?php echo $this->Form->create(); 
	
	echo $this -> Form -> input('section_code', array(
			'label' => 'Section Code', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_section_code')));
			
	echo $this -> Form -> input('divn_code', array(
			'label' => 'Division Code', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_divn_code')));
			
	echo $this -> Form -> input('group_code', array(
			'label' => 'Group Code', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_group_code')));
			
	echo $this -> Form -> input('class_code', array(
			'label' => 'Class Code', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_class_code')));
			
	echo $this -> Form -> input('class_desc_bng', array(
			'label' => 'Class Name Bangla', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_class_code_desc_bng')));	
					
	echo $this -> Form -> input('class_desc_eng', array(
			'label' => 'Class Name English', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_class_code_desc_eng')));
			
	echo $this -> Form -> input('sub_class_code', array(
			'label' => 'Subclass Code', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_sub_class_code')));
			
	echo $this -> Form -> input('sub_class_desc_bng', array(
			'label' => 'Subclass Name Bangla', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_sub_class_code_desc_bng')));
			
	echo $this -> Form -> input('sub_class_desc_eng', array(
			'label' => 'Subclass Name English', 
			'type' => 'text', 
			'style' => 'width: 250px;',
			'value'=> $this->Session->read('search_prod_sub_class_code_desc_eng')));
				
	 echo $this->Form->end(__('Search'));
	?>
	</fieldset>
	<br /><br />
	<h2><?php echo __('BSIC Code'); ?></h2>
	<table cellpadding="0" cellspacing="0">
	<tr>
			<th><?php echo $this->Paginator->sort('section_code', 'Section Code'); ?></th>
			<th><?php echo $this->Paginator->sort('divn_code', 'Division Code'); ?></th>
			<th><?php echo $this->Paginator->sort('group_code', 'Group Code'); ?></th>
			<th><?php echo $this->Paginator->sort('class_code', 'Class Code'); ?></th>
			<th><?php echo $this->Paginator->sort('class_desc_bng', 'Class Desc Bangla'); ?></th>
			<th><?php echo $this->Paginator->sort('class_desc_eng', 'Class Desc Eng'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_code', 'Subclass Code'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_desc_bng', 'Subclasslass Desc Bangla'); ?></th>
			<th><?php echo $this->Paginator->sort('sub_class_desc_eng', 'Subclass Desc English'); ?></th>
	</tr>
	<?php
	foreach ($ProdCodeSections as $ProdCodeSection): ?>
	<tr>
	    <td><?php echo h($ProdCodeSection['ProdCodeSection']['section_code']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeDivn']['divn_code']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeGroup']['group_code']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeClass']['class_code']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeClass']['class_desc_bng']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeClass']['class_desc_eng']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeSubClass']['sub_class_code']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeSubClass']['sub_class_desc_bng']); ?>&nbsp;</td>
		<td><?php echo h($ProdCodeSection['ProdCodeSubClass']['sub_class_desc_eng']); ?>&nbsp;</td>	
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
<br /><br />
