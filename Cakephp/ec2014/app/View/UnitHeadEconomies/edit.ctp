<?php echo $this->Session->flash(); ?>
<div class="unitHeadEconomies form">
<?php echo $this->Form->create('UnitHeadEconomy'); ?>
	<fieldset>
		<legend><?php echo __('Edit Unit Head Economy'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('economy_code');
		echo $this->Form->input('economy_desc_eng');
		echo $this->Form->input('economy_desc_bng');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $this->Form->value('UnitHeadEconomy.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('UnitHeadEconomy.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Unit Head Economies'), array('action' => 'index')); ?></li>
	</ul>
</div>
