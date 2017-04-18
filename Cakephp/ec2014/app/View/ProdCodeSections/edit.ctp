<div class="prodCodeSections form">
<?php echo $this->Form->create('ProdCodeSection'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prod Code Section'); ?></legend>
	<?php
		echo $this->Form->input('id');
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

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProdCodeSection.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProdCodeSection.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('controller' => 'ProdCodeDivns', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Divn'), array('controller' => 'ProdCodeDivns', 'action' => 'add')); ?> </li>
	</ul>
</div>
