<?php echo $this->Session->flash(); ?>
<div class="geoCodeZilas form">
<?php echo $this->Form->create('GeoCodeZila'); ?>
	<fieldset>
		<legend><?php echo __('Add Zila'); ?></legend>
	<?php
		echo $this->Form->input('geo_code_divn_id',array('empty' => '','label' => 'বিভাগ'));
		echo $this->Form->input('zila_code',array('empty' => '','label' => 'জেলা কোড'));
		echo $this->Form->input('zila_name',array('empty' => '','label' =>'জেলা নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Zilas'), array('action' => 'index')); ?></li>
	</ul>
</div>
