
<?php echo $this->Session->flash(); ?>
<div class="geoCodeRmos form">
<?php echo $this->Form->create('GeoCodeRmo'); ?>
	<fieldset>
		<legend><?php echo __('Add RMO'); ?></legend>
	<?php
		echo $this->Form->input('rmo_code', array('empty' => '','label' => 'আর.এম.ও কোড'));
		echo $this->Form->input('rmo_type_eng', array('empty' => '','label' => 'আর.এম.ও  ধরন(English)'));
		echo $this->Form->input('rmo_type_bng',array('empty' => '','label' => 'আর.এম.ও ধরন(Bangla)'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('Rmos List'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
