<?php echo $this->Session->flash(); ?>
<div class="geoCodeZilas form">
<?php echo $this->Form->create('GeoCodeZila'); ?>
	<fieldset>
		<legend><?php echo __('Edit Zila'); ?></legend>
	<?php
		echo $this->Form->input('id');
		echo $this->Form->input('geo_code_divn_id',array('label' => 'বিভাগ','options' => $geoCodeDivns));
		echo $this->Form->input('zila_code',array('empty' => '','label' => 'জেলা কোড'));
		echo $this->Form->input('zila_name',array('empty' => '','label' =>'জেলা নাম'));
	?>
	</fieldset>
<?php echo $this->Form->end(__('Submit')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Add Zilas'), array('action' => 'add')); ?></li>
		<li><?php echo $this->Form->postLink(__('Delete Zilas'), array('action' => 'delete', $this->Form->value('GeoCodeZila.id')), null, __('Are you sure you want to delete # %s?', $this->Form->value('GeoCodeZila.id'))); ?></li>
		<li><?php echo $this->Html->link(__('List Zilas'), array('action' => 'index')); ?></li>
		
	</ul>
</div>
