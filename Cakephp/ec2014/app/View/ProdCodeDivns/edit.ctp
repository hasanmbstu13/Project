<div class="prodCodeDivns form">
<?php echo $this->Form->create('ProdCodeDivn'); ?>
	<fieldset>
		<legend><?php echo __('Edit Prod Code Divn'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('prod_code_section_id');
		echo $this->Form->input('divn_code');
		echo $this->Form->input('divn_desc_eng');
		echo $this->Form->input('divn_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('ProdCodeDivn.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('ProdCodeDivn.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Divns'), array('action' => 'index')); ?></li>
		<li><?php echo $this->Html->link(__('List Prod Code Sections'), array('controller' => 'ProdCodeSections', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Section'), array('controller' => 'ProdCodeSections', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Prod Code Groups'), array('controller' => 'ProdCodeGroups', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Prod Code Group'), array('controller' => 'ProdCodeGroups', 'action' => 'add')); ?> </li>
	</ul>
</div>
