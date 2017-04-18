<?php echo $this->Session->flash(); ?>
<div class="geoCodeRmos form">
<?php echo $this->Form->create('GeoCodeRmo'); ?>
	<fieldset>
		<legend><?php echo __('Edit RMO'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('rmo_code', array('empty' => '','label' => 'আর.এম.ও কোড'));
		echo $this->Form->input('rmo_type_eng',array('empty' => '','label' => 'আর.এম.ও  ধরন(English)'));
		echo $this->Form->input('rmo_type_bng',array('empty' => '','label' => 'আর.এম.ও ধরন(Bangla)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add RMO'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Html->link(__('List RMO'), array('action' => 'index')); ?></li>
		
		<li><?php echo $this->Form->postLink(__('Delete RMO'), array('action' => 'delete', $this->Form->value('GeoCodeRmo.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GeoCodeRmo.id'))); ?></li>
		
	
	</ul>
</div>
