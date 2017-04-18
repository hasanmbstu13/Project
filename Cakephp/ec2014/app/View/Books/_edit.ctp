<?php echo $this->Session->flash(); ?>
<div class="books form">
<?php echo $this->Form->create('Book'); ?>
	<fieldset>
		<legend><?php echo __('Edit Book'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('book_code');
		echo $this->Form->input('geo_code_divn_id');
		echo $this->Form->input('geo_code_zila_id');
		echo $this->Form->input('geo_code_upazila_id');
		echo $this->Form->input('geo_code_rmo_id');
		echo $this->Form->input('geo_code_psa_id');
		echo $this->Form->input('geo_code_union_id');
		echo $this->Form->input('entry_by');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('Book.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('Book.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Books'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Geo Code Divns'), array('controller' => 'geo_code_divns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Divn'), array('controller' => 'geo_code_divns', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Zilas'), array('controller' => 'geo_code_zilas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Zila'), array('controller' => 'geo_code_zilas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Upazilas'), array('controller' => 'geo_code_upazilas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Upazila'), array('controller' => 'geo_code_upazilas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Rmos'), array('controller' => 'geo_code_rmos', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Rmo'), array('controller' => 'geo_code_rmos', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Psas'), array('controller' => 'geo_code_psas', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Psa'), array('controller' => 'geo_code_psas', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Geo Code Unions'), array('controller' => 'geo_code_unions', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Geo Code Union'), array('controller' => 'geo_code_unions', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Book Organizations'), array('controller' => 'book_organizations', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Book Organization'), array('controller' => 'book_organizations', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Questionaires'), array('controller' => 'questionaires', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Questionaire'), array('controller' => 'questionaires', 'action' => 'add')); ?> </li>
	</ul>
</div>
