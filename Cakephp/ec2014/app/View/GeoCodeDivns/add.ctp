<?php echo $this->Session->flash(); ?>
<div class="geoCodeDivns form">
<?php echo $this->Form->create('GeoCodeDivn'); ?>
	<fieldset>
		<legend><?php echo __('Add Division'); ?></legend>
	<?php
		echo $this->Form->input('divn_code',array('empty' => '','label' => 'বিভাগ কোড'));
		echo $this->Form->input('divn_name',array('empty' => '','label' => 'বিভাগ নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Divisions'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
