<div class="prodCodeSections form">
<?php echo $this->Form->create('ProdCodeSection'); ?>
	<fieldset>
		<legend><?php echo __('Add Prod Code Section'); ?></legend>
	<?php
		echo $this->Form->input('section_code');
		echo $this->Form->input('section_desc_eng');
		echo $this->Form->input('section_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
	</ul>
</div>
